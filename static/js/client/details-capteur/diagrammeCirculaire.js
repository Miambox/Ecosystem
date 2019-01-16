
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawChart)

function drawChart() {

  setInterval(function (data) {
      $.get("?Route=client&Ctrl=data&Vue=capteur", function( data ) {
        var arrayData = JSON.parse(data).dataPourcent;

        $("#ajouterLum").click(function(e) {
          if(arrayData[0][1] >=0 && arrayData[0][1] <=95) {
            $.ajax({
              url: '?Route=client&Ctrl=data&Vue=augmenterValeur',
              type: 'post',
              data: {value: arrayData[0][1]+5},
              success: function(data) {
                // Permet d'afficher les messages envoyés
                console.log(data);
              }
              });
          }
        });


        $("#diminuerLum").click(function(e) {
          if (arrayData[0][1] >=5) {
            $.ajax({
              url: '?Route=client&Ctrl=data&Vue=augmenterValeur',
              type: 'post',
              data: {value: arrayData[0][1]-5},
              success: function(data) {
                // Permet d'afficher les messages envoyés
                console.log(data);
              }
            });
          }


        });



        //Puis on affiche notre diagramme en fonction de ses données
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Element');
        data.addColumn('number', 'Percentage');
        data.addRows(arrayData); // On ajoute nos données aux lignes

        var options = {
          'width':'100%',
          'height':220,
          'legend':'none',
          'colors': ['#FFD006', '#FAFAFA'],
          'pieHole': 0.5
        };

        // Instantiate and draw the chart.
        var chart;
        chart = new google.visualization.PieChart(document.getElementById('diagrammeCirculaire'));
        chart.draw(data, options);


      })
    }, 500);

    // Diagramme de la pop-up
    // var data_modal = new google.visualization.DataTable();
    // data_modal.addColumn('string', 'Element');
    // data_modal.addColumn('number', 'Percentage');
    // data_modal.addRows(arrayData); // On ajoute nos données aux lignes
    //
    // var options_modal = {
    //   'width':'60%',
    //   'height':160,
    //   'legend':'none',
    //   'colors': ['#FFD006', '#FAFAFA'],
    //   'pieHole': 0.5
    // };
    //
    // var chart_modal = new google.visualization.PieChart(document.getElementById('diagrammeCirculaireModal'));
    // chart_modal.draw(data_modal, options_modal);
}
