$(document).ready(function() {

  $("#button-config").click(function(e) {
    console.log("ouvre params");
    $("#parametres-logement").slideToggle("fast");
  });

  $("#goTo").click(function(e) {
    console.log("allez à la pièce");
    document.location.href="?Route=client&Ctrl=piece&Vue=vuePrincipale";
  });

  $("#ajouterPartage").click(function(e) {
    console.log("Partager");
    $("#parametres-logement").slideToggle("fast");
    var containerModal = $("#container-modal-partage");
    var close = $("#close-partage");
    modal(containerModal, close);
  });

  $("#ajouterLogement").click(function(e) {
    console.log("ajouterLogement");
    document.location.href="?Route=client&Ctrl=logement&Vue=addLogement";
  });
});
