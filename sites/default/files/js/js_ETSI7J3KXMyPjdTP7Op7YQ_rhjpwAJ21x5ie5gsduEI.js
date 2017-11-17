/* global a2a*/
(function (Drupal) {
  'use strict';

  Drupal.behaviors.addToAny = {
    attach: function (context, settings) {
      // If not the full document (it's probably AJAX), and window.a2a exists
      if (context !== document && window.a2a) {
        a2a.init_all('page'); // Init all uninitiated AddToAny instances
      }
    }
  };

})(Drupal);
;
(function ($) {
  Drupal.behaviors.bt48_sliderbars = {
    attach: function (context, settings) {

/*!
 * Slidebars - A jQuery Framework for Off-Canvas Menus and Sidebars
 * Version: 2.0.2
 * Url: http://www.adchsm.com/slidebars/
 * Author: Adam Charles Smith
 * Author url: http://www.adchsm.com/
 * License: MIT
 * License url: http://www.adchsm.com/slidebars/license/
 */

var slidebars = function () {

	/**
	 * Setup
	 */

	// Cache all canvas elements
	var canvas = $( '[canvas]' ),

	// Object of Slidebars
	offCanvas = {},

	// Variables, permitted sides and styles
	init = false,
	registered = false,
	sides = [ 'top', 'right', 'bottom', 'left' ],
	styles = [ 'reveal', 'push', 'overlay', 'shift' ],

	/**
	 * Get Animation Properties
	 */

	getAnimationProperties = function ( id ) {
		// Variables
		var elements = $(),
		amount = '0px, 0px',
		duration = parseFloat( offCanvas[ id ].element.css( 'transitionDuration' ), 10 ) * 1000;

		// Elements to animate
		if ( offCanvas[ id ].style === 'reveal' || offCanvas[ id ].style === 'push' || offCanvas[ id ].style === 'shift' ) {
			elements = elements.add( canvas );
		}

		if ( offCanvas[ id ].style === 'push' || offCanvas[ id ].style === 'overlay' || offCanvas[ id ].style === 'shift' ) {
			elements = elements.add( offCanvas[ id ].element );
		}

		// Amount to animate
		if ( offCanvas[ id ].active ) {
			if ( offCanvas[ id ].side === 'top' ) {
				amount = '0px, ' + offCanvas[ id ].element.css( 'height' );
			} else if ( offCanvas[ id ].side === 'right' ) {
				amount = '-' + offCanvas[ id ].element.css( 'width' ) + ', 0px';
			} else if ( offCanvas[ id ].side === 'bottom' ) {
				amount = '0px, -' + offCanvas[ id ].element.css( 'height' );
			} else if ( offCanvas[ id ].side === 'left' ) {
				amount = offCanvas[ id ].element.css( 'width' ) + ', 0px';
			}
		}

		// Return animation properties
		return { 'elements': elements, 'amount': amount, 'duration': duration };
	},

	/**
	 * Slidebars Registration
	 */

	registerSlidebar = function ( id, side, style, element ) {
		// Check if Slidebar is registered
		if ( isRegisteredSlidebar( id ) ) {
			throw "Error registering Slidebar, a Slidebar with id '" + id + "' already exists.";
		}

		// Register the Slidebar
		offCanvas[ id ] = {
			'id': id,
			'side': side,
			'style': style,
			'element': element,
			'active': false
		};
	},

	isRegisteredSlidebar = function ( id ) {
		// Return if Slidebar is registered
		if ( offCanvas.hasOwnProperty( id ) ) {
			return true;
		} else {
			return false;
		}
	};

	/**
	 * Initialization
	 */

	this.init = function ( callback ) {
		// Check if Slidebars has been initialized
		if ( init ) {
			throw "Slidebars has already been initialized.";
		}

		// Loop through and register Slidebars
		if ( ! registered ) {
			$( '[off-canvas]' ).each( function () {
				// Get Slidebar parameters
				var parameters = $( this ).attr( 'off-canvas' ).split( ' ', 3 );

				// Make sure a valid id, side and style are specified
				if ( ! parameters || ! parameters[ 0 ] || sides.indexOf( parameters[ 1 ] ) === -1 || styles.indexOf( parameters[ 2 ] ) === -1 ) {
					throw "Error registering Slidebar, please specifiy a valid id, side and style'.";
				}

				// Register Slidebar
				registerSlidebar( parameters[ 0 ], parameters[ 1 ], parameters[ 2 ], $( this ) );
			} );

			// Set registered variable
			registered = true;
		}

		// Set initialized variable
		init = true;

		// Set CSS
		this.css();

		// Trigger event
		$( events ).trigger( 'init' );

		// Run callback
		if ( typeof callback === 'function' ) {
			callback();
		}
	};

	this.exit = function ( callback ) {
		// Check if Slidebars has been initialized
		if ( ! init ) {
			throw "Slidebars hasn't been initialized.";
		}

		// Exit
		var exit = function () {
			// Set init variable
			init = false;

			// Trigger event
			$( events ).trigger( 'exit' );

			// Run callback
			if ( typeof callback === 'function' ) {
				callback();
			}
		};

		// Call exit, close open Slidebar if active
		if ( this.getActiveSlidebar() ) {
			this.close( exit );
		} else {
			exit();
		}
	};

	/**
	 * CSS
	 */

	this.css = function ( callback ) {
		// Check if Slidebars has been initialized
		if ( ! init ) {
			throw "Slidebars hasn't been initialized.";
		}

		// Loop through Slidebars to set negative margins
		for ( var id in offCanvas ) {
			// Check if Slidebar is registered
			if ( isRegisteredSlidebar( id ) ) {
				// Calculate offset
				var offset;

				if ( offCanvas[ id ].side === 'top' || offCanvas[ id ].side === 'bottom' ) {
					offset = offCanvas[ id ].element.css( 'height' );
				} else {
					offset = offCanvas[ id ].element.css( 'width' );
				}
				// Apply negative margins
				if ( offCanvas[ id ].style === 'push' || offCanvas[ id ].style === 'overlay' || offCanvas[ id ].style === 'shift' ) {
					offCanvas[ id ].element.css( 'margin-' + offCanvas[ id ].side, '-' + offset );
				}
			}
		}

		// Reposition open Slidebars
		if ( this.getActiveSlidebar() ) {
			this.open( this.getActiveSlidebar() );
		}

		// Trigger event
		$( events ).trigger( 'css' );

		// Run callback
		if ( typeof callback === 'function' ) {
			callback();
		}
	};

	/**
	 * Controls
	 */

	this.open = function ( id, callback ) {
		// Check if Slidebars has been initialized
		if ( ! init ) {
			throw "Slidebars hasn't been initialized.";
		}

		// Check if id wasn't passed or if Slidebar isn't registered
		if ( ! id || ! isRegisteredSlidebar( id ) ) {
			throw "Error opening Slidebar, there is no Slidebar with id '" + id + "'.";
		}

		// Open
		var open = function () {
			// Set active state to true
			offCanvas[ id ].active = true;

			// Display the Slidebar
			offCanvas[ id ].element.css( 'display', 'block' );

			// Trigger event
			$( events ).trigger( 'opening', [ offCanvas[ id ].id ] );

			// Get animation properties
			var animationProperties = getAnimationProperties( id );

			// Apply css
			animationProperties.elements.css( {
				'transition-duration': animationProperties.duration + 'ms',
				'transform': 'translate(' + animationProperties.amount + ')'
			} );

			// Transition completed
			setTimeout( function () {
				// Trigger event
				$( events ).trigger( 'opened', [ offCanvas[ id ].id ] );

				// Run callback
				if ( typeof callback === 'function' ) {
					callback();
				}
			}, animationProperties.duration );
		};

		// Call open, close open Slidebar if active
		if ( this.getActiveSlidebar() && this.getActiveSlidebar() !== id ) {
			this.close( open );
		} else {
			open();
		}
	};

	this.close = function ( id, callback ) {
		// Shift callback arguments
		if ( typeof id === 'function' ) {
			callback = id;
			id = null;
		}

		// Check if Slidebars has been initialized
		if ( ! init ) {
			throw "Slidebars hasn't been initialized.";
		}

		// Check if id was passed but isn't a registered Slidebar
		if ( id && ! isRegisteredSlidebar( id ) ) {
			throw "Error closing Slidebar, there is no Slidebar with id '" + id + "'.";
		}

		// If no id was passed, get the active Slidebar
		if ( ! id ) {
			id = this.getActiveSlidebar();
		}

		// Close a Slidebar
		if ( id && offCanvas[ id ].active ) {
			// Set active state to false
			offCanvas[ id ].active = false;

			// Trigger event
			$( events ).trigger( 'closing', [ offCanvas[ id ].id ] );

			// Get animation properties
			var animationProperties = getAnimationProperties( id );

			// Apply css
			animationProperties.elements.css( 'transform', '' );

			// Transition completetion
			setTimeout( function () {
				// Remove transition duration
				animationProperties.elements.css( 'transition-duration', '' );

				// Hide the Slidebar
				offCanvas[ id ].element.css( 'display', '' );

				// Trigger event
				$( events ).trigger( 'closed', [ offCanvas[ id ].id ] );

				// Run callback
				if ( typeof callback === 'function' ) {
					callback();
				}
			}, animationProperties.duration );
		}
	};

	this.toggle = function ( id, callback ) {
		// Check if Slidebars has been initialized
		if ( ! init ) {
			throw "Slidebars hasn't been initialized.";
		}

		// Check if id wasn't passed or if Slidebar isn't registered
		if ( ! id || ! isRegisteredSlidebar( id ) ) {
			throw "Error toggling Slidebar, there is no Slidebar with id '" + id + "'.";
		}

		// Check Slidebar state
		if ( offCanvas[ id ].active ) {
			// It's open, close it
			this.close( id, function () {
				// Run callback
				if ( typeof callback === 'function' ) {
					callback();
				}
			} );
		} else {
			// It's closed, open it
			this.open( id, function () {
				// Run callback
				if ( typeof callback === 'function' ) {
					callback();
				}
			} );
		}
	};

	/**
	 * Active States
	 */

	this.isActive = function ( id ) {
		// Return init state
		return init;
	};

	this.isActiveSlidebar = function ( id ) {
		// Check if Slidebars has been initialized
		if ( ! init ) {
			throw "Slidebars hasn't been initialized.";
		}

		// Check if id wasn't passed
		if ( ! id ) {
			throw "You must provide a Slidebar id.";
		}

		// Check if Slidebar is registered
		if ( ! isRegisteredSlidebar( id ) ) {
			throw "Error retrieving Slidebar, there is no Slidebar with id '" + id + "'.";
		}

		// Return the active state
		return offCanvas[ id ].active;
	};

	this.getActiveSlidebar = function () {
		// Check if Slidebars has been initialized
		if ( ! init ) {
			throw "Slidebars hasn't been initialized.";
		}

		// Variable to return
		var active = false;

		// Loop through Slidebars
		for ( var id in offCanvas ) {
			// Check if Slidebar is registered
			if ( isRegisteredSlidebar( id ) ) {
				// Check if it's active
				if ( offCanvas[ id ].active ) {
					// Set the active id
					active = offCanvas[ id ].id;
					break;
				}
			}
		}

		// Return
		return active;
	};

	this.getSlidebars = function () {
		// Check if Slidebars has been initialized
		if ( ! init ) {
			throw "Slidebars hasn't been initialized.";
		}

		// Create an array for the Slidebars
		var slidebarsArray = [];

		// Loop through Slidebars
		for ( var id in offCanvas ) {
			// Check if Slidebar is registered
			if ( isRegisteredSlidebar( id ) ) {
				// Add Slidebar id to array
				slidebarsArray.push( offCanvas[ id ].id );
			}
		}

		// Return
		return slidebarsArray;
	};

	this.getSlidebar = function ( id ) {
		// Check if Slidebars has been initialized
		if ( ! init ) {
			throw "Slidebars hasn't been initialized.";
		}

		// Check if id wasn't passed
		if ( ! id ) {
			throw "You must pass a Slidebar id.";
		}

		// Check if Slidebar is registered
		if ( ! id || ! isRegisteredSlidebar( id ) ) {
			throw "Error retrieving Slidebar, there is no Slidebar with id '" + id + "'.";
		}

		// Return the Slidebar's properties
		return offCanvas[ id ];
	};

	/**
	 * Events
	 */

	this.events = {};
	var events = this.events;

	/**
	 * Resizes
	 */

	$( window ).on( 'resize', this.css.bind( this ) );
};

      // Initialize Slidebars
      var controller = new slidebars();
      controller.init();

      // Toggle Slidebars
      $( '.toggle-id-1' ).on( 'click', function ( event ) {
        // Stop default action and bubbling
        event.stopPropagation();
        event.preventDefault();

        // Toggle the Slidebar with id 'id-1'
        controller.toggle( 'id-1' );
      } );

      $( '.toggle-id-2' ).on( 'click', function ( event ) {
        // Stop default action and bubbling
        event.stopPropagation();
        event.preventDefault();

        // Toggle the Slidebar with id 'id-2'
        controller.toggle( 'id-2' );
      } );

      $( '.toggle-id-3' ).on( 'click', function ( event ) {
        // Stop default action and bubbling
        event.stopPropagation();
        event.preventDefault();

        // Toggle the Slidebar with id 'id-3'
        controller.toggle( 'id-3' );
      } );

      $( '.toggle-id-4' ).on( 'click', function ( event ) {
        // Stop default action and bubbling
        event.stopPropagation();
        event.preventDefault();

        // Toggle the Slidebar with id 'id-4'
        controller.toggle( 'id-4' );
      } );

      $( document ).on( 'click', '.js-close-any', function ( event ) {
           if ( controller.getActiveSlidebar() ) {
               event.preventDefault();
               event.stopPropagation();
               $('.hamburger').toggleClass('is-active');
               controller.close();
           }
       } );

       // Add close class to canvas container when Slidebar is opened
       $( controller.events ).on( 'opening', function ( event ) {
           $( '[canvas]' ).addClass( 'js-close-any' );
       } );

       // Add close class to canvas container when Slidebar is opened
       $( controller.events ).on( 'closing', function ( event ) {
           $( '[canvas]' ).removeClass( 'js-close-any' );
      //     $('.hamburger').toggleClass('is-active');
       } );

    }




  };
})(jQuery);
;
(function ($) {
    Drupal.behaviors.bt48_custom = {
        attach: function (context, settings) {

            $('.page-title').on('click', function (event) {
                // Stop default action and bubbling
                event.stopPropagation();
                event.preventDefault();
                var url = window.location.href = window.location.href.split("?")[0];
                var parts = location.search.substring(1).split('&');

                for (var x = 0; x < parts.length; x++) {

                    if (parts[x].startsWith('keywords=')) {
                        url = url + "?" + parts[x];
                        window.location.href = url;
                        break
                    }
                }


            });

            $('#title-asc').on('click', function (event) {
                // Stop default action and bubbling
                event.stopPropagation();
                event.preventDefault();
                var url = window.location.href;
                if (url.indexOf('&sort_by=title') == -1) {
                    if (url.indexOf('?keywords=') == -1) {
                        url = url + '?keywords=';
                    }
                    url = url + '&sort_by=title&sort_order=ASC';
                } else {
                    url = url.replace('sort_order=DESC', 'sort_order=ASC');
                }
                window.location.href = url;

            });

            $('#title-desc').on('click', function (event) {
                // Stop default action and bubbling
                event.stopPropagation();
                event.preventDefault();
                var url = window.location.href;
                if (url.indexOf('&sort_by=title') == -1) {
                    if (url.indexOf('?keywords=') == -1) {
                        url = url + '?keywords=';
                    }
                    url = url + '&sort_by=title&sort_order=DESC';
                } else {
                    url = url.replace('sort_order=ASC', 'sort_order=DESC');
                }

                window.location.href = url;

            });

            $('#relevancy').on('click', function (event) {
                // Stop default action and bubbling
                event.stopPropagation();
                event.preventDefault();
                var url = window.location.href;

                if (url.indexOf('&sort_by=title&sort_order=ASC') >= 0) {
                    url = url.replace('&sort_by=title&sort_order=ASC', '');
                } else {
                    if (url.indexOf('&sort_by=title&sort_order=DESC') >= 0) {
                        url = url.replace('&sort_by=title&sort_order=DESC', '');
                    }
                }

                window.location.href = url;
            });

        }
    };
})(jQuery);
;
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
})(jQuery);;
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
;
/*
 * Superfish v1.4.8 - jQuery menu widget
 * Copyright (c) 2008 Joel Birch
 *
 * Dual licensed under the MIT and GPL licenses:
 *  http://www.opensource.org/licenses/mit-license.php
 *  http://www.gnu.org/licenses/gpl.html
 *
 * CHANGELOG: http://users.tpg.com.au/j_birch/plugins/superfish/changelog.txt
 */
