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

  $("#ajouterAmbiance").click(function(e) {
    e.preventDefault();
    var containerModal = $("#container-modal");
    var close = $("#close");
    modal(containerModal, close);

  });

  $("#ajouterProgramme").click(function(e) {
    e.preventDefault();
    console.log("ajouterProgramme");
  });

  $("#visualiserProgramme").click(function(e) {
    e.preventDefault();
    console.log("visualiserProgramme");
  });
});
