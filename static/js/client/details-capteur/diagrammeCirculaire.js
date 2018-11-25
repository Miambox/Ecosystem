google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawChart)

function drawChart() {
// Define the chart to be drawn.
  var data = new google.visualization.DataTable();
  data.addColumn('string', 'Element');
  data.addColumn('number', 'Percentage');
  data.addRows([
    ['Utilisé', 90],
    ['Non-utilisé', 10],
  ]);

  var options = {
    'width':'100%',
    'height':220,
    'legend':'none',
    'colors': ['#FFD006', '#FAFAFA'],
    'pieHole': 0.5
  };

  // Instantiate and draw the chart.
  var chart = new google.visualization.PieChart(document.getElementById('diagrammeCirculaire'));
  chart.draw(data, options);
}