/*
 * This is not the original jQuery Superfish plugin.
 * Please refer to the README for more information.
 */

(function($){
  $.fn.superfish = function(op){
    var sf = $.fn.superfish,
      c = sf.c,
      $arrow = $(['<span class="',c.arrowClass,'"> &#187;</span>'].join('')),
      over = function(){
        var $$ = $(this), menu = getMenu($$);
        clearTimeout(menu.sfTimer);
        $$.showSuperfishUl().siblings().hideSuperfishUl();
      },
      out = function(){
        var $$ = $(this), menu = getMenu($$), o = sf.op;
        clearTimeout(menu.sfTimer);
        menu.sfTimer=setTimeout(function(){
          if ($$.children('.sf-clicked').length == 0){
            o.retainPath=($.inArray($$[0],o.$path)>-1);
            $$.hideSuperfishUl();
            if (o.$path.length && $$.parents(['li.',o.hoverClass].join('')).length<1){over.call(o.$path);}
          }
        },o.delay);
      },
      getMenu = function($menu){
        var menu = $menu.parents(['ul.',c.menuClass,':first'].join(''))[0];
        sf.op = sf.o[menu.serial];
        return menu;
      },
      addArrow = function($a){ $a.addClass(c.anchorClass).append($arrow.clone()); };

    return this.each(function() {
      var s = this.serial = sf.o.length;
      var o = $.extend({},sf.defaults,op);
      o.$path = $('li.'+o.pathClass,this).slice(0,o.pathLevels),
      p = o.$path;
      for (var l = 0; l < p.length; l++){
        p.eq(l).addClass([o.hoverClass,c.bcClass].join(' ')).filter('li:has(ul)').removeClass(o.pathClass);
      }
      sf.o[s] = sf.op = o;

      $('li:has(ul)',this)[($.fn.hoverIntent && !o.disableHI) ? 'hoverIntent' : 'hover'](over,out).each(function() {
        if (o.autoArrows) addArrow( $(this).children('a:first-child, span.nolink:first-child') );
      })
      .not('.'+c.bcClass)
        .hideSuperfishUl();

      var $a = $('a, span.nolink',this);
      $a.each(function(i){
        var $li = $a.eq(i).parents('li');
        $a.eq(i).focus(function(){over.call($li);}).blur(function(){out.call($li);});
      });
      o.onInit.call(this);

    }).each(function() {
      var menuClasses = [c.menuClass];
      if (sf.op.dropShadows){
        menuClasses.push(c.shadowClass);
      }
      $(this).addClass(menuClasses.join(' '));
    });
  };

  var sf = $.fn.superfish;
  sf.o = [];
  sf.op = {};

  sf.c = {
    bcClass: 'sf-breadcrumb',
    menuClass: 'sf-js-enabled',
    anchorClass: 'sf-with-ul',
    arrowClass: 'sf-sub-indicator',
    shadowClass: 'sf-shadow'
  };
  sf.defaults = {
    hoverClass: 'sfHover',
    pathClass: 'overideThisToUse',
    pathLevels: 1,
    delay: 800,
    animation: {opacity:'show'},
    speed: 'fast',
    autoArrows: true,
    dropShadows: true,
    disableHI: false, // true disables hoverIntent detection
    onInit: function(){}, // callback functions
    onBeforeShow: function(){},
    onShow: function(){},
    onHide: function(){}
  };
  $.fn.extend({
    hideSuperfishUl : function(){
      var o = sf.op,
        not = (o.retainPath===true) ? o.$path : '';
      o.retainPath = false;
      var $ul = $(['li.',o.hoverClass].join(''),this).add(this).not(not).removeClass(o.hoverClass)
          .children('ul').addClass('sf-hidden');
      o.onHide.call($ul);
      return this;
    },
    showSuperfishUl : function(){
      var o = sf.op,
        sh = sf.c.shadowClass+'-off',
        $ul = this.addClass(o.hoverClass)
          .children('ul.sf-hidden').hide().removeClass('sf-hidden');
      o.onBeforeShow.call($ul);
      $ul.animate(o.animation,o.speed,function(){ o.onShow.call($ul); });
      return this;
    }
  });
})(jQuery);;
/*
 * sf-Touchscreen v1.3b - Provides touchscreen compatibility for the jQuery Superfish plugin.
 *
 * Developer's note:
 * Built as a part of the Superfish project for Drupal (http://drupal.org/project/superfish)
 * Found any bug? have any cool ideas? contact me right away! http://drupal.org/user/619294/contact
 *
 * jQuery version: 1.3.x or higher.
 *
 * Dual licensed under the MIT and GPL licenses:
 *  http://www.opensource.org/licenses/mit-license.php
 *  http://www.gnu.org/licenses/gpl.html
 */

