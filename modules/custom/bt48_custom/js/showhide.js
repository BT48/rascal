(function ($) {
  Drupal.behaviors.bt48_showhide = {
    attach: function (context, settings) {

      // FAQ Header
      $('h2.faq-title').on('click', function (e) {
        $(this).toggleClass('focused');
        event.stopPropagation();
        event.preventDefault();  
      });
    }
  };
})(jQuery);