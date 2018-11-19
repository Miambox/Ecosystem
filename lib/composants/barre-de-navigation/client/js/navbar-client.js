$(document).ready(function() {

  $('#boutonMenu').click(function(e) {
    e.preventDefault();
    console.log("je passe");
    $('#menu').slideToggle("medium");
  })

})
