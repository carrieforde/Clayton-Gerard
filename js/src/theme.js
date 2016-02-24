/**
 * Alcatraz Child JS
 */

( function( $ ) {

	// Executes when the document is ready
	jQuery( document ).ready( function( $ ) {

		// Add classes to paragraphs before headings
		$( 'h1, h2, h3, h4, h5, h6' ).prev( 'p' ).addClass( 'extra-p-margin' );

		$( '.cg-full-width-row p:last-child' ).addClass( 'last' );

		// Remove empty p tags
		$( 'p' ).each(function() {
			var $this = $( this );
			if( $this.html().replace(/\s|&nbsp;/g, '' ).length === 0 )
				$this.remove();
		});

		// Force full-width on The Studio
		$( '.the-studio, .single-portfolio' ).removeClass( 'boxed-content' ).addClass( 'full-width' );

		$( '.single-portfolio' ).removeClass( 'right-sidebar' );

		// Add slide toggle for the categories
		$( '.widget_categories .widget-title' ).append( '<span class="widget-toggle"><span class="widget-toggle-span span-1"></span><span class="widget-toggle-span span-2"></span></span>' );

		$( '.widget_categories .widget-toggle' ).click(function() {
			$( this ).toggleClass( 'toggled' );
			$( '.widget_categories ul' ).slideToggle( 'slow' );
		});

		$( '.widget_archive .widget-title' ).append( '<span class="widget-toggle"><span class="widget-toggle-span span-1"></span><span class="widget-toggle-span span-2"></span></span>' );

		$( '.widget_archive .widget-toggle' ).click(function() {
			$( this ).toggleClass( 'toggled' );
			$( '.widget_archive ul' ).slideToggle( 'slow' );
		});

	});

})( jQuery );
