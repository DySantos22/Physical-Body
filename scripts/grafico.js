var ctx = document.getElementById("myChart");

var stars = [135850, 52122, 148825];
var plans = ["Mensal", "Trimestral", "Anual"];

var myChart = new Chart(ctx, {
  type: "pie",
  data: {
    labels: plans,
    datasets: [
      {
        label: "Github Stars",
        data: stars,
        backgroundColor: [
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
        ],
        borderColor: [
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
        ],
        borderWidth: 1
      }
    ]
  }
});