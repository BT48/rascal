/**
 * @file
 * Attaches the behaviors for the Juicebox module.
 */

(function ($, Drupal) {
  Drupal.behaviors.juicebox = {
    attach: function (context, settings) {
      if (typeof settings['juicebox'] !== 'undefined') {
        var galleries = settings['juicebox'];
        // Loop-through galleries that were added during this request.
        for (var key in galleries) {
          if (galleries.hasOwnProperty(key) && document.getElementById(key)) {
            // Instantiate each new gallery via the library. Take a copy to be
            // safe as we will delete the original settings reference after.
            var newGallery = $.extend({}, galleries[key]);
            new juicebox(newGallery);
            // We only want to hold on to the settings for this gallery long
            // enough to pass it on as a proper Juicebox object. In fact,
            // holding on longer can cause problems on sequential AJAX updates
            // of the same gallery, so it's probably best to delete it.
            delete galleries[key];
          }
        }
      }
    }
  };
})(jQuery, Drupal);;
!function(a,b,c){"use strict";function d(d,e){function k(){h.randomize&&!f.hasClass("slick-initiliazed")&&n(),f.on("setPosition.sl",function(a,b){o(b)}),a(".media--loading",f).closest(".slide__content").addClass("is-loading"),"blazy"===h.lazyLoad&&b.blazy&&f.on("beforeChange.sl",function(){var c=a(".b-lazy:not(.b-loaded)",f);c.length&&b.blazy.init.load(c)})}function l(){var c=(f.slick("getSlick"),f.find(".media--player").length);f.parent().on("click.sl",".slick-down",function(b){b.preventDefault();var c=a(this);a("html, body").stop().animate({scrollTop:a(c.data("target")).offset().top-(c.data("offset")||0)},800,h.easing||"swing")}),h.mouseWheel&&f.on("mousewheel.sl",function(a,b){return a.preventDefault(),f.slick(b<0?"slickNext":"slickPrev")}),f.on("lazyLoaded lazyLoadError",function(a,b,c){m(c)}),c&&(f.on("afterChange.sl",p),f.on("click.sl",".media__icon--close",p),f.on("click.sl",".media__icon--play",q))}function m(b){var c=a(b),d=c.closest(".media--background"),e=c.closest(".slide")||c.closest(".unslick");c.parentsUntil(e).removeClass(function(a,b){return(b.match(/(\S+)loading/g)||[]).join(" ")}),d.length&&(d.css("background-image","url("+c.attr("src")+")"),d.find("> img").remove(),d.removeAttr("data-lazy"))}function n(){f.children().sort(function(){return.5-Math.random()}).each(function(){f.append(this)})}function o(a){var b=a.slideCount<=h.slidesToShow,c=b||h.arrows===!1;if(f.attr("id")===a.$slider.attr("id"))return h.centerPadding&&"0"!==h.centerPadding||a.$list.css("padding",""),b&&a.$slideTrack.width()<=a.$slider.width()&&a.$slideTrack.css({left:"",transform:""}),g[c?"addClass":"removeClass"]("visually-hidden")}function p(){f.removeClass("is-paused"),f.find(".is-playing").length&&f.find(".is-playing").removeClass("is-playing").find(".media__icon--close").click()}function q(){f.addClass("is-paused").slick("slickPause")}function r(c){return{slide:c.slide,lazyLoad:c.lazyLoad,dotsClass:c.dotsClass,rtl:c.rtl,appendDots:".slick__arrow"===c.appendDots?g:c.appendDots||a(f),prevArrow:a(".slick-prev",g),nextArrow:a(".slick-next",g),appendArrows:g,customPaging:function(a,d){var e=a.$slides.eq(d).find("[data-thumb]")||null,f='<img alt="'+b.t(e.attr("alt"))+'" src="'+e.data("thumb")+'">',g=e.length&&c.dotsClass.indexOf("thumbnail")>0?'<div class="slick-dots__thumbnail">'+f+"</div>":"";return a.defaults.customPaging(a,d).add(g)}}}var j,f=a("> .slick__slider",e).length?a("> .slick__slider",e):a(e),g=a("> .slick__arrow",e),h=f.data("slick")?a.extend({},c.slick,f.data("slick")):c.slick,i=!("array"!==a.type(h.responsive)||!h.responsive.length)&&h.responsive;if(i)for(j in i)i.hasOwnProperty(j)&&"unslick"!==i[j].settings&&(i[j].settings=a.extend({},c.slick,r(h),i[j].settings));f.data("slick",h),h=f.data("slick"),k(),f.slick(r(h)),l(),f.hasClass("unslick")&&f.slick("unslick"),a(e).addClass("slick--initialized")}b.behaviors.slick={attach:function(b){a(".slick",b).once("slick").each(d)}}}(jQuery,Drupal,drupalSettings);
;
