$(document).ready(function() {
  $("#bouton-3-points").click(function(e) {
      e.preventDefault();
      console.log($("#fenetre-parametres").is(':hidden'));
      if($("#fenetre-parametres").is(':hidden')) {
        console.log("test");
        $("#fenetre-parametres").css('visibility','visible');
      }
      else {
        $("#fenetre-parametres").css('visibility','hidden');
      }
  });
});
