(function ($) {
  Drupal.behaviors.bt48_custom_js = {
    attach: function (context, settings) {

      if ($('.menu--main li.menu-item').hasClass('menu-item--expanded')) {
          $('.menu--main').find('li.menu-item.menu-item--expanded').removeClass('menu-item--expanded').addClass('menu-item--collapsed');
      }


      $('.hamburger').once().click(function() {
        $(this).toggleClass('is-active');
      });

      $('.menu--main li.menu-item--collapsed').once().click(function() {
        $(this).toggleClass('menu-item--collapsed menu-item--expanded');
      });



    }
  }
})(jQuery);
