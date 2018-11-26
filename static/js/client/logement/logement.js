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

  $("#button-config").click(function(e) {
    console.log("ouvre params");
    $("#parametres-logement").slideToggle("fast");
  })

  $("#goTo").click(function(e) {
    console.log("allez à la pièce");
    document.location.href="?Route=client&Ctrl=piece&Vue=vuePrincipale";
  })

  $("#ajouterPartage").click(function(e) {
    console.log("Partager");
    $("#parametres-logement").slideToggle("fast");
    var containerModal = $("#container-modal-partage");
    var close = $("#close-partage");
    modal(containerModal, close);
  })

  $("#supprimerLogement").click(function(e) {
    console.log("supprimer mon logement");
    $("#parametres-logement").slideToggle("fast");
    var containerModal = $("#container-modal-supprimer");
    var close = $("#close-supprimer");
    modal(containerModal, close);
  })


});