(function($){
  $.fn.sftouchscreen = function(options){
    options = $.extend({
      mode: 'inactive',
      breakpoint: 768,
      breakpointUnit: 'px',
      useragent: '',
      behaviour: 2,
      disableHover: false
    }, options);

    function activate(menu){
      var eventHandler = (('ontouchstart' in window) || (window.DocumentTouch && document instanceof DocumentTouch)) ? ['click touchstart','mouseup touchend'] : ['click','mouseup'];
      // Select hyperlinks from parent menu items.
      menu.find('li:has(ul)').children('a,span.nolink').each(function(){
        var item = $(this),
        parent = item.closest('li');
        if (options.disableHover){
          parent.unbind('mouseenter mouseleave');
        }
        if (options.behaviour == 2){
          if (parent.children('a.menuparent,span.nolink.menuparent').length > 0 && parent.children('ul').children('.sf-clone-parent').length == 0){
            var
            // Cloning the hyperlink of the parent menu item.
            cloneLink = parent.children('a.menuparent,span.nolink.menuparent').clone(),
            // Wrapping the hyerplinks in <li>.
            cloneLink = $('<li class="sf-clone-parent" />').html(cloneLink);
            // Removing unnecessary stuff.
            cloneLink.find('.sf-sub-indicator').remove(),
            // Adding a helper class and attaching them to the sub-menus.
            parent.children('ul').addClass('sf-has-clone-parent').prepend(cloneLink);
          }
        }
        // No .toggle() here as it's not possible to reset it.
        item.bind(eventHandler[0], function(event){
          // Already clicked?
          if (item.hasClass('sf-clicked')){
            // Depending on the preferred behaviour, either proceed to the URL.
            if (options.behaviour == 0){
              window.location = item.attr('href');
            }
            // or collapse the sub-menu.
            else if (options.behaviour == 1 || options.behaviour == 2){
              event.preventDefault();
              item.removeClass('sf-clicked');
              parent.hideSuperfishUl().find('a,span.nolink').removeClass('sf-clicked');
            }
          }
          // Prevent the default action otherwise.
          else {
            event.preventDefault();
            item.addClass('sf-clicked');
            parent.showSuperfishUl().siblings('li:has(ul)').hideSuperfishUl().find('.sf-clicked').removeClass('sf-clicked');
          }
        });
      });

      $(document).bind(eventHandler[1], function(event){
        if (menu.not(event.target) && menu.has(event.target).length === 0){
          menu.find('.sf-clicked').removeClass('sf-clicked');
          menu.find('li:has(ul)').hideSuperfishUl();
        }
      });
    }
    // Return original object to support chaining.
    // This is not necessary actually because of the way the module uses these plugins.
    for (var b = 0; b < this.length; b++) {
      var menu = $(this).eq(b),
      mode = options.mode;
      // The rest is crystal clear, isn't it? :)
      if (mode == 'always_active'){
        activate(menu);
      }
      else if (mode == 'window_width'){
        var breakpoint = (options.breakpointUnit == 'em') ? (options.breakpoint * parseFloat($('body').css('font-size'))) : options.breakpoint,
        windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth,
        timer;
        if ((typeof Modernizr === 'undefined' || typeof Modernizr.mq !== 'function') && windowWidth < breakpoint){
          activate(menu);
        }
        else if (typeof Modernizr !== 'undefined' && typeof Modernizr.mq === 'function' && Modernizr.mq('(max-width:' + (breakpoint - 1) + 'px)')) {
          activate(menu);
        }
        $(window).resize(function(){
          clearTimeout(timer);
          timer = setTimeout(function(){
            var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
            if ((typeof Modernizr === 'undefined' || typeof Modernizr.mq !== 'function') && windowWidth < breakpoint){
              activate(menu);
            }
            else if (typeof Modernizr !== 'undefined' && typeof Modernizr.mq === 'function' && Modernizr.mq('(max-width:' + (breakpoint - 1) + 'px)')) {
              activate(menu);
            }
          }, 50);
        });
      }
      else if (mode == 'useragent_custom'){
        if (options.useragent != ''){
          var ua = RegExp(options.useragent, 'i');
          if (navigator.userAgent.match(ua)){
            activate(menu);
          }
        }
      }
      else if (mode == 'useragent_predefined' && navigator.userAgent.match(/(android|bb\d+|meego)|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i)){
        activate(menu);
      }
    }
    return this;
  }
})(jQuery);
;
/**
 * @file
 * The Superfish Drupal Behavior to apply the Superfish jQuery plugin to lists.
 */

