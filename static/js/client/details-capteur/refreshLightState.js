// Initialisation de nos variables
var capteur = document.getElementById('sensorLight');
if (capteur) {
    var piece = document.getElementById('sensor_piece');
    var sensor_state = document.getElementById('sensor_state');
    var state = sensor_state.dataset.id;
    var id_capteur = capteur.dataset.id;
    var id_piece = piece.dataset.id;

    var state_programme = document.getElementById('checkProgramme');

    if (state_programme) {
        var programme = state_programme.dataset.id;
        var programmeId = document.getElementById('programme');
        var id_programme = programmeId.dataset.id;

        console.log(programme);

        if (programme == 'on') {
            console.log(programme);
            // Si le programme est 'on' on rafraichit la vérif de programme
            setInterval(()=> {
                $.get("?Route=client&Ctrl=data&Vue=capteur&id_capteur="+id_capteur+"&id_programme="+id_programme, data => {
                    console.log(data);
                    if(data == "disable") {
                        $('#container-programme').load(location.href + ' #container-programme');
                    }
    
                    if( data == "enable") {
                        $('#on_off').load(location.href + ' #on_off');
                    }
                });
            }, 1000);
        }
    }
    
    refreshStateAutoModeBy(state, id_capteur, id_piece, 4000);

    function refreshStateAutoModeBy(state, id_capteur, id_piece, $time_second) {
        if (state == 'auto') {
            getStateOfAuto(id_capteur, id_piece);
            setInterval(() => {
                getStateOfAuto(id_capteur, id_piece);
            }, $time_second);
        }
    }

    function getStateOfAuto(id_capteur, id_piece) {
        $.get("?Route=client&Ctrl=data&Vue=refreshAutoMode&id_capteur="+id_capteur+"&id_piece="+id_piece, ( data ) => {
            var auto_mode_state_binary = data.slice(0,4);
            console.log(auto_mode_state_binary);

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
}