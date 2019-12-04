jQuery(document).ready(function () {
    var $menuToggle = jQuery('#hamb_01');
    var $menuWrap = jQuery('.menu');
    var $menuOverlay = $menuWrap.find('.menu_ol');
    var $menuCol = $menuWrap.find('.menu__col');
    var menuChangingState = false;

    // Al pinchar sobre el icono del menú
    $menuToggle.on('click', function () {
        if (!menuChangingState) {
            menuChangingState = true;
            var opening = !$menuWrap.is(':visible'); // If opening/closing the menu

            // If opening, display the menu wrap
            if (opening) {
                $menuWrap.css('display', 'block');
            }

            // Give DOM some time to think...
            setTimeout(function() {
                // Cambiamos el icono entre la "hamburguesa" y la X
                $menuToggle.toggleClass('open');

                // Activamos el menu
                $menuCol.toggleClass("menu__col--open");
                // Activamos el background del menu
                $menuOverlay.fadeToggle(500, function() {
                    // If closing, hide the menu wrap after fade animation
                    if (!opening) {
                        $menuWrap.css('display', 'none');
                    }
                    menuChangingState = false;
                });
            }, 0)
        }
    });

    // Al pinchar sobre la capa oscurecida del menu desplegado
    $menuOverlay.on('click', function () {
        // Cambiamos el icono entre la "hamburguesa" y la X
        $menuToggle.removeClass('open');

        // Desactivamos el menu
        $menuCol.removeClass("menu__col--open");
        // Desactivamos el background del menu
        jQuery(this).fadeToggle(500, function() {
            $menuWrap.css('display', 'none')
        });
    });
});
