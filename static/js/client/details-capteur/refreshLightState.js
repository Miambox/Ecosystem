setInterval(() => {
    var capteur = document.getElementById('sensorLight');
    var piece = document.getElementById('sensor_piece');
    var sensor_state = document.getElementById('sensor_state');
    var state = sensor_state.dataset.id;
    var id_capteur = capteur.dataset.id;
    var id_piece = piece.dataset.id;

    refreshStateAutoMode(state, id_capteur, id_piece);

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
    
}, 1000);


function refreshStateAutoMode(state, id_capteur, id_piece) {
    if (state == 'auto') {
        $.get("?Route=client&Ctrl=data&Vue=refreshAutoMode&id_capteur="+id_capteur+"&id_piece="+id_piece, function( data ) {
            // On reçoit la valeur binaire du capteur en mode auto pour savoir si la lumière est allumée ou éteinte
            var auto_mode_state_binary = data;
            console.log(data);

            if (auto_mode_state_binary == '0000') {
                // La lumière est éteinte
               console.log('eteinte');
               $('#auto-state-on').hide();
               $('#auto-state-off').show();
            }

            if ( auto_mode_state_binary == '0001') {
                // La lumière est allumée
               console.log('allumée');
               $('#auto-state-on').show();
               $('#auto-state-off').hide();
            }
            
        });
    }
}
