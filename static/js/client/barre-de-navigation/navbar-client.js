$(document).ready(function() {

  function modal(modal, close) {
    modal.css("display", "block");

    close.click(function(e) {
      $("#body").css("overflow-y", "scroll");
      modal.css("display", "none");
    });
    window.onclick = function(event) {
      if (event.target == modal) {
          $("#body").css("overflow-y", "scroll");
          modal.css("display", "none");
      }
    };
  }

  $('#boutonMenu').click(function(e) {
    e.preventDefault();
    console.log("je passe");
    $('#menu').slideToggle("medium");
  })

  $("#ticket-alerte").click(function(e) {
    console.log("alerte");
    var containerModal = $("#container-modal-ticket");
    var close = $("#close-ticket");
    $("#body").css("overflow", "hidden");
    modal(containerModal, close);
  })

})
