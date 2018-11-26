
  function modal(container ,modal, close) {
    container.css("display", "block");
    modal.slideToggle("medium");

    close.click(function(e) {
      container.css("display", "none");
      modal.slideToggle("fast");
    });
    window.onclick = function(event) {
      if (event.target == container) {
          container.css("display", "none");
      }
    };
  }
