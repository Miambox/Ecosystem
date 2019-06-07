setInterval(() => {
    var capteur = document.getElementById('sensorLight');
    var piece = document.getElementById('sensor_piece');
    var id_capteur = capteur.dataset.id;
    var id_piece = piece.dataset.id;
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
