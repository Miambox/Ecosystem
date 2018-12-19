
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawChart)

function drawChart() {

  setInterval(
    function() {
      $.get("index.php?Route=client&Ctrl=data&Vue=capteur", function( data ) {
        // On récupère les données de la BDD dans notre fichier
        var data_capteur = data.dataPourcent;

        // Puis on affiche notre diagramme en fonction de ses données
        var data = new google.visualization.DataTable();
        var data_modal = new google.visualization.DataTable();
        data.addColumn('string', 'Element');
        data.addColumn('number', 'Percentage');

        data.addRows(data_capteur); // On ajoute nos données aux lignes

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

        // AUTRES DIAGRAMME
        var data_modal = new google.visualization.DataTable();
        var data_modal = new google.visualization.DataTable();
        data_modal.addColumn('string', 'Element');
        data_modal.addColumn('number', 'Percentage');

        data_modal.addRows(data_capteur); // On ajoute nos données aux lignes

        var options_modal = {
          'width':'60%',
          'height':160,
          'legend':'none',
          'colors': ['#FFD006', '#FAFAFA'],
          'pieHole': 0.5
        };

        var chart_modal = new google.visualization.PieChart(document.getElementById('diagrammeCirculaireModal'));
        chart_modal.draw(data_modal, options_modal)


      }, "json" );

    },1000);

}
