jQuery(document).ready(function () {
   styleCookiesAdvice()
   isCookiesBarActive()
});

/**
 * Añade las clases y estructuras html necesarias para maquetar las cookies
 *
 */
function styleCookiesAdvice() {
	jQuery('#catapult-cookie-bar').addClass('cookies')
	jQuery('span.ctcc-left-side').addClass('col-lg-9 col-lg-offset-1 col-md-9 col-md-offset-1 col-sm-9 col-sm-offset-1 col-xs-9 col-xs-offset-1')
	jQuery('div.x_close').empty().addClass('col-lg-1 col-md-1 col-sm-1 col-xs-1 text-right').append('<img src="wp-content/themes/agriverdes/img/close.svg" id="cookies" class="cookies__close">')
	// jQuery('.x_close').on('click', function () {
	// 	//        jQuery('#catapult-cookie-bar').css("display", "none")
	// 	// jQuery('html').css("margin-top", "0");
	// })
}

function isCookiesBarActive() {
	if (jQuery('body').hasClass('has-cookie-bar') === false) {
		jQuery('#catapult-cookie-bar').hide()
		console.log('No tiene barra de cookies');
	}
}
