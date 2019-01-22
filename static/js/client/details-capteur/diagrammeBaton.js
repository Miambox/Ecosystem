google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBarColors)

function drawBarColors() {
  var data = google.visualization.arrayToDataTable([
    ['Date', 'Heure'],
    ['24/11/2018', 0],
  ]);

  var options = {
    width: "100%",
    height: 205,
    chartArea: {width: '70%'},
    colors: ['#FFD006'],
    vAxis: {
      title: "Heure d'utilisation",
      minValue: 0,
      maxValue: 24,
    },
    legend: 'none',
 }

  var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
  chart.draw(data, options);
}
