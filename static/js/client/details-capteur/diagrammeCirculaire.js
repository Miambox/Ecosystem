
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawChart)

function drawChart() {
// Define the chart to be drawn.
  var data = new google.visualization.DataTable();
  var data_modal = new google.visualization.DataTable();
  data.addColumn('string', 'Element');
  data.addColumn('number', 'Percentage');
  data.addRows([
    ['Utilisé', 90],
    ['Non-utilisé', 10],
  ]);
  data_modal.addColumn('string', 'Element');
  data_modal.addColumn('number', 'Percentage');
  data_modal.addRows([
    ['Utilisé', 60],
    ['Non-utilisé', 40],
  ]);
  var options = {
    'width':'100%',
    'height':220,
    'legend':'none',
    'colors': ['#FFD006', '#FAFAFA'],
    'pieHole': 0.5
  };
  var options_modal = {
    'width':'60%',
    'height':160,
    'legend':'none',
    'colors': ['#FFD006', '#FAFAFA'],
    'pieHole': 0.5
  };
  // Instantiate and draw the chart.
  var chart = new google.visualization.PieChart(document.getElementById('diagrammeCirculaire'));
  chart.draw(data, options);
  var chart_modal = new google.visualization.PieChart(document.getElementById('diagrammeCirculaireModal'));
  chart_modal.draw(data_modal, options_modal)

}
