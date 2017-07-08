/**
 * Alcatraz Child JS
 */

( function( $ ) {

	var body = $( 'body' ),
		searchIcon = $( '.search' );

	var initStickyNav = function() {

		var windowWidth = $( window ).width(),
			tabletPortrait = 600,
			$header = $( '.site-header' );

		// Fire sticky navigation on tablet portrait+.
		if ( tabletPortrait <= windowWidth ) {

			$header.sticky({
				zIndex: 3
			});
		}

		// If the window is resized, or small to start, unstick the header.
		if ( tabletPortrait > windowWidth ) {

			$header.unstick();
		}
	};

	var createCategoryToggle = function() {

		var $toggle = '<span class="widget-toggle"><span class="widget-toggle-span span-1"></span><span class="widget-toggle-span span-2"></span></span>',
			categoryTitle = $( '.widget_categories .widget-title' ),
			archiveTitle = $( '.widget_archive .widget-title' );

		categoryTitle.append( $toggle );
		archiveTitle.append( $toggle );
	};

	var toggleWidgetContent = function() {

		$( this ).toggleClass( 'toggled' );
		$( this ).parent( 'h2' ).siblings( 'ul' ).slideToggle( 'slow' );
	};

	var toggleSearch = function( e ) {

		e.preventDefault();

		$( this ).parents( '.main-navigation__menu' ).next( '.search-form' ).slideToggle( 'slow' );
	};

	// Fire all the things. 🔥
	$( window ).on( 'load', initStickyNav );
	$( window ).on( 'resize', initStickyNav );
	$( document ).on( 'ready', createCategoryToggle );
	$( document.body ).on('click', '.widget-toggle', toggleWidgetContent );
	searchIcon.on( 'click', toggleSearch );

})( jQuery );
