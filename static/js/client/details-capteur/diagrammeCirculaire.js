var capteur = document.getElementById('capteur');
var id_capteur = capteur.dataset.id;

var piece = document.getElementById('sensor_piece');
var id_piece = piece.dataset.id;

var state = document.getElementById('state-sensor-temp');
var state_sensor = state.dataset.id;

if (state_sensor == 'off') {
  $('#loading-temp-choice').hide();
  $('#plus_moins').hide();
  state.className = state.className.replace("container-circulaire", "container-circulaire-disabled");
} else {
  google.charts.load('current', {packages: ['gauge']});
  google.charts.setOnLoadCallback(drawChart);
  var arrayData = [
    ['Utilise', 0],
    ['Non-utilise', 100],
  ];
  
  function updateDataValue(valeur, id_capteur) {
    $.ajax({
      url: '?Route=client&Ctrl=data&Vue=augmenterValeur',
      type: 'post',
      data: {value: valeur, id_capteur: id_capteur},
      success: function(data) {
        // Permet d'afficher les messages envoyés
      }
    });
  }
  
  
  function drawChart() {
  
      var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Degré (°C)', 0],
      ]);
  
      var options = {
        'width':'100%',
        'height':220,
        'legend':'none',
        'colors': ['#FFD006', '#FAFAFA'],
        'pieHole': 0.5
      };
  
      // Instantiate and draw the chart.
      var chart = new google.visualization.Gauge(document.getElementById('diagrammeCirculaire'));
      chart.draw(data, options);
  
      $.get("?Route=client&Ctrl=data&Vue=refreshAutoMode&id_capteur="+id_capteur+"&id_piece="+id_piece, value => {
        if (value) {
            value = value.slice(0,4);
            var ambiant_temperature = value.replace(/\b0+/g, '');
            arrayData[0][1] = parseInt(ambiant_temperature);
        }
      });
  
      loadingMethod(data);
    
        
      $.get("?Route=client&Ctrl=data&Vue=capteur&id_capteur="+id_capteur, data => {
        
      });
  
      //Puis on affiche notre diagramme en fonction de ses données
      
      
      $("#ajouterLum").click((e) => {
        if(arrayData[0][1] >=0 && arrayData[0][1] <=99) {
          updateDataValue(arrayData[0][1]+1, id_capteur);
          arrayData[0][1] = arrayData[0][1]+1;
        }
      });
  
  
      $("#diminuerLum").click((e) => {
        if (arrayData[0][1] >=1) {
          updateDataValue(arrayData[0][1]-1, id_capteur);
          arrayData[0][1] = arrayData[0][1]-1;
        }
      });
  
      setInterval(()=> {
          data.setValue(0,1, arrayData[0][1]);
          chart.draw(data, options);
          loadingMethod(data);
      }, 1000);
  
  }
  
  function loadingMethod(data) {
    if (data.getValue(0,1) == 0) {
        $('#loading-temp-choice').show();
    } else {
        $('#loading-temp-choice').hide();
    }
  }
  
  setInterval( ()=> {
    refreshDataSensorTemperature();
  }, 5000);
  
  function refreshDataSensorTemperature() {
    var capteur = document.getElementById('capteur');
    var id_capteur = capteur.dataset.id;
    $.ajax({
      url: '?Route=client&Ctrl=data&Vue=sendDataTemperature',
      type: 'post',
      data: {id_capteur: id_capteur},
      success: function(data) {
      }
    });
  }
}