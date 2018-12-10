$(document).ready(function() {

  function modal(modal, close) {
    modal.css("display", "block");

    close.click(function(e) {
      modal.css("display", "none");
    });
    window.onclick = function(event) {
      if (event.target == modal) {
          modal.css("display", "none");
      }
    };
  }

  $("#goToPiece").click(function(e) {
    console.log("goToPiece");
    $("#parametres-piece").slideToggle("fast");
    document.location.href="?Route=client&Ctrl=capteur&Vue=vuePrincipale";
  });

  $("#button-config-piece").click(function(e) {
    $("#parametres-piece").slideToggle("fast");
  });

  $("#supprimerPiece").click(function(e) {
    $("#parametres-piece").slideToggle("fast");
    var containerModal = $("#container-modal-supprimer");
    var close = $("#close-supprimer");
    modal(containerModal, close);
  });

  $("#ajouterPiece").click(function (e) {
    document.location.href="?Route=client&Ctrl=addPiece&Vue=vuePrincipale";
  })

});
