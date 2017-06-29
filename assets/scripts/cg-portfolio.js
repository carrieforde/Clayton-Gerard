/**
 * file: cg-portfolio.js
 *
 * Adds interaction layer to the single portfolio.
 */
window.cgPortfolio = {};

( function( window, $, app ) {

	// Constructor.
	app.init = function() {

		app.cache();

		if ( app.meetsRequirements() ) {
			app.bindEvents();
		}
	};

	// Cache all the things.
	app.cache = function() {
		app.$c = {
			window: $( window ),
			projectImages: $( '.cg-project__images' )
		};
	};

	// Combine all events.
	app.bindEvents = function() {
		app.$c.window.on( 'load', app.initFlickity );
	};

	// Do we meet the requirements?
	app.meetsRequirements = function() {
		return app.$c.projectImages.length;
	};

	// Some function.
	app.initFlickity = function() {
		
		app.$c.projectImages.flickity({
			imagesLoaded: true,
			cellSelector: '.project-image',
			autoPlay: true,
			contain: true,
			wrapAround: true,
		});
	};
	
	// Engage!
	$( app.init );

})( window, jQuery, window.cgPortfolio );