(function ($, Drupal, drupalSettings) {

  'use strict';

  /**
   * jQuery Superfish plugin.
   *
   * @type {Drupal~behavior}
   *
   * @prop {Drupal~behaviorAttach} attach
   *   Attaches the behavior to an applicable <ul> element.
   */
  Drupal.behaviors.superfish = {
    attach: function (context, drupalSettings) {
      // Take a look at each menu to apply Superfish to.
      $.each(drupalSettings.superfish || {}, function (index, options) {
        var $menu = $('ul#' + options.id, context);

        // Check if we are to apply the Supersubs plug-in to it.
        if (options.plugins || false) {
          if (options.plugins.supersubs || false) {
            $menu.supersubs(options.plugins.supersubs);
          }
        }

        // Apply Superfish to the menu.
        $menu.superfish(options.sf);

        // Check if we are to apply any other plug-in to it.
        if (options.plugins || false) {
          if (options.plugins.touchscreen || false) {
            $menu.sftouchscreen(options.plugins.touchscreen);
          }
          if (options.plugins.smallscreen || false) {
            $menu.sfsmallscreen(options.plugins.smallscreen);
          }
          if (options.plugins.supposition || false) {
            $menu.supposition();
          }
        }
      });
    }
  };
})(jQuery, Drupal, drupalSettings);
;
/**
 * @file
 * TOC API menu behavior.
 */

(function ($, Drupal) {

  "use strict";

  Drupal.behaviors.tocMenu = {
    attach: function (context) {
      $('form.toc-menu > select', context).change(function () {
        var value = $(this).val();
        if (value) {
          location.hash = value;
        }
        this.selectedIndex = 0;
      });
    }
  };

})(jQuery, Drupal);
;
