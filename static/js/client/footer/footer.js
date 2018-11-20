$(document).ready(function() {
  /*Affiche du menu déroulant*/
  $("#contact").click(function(e){
    e.preventDefault();
    $("#dropdown-contact").slideToggle("medium");
  });

  $("#phone").click(function(e) {
    e.preventDefault();
    alert("01-87-98-04-75");
  });
})
