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

  $("#button-ajout-employe-serviceclient").click(function(e) {
    console.log("test-popup-ajout-employe");
    var containerModal = $("#conteneur_modal_ajout_employe");
    var close = $("#fermer_modal_ajout_employe");
    modal(containerModal, close);
  })

  $("#button-ajout-employe-depanage").click(function(e) {
    console.log("test-popup-ajout-employe");
    var containerModal = $("#conteneur_modal_ajout_employe");
    var close = $("#fermer_modal_ajout_employe");
    modal(containerModal, close);
  })

});
