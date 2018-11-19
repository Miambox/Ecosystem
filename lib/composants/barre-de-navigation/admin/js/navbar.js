$(document).ready(function() {
  /*Affiche du menu déroulant*/
  $("#boutonMenu").click(function(e){
      e.preventDefault();
      if($("header > nav").is(':visible')) {
        $("header > nav").css('visibility','hidden');
        $("header > nav").slideToggle("fast");
        $("header > div").toggleClass("menuUp menuDown");
      }
      else {
        $("header > nav").css('visibility','visible');
        $("header > nav").slideToggle("medium");
        $("header > div").toggleClass("menuDown menuUp");
      }
  });
  /*Affichage du menu de contact*/
  $("#dropdown-contact").click(function(e) {
    e.preventDefault();
    $("header > nav > ul > li:nth-of-type(4) > nav").slideToggle("medium");
  });
  /*Affichage du menu de paramètres*/
  $("#dropdown-parameters").click(function(e) {
    e.preventDefault();
    $("header > div#logo > ul > li:last-of-type > nav").slideToggle("medium"); // Pour mobile
  });
  /*Affichage du menu paramètres ordinateur*/
  $("#dropdown-parameters-desktop").click(function(e) {
    e.preventDefault();
    $("header > nav > ul > li:last-of-type > nav").slideToggle("medium"); // pour ordinateur
  });
  /*On souligne la barre de recherche*/
  $("#search-desktop").click(function() {
    $('#searchbar-desktop').css('box-shadow', '0px 0px 5px 0px rgba(255,140,0,0.7)');
  });
  $("#search-mobile").click(function() {
    $('#searchbar-mobile').css('box-shadow', '0px 0px 5px 0px rgba(255,140,0,0.7)');
  });
});
