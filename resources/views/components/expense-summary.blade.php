<div class="mt-20 md:mt-0 md:col-span-2">
    <div class="shadow sm:rounded-md">
      <div class="px-4 py-5 bg-white sm:p-6 rounded-2xl">

<canvas id="myChart" class="w-full"></canvas>
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
    var barColors = ['#FF6633', '#FFB399', '#FF33FF', '#FFFF99', '#00B3E6', 
		  '#E6B333', '#3366E6', '#999966', '#99FF99', '#B34D4D',
		  '#80B300', '#809900', '#E6B3B3', '#6680B3', '#66991A', 
		  '#FF99E6', '#CCFF1A', '#FF1A66', '#E6331A', '#33FFCC',
		  '#66994D', '#B366CC', '#4D8000', '#B33300', '#CC80CC', 
		  '#66664D', '#991AFF', '#E666FF', '#4DB3FF', '#1AB399',
		  '#E666B3', '#33991A', '#CC9999', '#B3B31A', '#00E680', 
		  '#4D8066', '#809980', '#E6FF80', '#1AFF33', '#999933',
		  '#FF3380', '#CCCC00', '#66E64D', '#4D80CC', '#9900B3', 
		  '#E64D66', '#4DB380', '#FF4D4D', '#99E6E6', '#6666FF'];

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
    },
    legend:{
      display: false
    }
    }
  }
);
</script>