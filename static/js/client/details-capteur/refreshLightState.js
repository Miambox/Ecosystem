// Initialisation de nos variables
var capteur = document.getElementById('sensorLight');
var piece = document.getElementById('sensor_piece');
var sensor_state = document.getElementById('sensor_state');
var state = sensor_state.dataset.id;
var id_capteur = capteur.dataset.id;
var id_piece = piece.dataset.id;

refreshStateAutoModeBy(state, id_capteur, id_piece, 5000);

setInterval(() => {
    refreshLightAfterProgramme(id_capteur, id_piece);
}, 5000)


function refreshLightAfterProgramme(id_capteur, id_piece) {
    getDataLight(id_capteur, id_piece);
}

function getDataLight(id_capteur, id_piece) {
    $.get("?Route=client&Ctrl=data&Vue=refreshLight&id_capteur="+id_capteur+"&id_piece="+id_piece, function( data ) {
        if (data == 'OK') {
            $.ajax({
                url: '?Route=client&Ctrl=capteur&Vue=details',
                type: 'post',
                data: {id_capteur: id_capteur, id_piece: id_piece},
                success: function(data) {
                    $('#on_off').load(location.href + ' #on_off');
                }
            });
        }
    });
}


function refreshStateAutoModeBy(state, id_capteur, id_piece, $time_second) {
    if (state == 'auto') {
        console.log('fuck');
        getStateOfAuto(id_capteur, id_piece);
        setInterval(() => {
            getStateOfAuto(id_capteur, id_piece);
        }, $time_second);
    }
}

function getStateOfAuto(id_capteur, id_piece) {
    $.get("?Route=client&Ctrl=data&Vue=refreshAutoMode&id_capteur="+id_capteur+"&id_piece="+id_piece, ( data ) => {
        var auto_mode_state_binary = data;
        console.log(data);

        if (auto_mode_state_binary == '0000') {
            // La lumière est éteinte
           $('#auto-state-on').hide();
           $('#auto-state-off').show();
        }

        if ( auto_mode_state_binary == '0001') {
            // La lumière est allumée
           $('#auto-state-on').show();
           $('#auto-state-off').hide();
        }
    });    
}
