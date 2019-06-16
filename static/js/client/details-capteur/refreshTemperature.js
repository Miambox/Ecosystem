$('#sun-ambiant').hide();
$('#snow-ambiant').hide();
$('#loading-ambiant').show();
var capteur = document.getElementById('sensorTemperature');
if (capteur) {
    // Initialisation des variables
    var piece = document.getElementById('sensor_piece');
    var sensor_state = document.getElementById('sensor_state');
    var state = sensor_state.dataset.id;
    var id_capteur = capteur.dataset.id;
    var id_piece = piece.dataset.id;

    
    google.charts.load('current', {packages: ['gauge']});
    google.charts.setOnLoadCallback(drawChart);

    var arrayData = [
    ['Utilise', 0],
    ['Non-utilise', 100],
    ];


    function drawChart() {

        var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Degré (°C)', 0],
        ]);

        loadingMethod(data);

        var options = {
        'width':'100%',
        'height':220,
        'legend':'none',
        'colors': ['#FFD006', '#FAFAFA'],
        'pieHole': 0.5
        };

        // Instantiate and draw the chart.
        var chart = new google.visualization.Gauge(document.getElementById('ambiant_temperature'));
        chart.draw(data, options);

        refreshValueOfSensor(data, chart, options);

        setInterval(()=> {
            refreshValueOfSensor(data, chart, options);
        }, 5000);
    }
}

function loadingMethod(data) {
    if (data.getValue(0,1) == 0) {
        $('#sun-ambiant').hide();
        $('#snow-ambiant').hide();
        $('#loading-ambiant').show();
    } else {
        $('#loading-ambiant').hide();
        if (data.getValue(0,1) > 20) {
            $('#sun-ambiant').show();
            $('#snow-ambiant').hide();
        } else {
            $('#sun-ambiant').hide();
            $('#snow-ambiant').show();
        }
    }
}

function refreshValueOfSensor(data, chart, options) {
    $.get("?Route=client&Ctrl=data&Vue=refreshAutoMode&id_capteur="+id_capteur+"&id_piece="+id_piece, value => {
        if (value) {
            value = value.slice(0,4);
            var ambiant_temperature = value.replace(/\b0+/g, '');
            data.setValue(0,1, parseInt(ambiant_temperature));
            chart.draw(data, options);
            loadingMethod(data);
        }
    });
}