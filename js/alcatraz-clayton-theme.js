/**
 * Alcatraz Child JS
 */

( function( $ ) {

	// Executes when the document is ready
	jQuery( document ).ready( function( $ ) {

		// Add classes to paragraphs before headings
		$( 'h1, h2, h3, h4, h5, h6' ).prev( 'p' ).addClass( 'extra-p-margin' );

		// Remove empty p tags
		$( 'p' ).each(function() {
			var $this = $( this );
			if( $this.html().replace(/\s|&nbsp;/g, '' ).length === 0 )
				$this.remove();
		});

	});

})( jQuery );
