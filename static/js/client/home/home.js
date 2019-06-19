
$(function() {
    $('.scroll-down').click (function() {
      $('html, body').animate({scrollTop: $('section.ok').offset().top -65  }, 'slow');
      return false;
    });
  });


$('#return-to-top').click(function() {      // When arrow is clicked
    $('body,html').animate({
        scrollTop : 0                       // Scroll to top of body
    }, 500);
});

$("#gotoInscription").click(function(e) {
  console.log("test");
  document.location.href="?Route=client&Ctrl=signin&Vue=information";
})

$("#gotoProfil").click(function(e) {
  console.log("test");
  document.location.href="?Route=client&Ctrl=profil&Vue=vuePrincipale";
})
