<div class="mt-20 md:mt-0 md:col-span-2">
    <div class="shadow sm:rounded-md">
      <div class="px-4 py-5 bg-white sm:p-6 rounded-2xl">

<canvas id="myChart" class="w-52"></canvas>
      </div>
    </div>
</div>

<script>
    var expenses = {!! json_encode($expenses, JSON_HEX_TAG) !!};
    var categories = {!! json_encode($categories, JSON_HEX_TAG) !!};
    var xValues = [];
    var yValues = [];
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
var barColors = [];

for (let index = 0; index < yValues.length; index++) {
  barColors.push("#" + Math.floor(Math.random()*16777215).toString(16));
}

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