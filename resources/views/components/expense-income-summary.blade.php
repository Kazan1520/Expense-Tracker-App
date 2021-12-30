<div class="mt-20 md:mt-0 md:col-span-2">
    <div class="shadow sm:rounded-md">
      <div class="px-4 py-5 bg-white sm:p-6 rounded-2xl">

        <canvas id="compare" class="w-52"></canvas>
      </div>
    </div>
</div>

<script>
    var expenses = {{$sumExpenses}};
    var incomes = {{$sumIncomes}};
    var xValues = ["expense", "income"];
    console.log(expenses);
    console.log(incomes);
    var yValues = [expenses, incomes];

    var barColors = [ "#ce7d78","#63b598"];

new Chart("compare", {
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
      text: "Expense to Income Ratio"
    }
  }
});
</script>