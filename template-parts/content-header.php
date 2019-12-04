<?php
/*
 *  Problemas del HEADER:
 *   - No tiene que haber transición al hacer :hover en los botones de "Busco..." -->
 */
// Página "Inico"
$page_inicio_id = 5;
$base_link = get_page_link($page_inicio_id);

$link_class = (is_page($page_inicio_id)) ? ' menu-item-anchor' : '';
$trabajadores_url = (is_home()) ? $base_link . '#trabajadores' : '';
$trabajo_url = (is_home()) ? $base_link . '#trabajo' : '';
?>
<div class="header_bg"></div>
<div class="row header" id="header">
    <div class="col-lg-1 col-lg-offset-1 col-md-1 col-md-offset-1 col-sm-1 col-sm-offset-1 col-xs-1 col-xs-offset-1 header__hamb" id="hamb">
        <div id="hamb_01">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 header__trabajo__row__btn hidden-xs <?php echo $link_class; ?> boton_agencia" data-url="<?php echo $trabajadores_url; ?>" id="trabajadores-btn">
                    <!--<h5><a href="<?php // echo $base_link; ?>#trabajadores">BUSCO TRABAJADORES</a></h5>-->
                <h5>AGENCIA DE COLOCACIÓN</h5>
                </div>

    <div class="col-lg-4  col-md-3 col-sm-3 col-xs-8 trans_width header-logo-wrap">
        <a href="<?php echo get_site_url(); ?>" class="header-logo"><img src="<?php echo get_template_directory_uri() . '/img/logo_bn3.svg'; ?>" class="header-logo-image"></a>
    </div>

    <div class="col-lg-5 col-md-6 col-sm-6 hidden-xs header__trabajo trans_width">
        <div class="row header__trabajo__row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 header__trabajo__row__btn <?php echo $link_class; ?>  ocultar_pagina_colocacion" data-url="<?php echo $trabajadores_url; ?>" id="trabajadores-btn">
                    <!--<h5><a href="<?php // echo $base_link; ?>#trabajadores">BUSCO TRABAJADORES</a></h5>-->
                <h5>BUSCO TRABAJADORES</h5>
                </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 header__trabajo__row__btn <?php echo $link_class; ?> ocultar_pagina_colocacion" data-url="<?php echo $trabajo_url; ?>" id="trabajo-btn">
                    <h5>BUSCO TRABAJO</h5>
                </div>
        </div>
    </div>
</div>
