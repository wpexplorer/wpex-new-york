;(function( $ ){

  'use strict';

		if ( ( 'ontouchstart' in window )
			|| (navigator.MaxTouchPoints > 0)
			|| (navigator.msMaxTouchPoints > 0)
		) {

		var $parentLis = $( '.wpex-drop-menu li.menu-item-has-children' );

		$( '.wpex-drop-menu li.menu-item-has-children > a' ).each( function() {

			 $( this ).on( 'click', function( e ) {

			 	var $parent = $( this ).parent( 'li' );
				if ( ! $parent.hasClass( 'wpex-clicked' ) ) {
					$parentLis.removeClass( 'wpex-clicked' );
					$parent.addClass( 'wpex-clicked' );
					e.preventDefault();
			    } else {
					return true;
			    }

			} );

		} );

		$( document ).on( 'click touchstart MSPointerDown', function( event ) {

			$parentLis.removeClass( 'wpex-active' );

		} );

	  }

} ) ( jQuery );