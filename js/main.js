 /**
 * Theme functions file
 */
(function ($) {

    var $window = $(window);
 
    /**
    * Window load (jQuery)
    */
	$window.load(function() {
	  setTimeout(function(){ $("body").removeClass("preload"); }, 30);
	});


    /**
    * Document ready (jQuery)
    */
    $(function () {

        var $gallery_offer      = $('#gallery-offer'),
            $header_slider_id   = $('#slider'),
            $offer_slider_id    = $('#gallery-offer');


		/**
		* Dropdown toggle vertical-dropdown menu.
		*/
		var screenReaderText = {"expand":"<span class=\"screen-reader-text\">rozwi\u0144 menu potomne<\/span>","collapse":"<span class=\"screen-reader-text\">zwi\u0144 menu potomne<\/span>"};

		$( '.vertical.dropdown .menu .page_item_has_children > a, .vertical.dropdown .menu-item-has-children > a' ).after( '<button class="dropdown-toggle" aria-expanded="false">' + screenReaderText.expand + '</button>' );

		$( '.dropdown-toggle' ).click( function( e ) {
			var _this = $( this );
			e.preventDefault();
			_this.toggleClass( 'toggle-on' );
			_this.next( '.children, .sub-menu' ).toggleClass( 'toggled-on' );
			_this.attr( 'aria-expanded', _this.attr( 'aria-expanded' ) === 'false' ? 'true' : 'false' );
			_this.html( _this.html() === screenReaderText.expand ? screenReaderText.collapse : screenReaderText.expand );
		});


		/**
		* Activate main slider.
		*/
		$window.load(function() {
    		$header_slider_id.sllider('',false, true);
		});
        $offer_slider_id.sllider('auto',false, false);
        $('#client-reviews').sllider('auto',true, false);


        /*
         * If Resize window
         * */
        $window.on('resize', function () {

            var $windowheight   = $window.height(),
                $windowWidth    = $window.width(),
                
                $offer_slider_height = 682*($offer_slider_id.width()/1024);

                if ($windowWidth > 750 && $windowheight <= 500) {
                             var $windowheight = 675;
                }

                $header_slider_id.height($windowheight);           
                $offer_slider_id.height($offer_slider_height);
               
        }).resize();
        
        /**
         *  function menu 
         */
                //if resize window
                $('#header-menu').nav();

                // if click button menu 
                $('button.icon-button-small-menu').on('click', function(e){
        
                    var item = $(this).next();
        
                    item.toggleClass( item.data("class") + " small-menu" );
                    $( '#site-header' ).toggleClass( "menu-active" );
        
                    e.preventDefault();
                });
        
                // If Menu focus
                $( function() { $( '.horizontal' ).find( 'a' ).on( 'focus blur', function() {
                       $( this ).parents().toggleClass( 'focus' );
                   });
                });


		/**
		* Activate rwd table.
		*/
	    $('.hentry table').table();


        /**
        * Image Popup
        */
            //Translating magnificPopup
            $.extend(true, $.magnificPopup.defaults, {
              tClose: datalanuge.close, // Alt text on close button
              tLoading: datalanuge.load, // Text that is displayed during loading. Can contain %curr% and %total% keys
              gallery: {
                tPrev: datalanuge.prev, // Alt text on left arrow
                tNext: datalanuge.next, // Alt text on right arrow
                tCounter: '%curr% '+ datalanuge.of + ' %total%' // Markup for "1 of 7" counter
              },
              image: {
                tError: '<a href="%url%">'+ datalanuge.image +'</a>' + datalanuge.error_image // Error message when image could not be loaded
              },
              ajax: {
                tError: '<a href="%url%">'+ datalanuge.image +'</a>' + datalanuge.error_image // Error message when ajax request failed
              }
            });       
       
            // Single image
            $('.image-popup').magnificPopup({
              type:'image',
            });

            //Button to gallery    
            $('.gallery-popup').on('click', function () {
                $('.gallery').magnificPopup('open');
            });

            //Gallery image    
            $('.gallery').each(function () {
               
               $(this).magnificPopup({
                    delegate: 'a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]',
                    type: 'image',
                    gallery: {
                        enabled: true,
                    }
               });
            });

    });


    /*******************
    * Function Section
    ********************/


	/**
	* Function slider (Flexslider).
	*/
    $.fn.sllider = function(size, cnav, dnav, animation, loop, iwidth, imargin) {
        return this.each(function () {
       
            $(this).flexslider({
                animation: animation || "fade",
                controlNav: cnav || false,
                directionNav: dnav || false,
                animationLoop: loop || true,
                useCSS: true,
                smoothHeight: false,
                touch: true,
                pauseOnAction: true,
                itemWidth: iwidth || 0,
                itemMargin: imargin || 0,
                start: function(slider){
                           slider.removeClass('loading');
                        }                
            });
        });
    };
	/**
	* Function rwd table.
	*/
    $.fn.table = function() {
        return this.each(function () {
        	var headertext = [];

			var $this = $(this);

			$this.find('thead td, th').each(function(){
         		headertext.push($(this).html());
			});

			$this.find('tbody tr').each(function(){
    				$(this).find('td').each(function(index){
        					$(this).attr('data-th', headertext[index]);
					});
			});
		});
	};

    /**
    * Function rwd nav.
    */
   $.fn.nav = function(nav) {
        return this.each(function () {

           var $this = $(this);

           	$window.on('resize orientationchange', function () {

           	var window_width = $window.width();

           		if (window_width > 768) {

					$classes = $this.data("class");

					// Usuwanie classy z menu
					if ($this.hasClass( "small-menu" )) {
						$( '#site-header' ).removeClass("menu-active");
						$this.removeClass();
						$this.addClass( $classes );
					 }
				}
			}).resize();
		});
  };
})( jQuery );