jQuery(document).ready(function () {

    /**
     * Función para deshabilitar en menú
     * 
     * @returns void
     */
    function disableMenu() {
        var $menuToggle = jQuery('#hamb_01');
        var $menuWrap = jQuery('.menu');
        var $menuOverlay = $menuWrap.find('.menu_ol');
        var $menuCol = $menuWrap.find('.menu__col');

        $menuToggle.removeClass('open');

        // Desactivamos el menu
        $menuCol.removeClass("menu__col--open");
        // Desactivamos el background del menu
        $menuOverlay.fadeToggle(500, function() {
            $menuWrap.css('display', 'none')
        });
    }

    /**
     * Devuelve el último componente de nombre de una ruta
     * 
     * @param string path Una ruta 
     * @returns string Devuelve el nombre base de path
     */
    function baseName(path)
    {
        var base = new String(path).substring(path.lastIndexOf('/') + 1);

        if (base.lastIndexOf(".") != -1) {
            base = base.substring(0, base.lastIndexOf("."));
        }
        return base;
    }


    /**
     * Programatically scroll to a DOM element
     */
     function runProgScroll(scrollPosition, toggleId) {
        PROGRAMMATIC_SCROLLING = true;
        if (toggleId) {
            CLICKED_HREF_SCROLL = toggleId;
        }

        jQuery('html, body').stop().animate({
            scrollTop: scrollPosition
        }).promise().then(function() {
            PROGRAMMATIC_SCROLLING = false;
        })
     }

    /*
     * Clic sobre el boton "Busco trabajadores"
     */
    jQuery('#trabajadores-btn').on('click', function () {
        if (!jQuery(this).hasClass('-active')) {

            var url = jQuery(this).data('url');

            if (url !== '') {
                window.location.href = url;
            } else {
                jQuery(this).addClass('-active');
                runProgScroll(jQuery('#trabajadores').offset().top - jQuery('#header').height(), 'trabajadores-btn');
                disableMenu();
            }
        }
    });

    /*
     * Clic sobre el boton "Busco trabajo"
     */
    jQuery('#trabajo-btn').on('click', function () {
        if (!jQuery(this).hasClass('-active')) {
            
            var url = jQuery(this).data('url');

            if (url !== '') {
                window.location.href = url;
            } else {
                jQuery(this).addClass('-active');
                runProgScroll(jQuery('#trabajo').offset().top - jQuery('#header').height(), 'trabajo-btn');
                disableMenu();
            }
        }
    });

    /*
     * Clic sobre el boton de la flecha
     */
    jQuery('.footer__back').on('click', function () {
        runProgScroll(0)
    });

    /*
     * Clic sobre el enlaces del menu
     */
    jQuery('.menu-item').on('click', function (event) {
        disableMenu();

        // Si los enlaces son en la misma pagina
        if (jQuery(this).hasClass('menu-item-anchor')) {
            event.preventDefault();
            var toScroll = baseName(jQuery(this).attr('href'));
            var scrollOptions = {
                scrollTop: jQuery(toScroll).offset().top - jQuery('#header').height()
                        //        }, 500, 'easeInOutQuint');
            };

            jQuery('html, body').stop().animate(scrollOptions, 1000, 'swing');
        }
    });
});
