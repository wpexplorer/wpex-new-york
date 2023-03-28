var wpex = {};

( function( $ ) {

	'use strict';

	var wpex = {

		/**
		 * Define cache var
		 *
		 * @since 1.0.0
		 */
		cache: {},

		/**
		 * Main Function
		 *
		 * @since 1.0.0
		 */
		init: function() {
			this.cacheElements();
			this.bindEvents();
		},

		/**
		 * Cache Elements
		 *
		 * @since 1.0.0
		 */
		cacheElements: function() {
			this.cache = {
				$isMobile : false,
				$isRTL    : false
			};
		},

		/**
		 * Bind Events
		 *
		 * @since 1.0.0
		 */
		bindEvents: function() {

			// Get sef
			var self = this;

			// Check RTL
			if ( $( 'body' ).hasClass( 'rtl' ) ) {
				self.cache.$isRTL = true;
			}

			// Check if touch is supported
			self.cache.$isTouch = ( ( 'ontouchstart' in window ) || ( navigator.msMaxTouchPoints > 0 ) );

			// Run on document ready
			$( document ).ready( function() {
				self.mobileCheck();
				self.sliders();
				self.responsiveEmbeds();
				self.commentScrollTo();
				self.commentLastClass();
				self.commentPlaceholders();
				self.scrollTop();
				self.mobileMenu();
			} );

			// Run on Window Load
			$( window ).on( 'load', function() {
				$( 'body' ).addClass( 'wpex-site-loaded' );
				self.masonry();
			} );

		},

		/**
		 * Mobile Check
		 *
		 * @since 1.0.0
		 */
		mobileCheck: function() {
			if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test( navigator.userAgent ) ) {
				$( 'body' ).addClass( 'wpex-is-mobile-device' );
				this.cache.$isMobile = true;
				return true;
			}
		},

		/**
		 * Sliders
		 *
		 * @since 1.0.0
		 */
		sliders: function() {

			if ( typeof( $.fn.owlCarousel ) !== 'undefined' ) {

				var $sliders = $( '.wpex-slider' );
				$sliders.each( function() {
					var $this = $( this );
					$this.imagesLoaded( function() {
						$this.show();
						$this.owlCarousel( $this.data( 'settings' ) );
					} );
				} );

			}

		},

		/**
		 * Masonry Grids
		 *
		 * @since 1.0.0
		 */
		masonry: function() {
			if ( typeof( $.fn.masonry ) !== 'undefined' ) {
				var self       = this,
					$grid      = $( '.wpex-entries' );
				$grid.each( function() {
					var $this     = $( this ),
						$settings = $this.data( 'settings' );
						if ( $settings ) {
							$this.imagesLoaded( function() {
								$this.isotope( $settings );
							} );
						}
				} );
			}
		},

		/**
		 * Responsive embeds
		 *
		 * @since 1.0.0
		 */
		responsiveEmbeds: function() {
			$( '.wpex-responsive-embed' ).fitVids( {
				ignore: '.wpex-fitvids-ignore'
			} );
			$( '.wpex-responsive-embed' ).addClass( 'wpex-show' );
		},

		/**
		 * Comment link scroll to
		 *
		 * @since 1.0.0
		 */
		commentScrollTo: function() {
			$( '.single .comments-link, .wpex-post-meta .wpex-comment' ).click( function() {
				var $target = $( '#comments' );
				var $offset = 30;
				if ( $target.length ) {
					$( 'html,body' ).animate({
						scrollTop: $target.offset().top - $offset
					}, 500 );
					return false;
				}
			} );
		},

		/**
		 * Comments last class
		 *
		 * @since 1.0.0
		 */
		commentLastClass: function() {
			$( '.commentlist li.pingback' ).last().addClass( 'last' );
		},

		/**
		 * Uses placeholders for comments instead of labels
		 *
		 * @since 1.0.0
		 */
		commentPlaceholders: function() {
			if ( ! $( 'body' ).has( '.comment-form' ) ) {
				return;
			}
			$( '.comment-form-author, .comment-form-email, .comment-form-url, .comment-form-comment' ).each( function() {
				var label     = $( this ).find( 'label');
				var input     = $( this ).find( 'input, textarea' );
				if ( label.length ) {
					label.addClass( 'screen-reader-text' );
					input.attr( 'placeholder', label.text() );
				}
			} );
		},

		/**
		 * Mobile Menu
		 *
		 * @since 1.0.0
		 */
		mobileMenu: function() {
			var $closedSymbol = this.cache.$isRTL ? '&#9668;' : '&#9658;';
			if ( $.fn.slicknav != undefined ) {
				var $mobileMenuAlt = $( '.wpex-mobile-menu-alt ul' );
				var $menu = $mobileMenuAlt.length ? $mobileMenuAlt : $( '.wpex-main-menu .wpex-drop-menu' );
				if ( $menu.length ) {

					// Create mobile cart div
					var $mobileCartLink = $( '<div class="wpex-menu-cart-mobile"></div>' );


					// Clone menu cart
					var $mainMenu = $( '.wpex-main-menu > .wpex-container' );
					var $menuCart = $mainMenu.find( ' .wpex-menu-cart-total' ).clone().appendTo( $mobileCartLink );

					// Add mobile menu
					$menu.slicknav( {
						prependTo        : '.wpex-main-menu > .wpex-container',
						label            : wpexargs.mobileSiteMenuLabel,
						allowParentLinks : true,
						closedSymbol     : $closedSymbol
					} );

					// Append menu cart to mobile menu wrap
					$mobileCartLink.appendTo( $( '.slicknav_menu' ) );

				}
			}
		},

		/**
		 * Scroll top function
		 *
		 * @since 1.0.0
		 */
		scrollTop: function() {

			var $scrollTopLink = $( 'a.wpex-site-scroll-top' );

			$( window ).scroll(function () {
				if ( $( this ).scrollTop() > 100 ) {
					$scrollTopLink.addClass( 'wpex-show' );
				} else {
					$scrollTopLink.removeClass( 'wpex-show' );
				}
			} );

			$scrollTopLink.on( 'click', function() {
				$( 'html, body' ).animate( {
					scrollTop : 0
				}, 400 );
				return false;
			} );

		},

	}; // END wpexFunctions

	// Get things going
	wpex.init();

} ) ( jQuery );