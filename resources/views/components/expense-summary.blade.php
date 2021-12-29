<canvas id="myChart" style="width:100%;max-width:600px"></canvas>

<script>
    var expenses = {!! json_encode($expenses, JSON_HEX_TAG) !!};
    var categories = {!! json_encode($categories, JSON_HEX_TAG) !!};
    var xValues = [];
    var yValues = [];
    console.log(expenses);
    console.log(categories);
    categories.forEach(category => {
        category.sum = 0;
        expenses.forEach(expense => {
            if (expense.category_id == category.id) {
                category.sum+=expense.sum;
            }
        });
        xValues.push(category.name);
        yValues.push(category.sum);
    });

var barColors = [
  "#b91d47",
  "#00aba9",
  "#2b5797",
  "#e8c3b9",
  "#1e7145"
];

new Chart("myChart", {
  type: "doughnut",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    title: {
      display: true,
      text: "Your Expenses"
    }
  }
});
</script>