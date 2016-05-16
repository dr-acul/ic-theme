+function($) {
	'use strict';

	$(document).ready(function() {
		/* Moblie menu slide effect*/
		$( "#ict-navbar-button" ).click(function() {
				$( "#ict-main-menu" ).slideToggle( "slow" );
		} );
		/* Remove widgets from small social header */
		/* TODO: find a solution, this is just... */
		$( "#ict-small-header-social div.sfmsb_widget" ).siblings().remove();
	} );
}(jQuery);