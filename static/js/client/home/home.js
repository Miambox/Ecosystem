$(function() {
    $('.scroll-down').click (function() {
      $('html, body').animate({scrollTop: $('section.ok').offset().top -70  }, 'slow');
      return false;
    });
  });