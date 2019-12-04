<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agriverdes
 */
// Página "Inico"
$page_inicio_id = 5;
$base_link = get_page_link($page_inicio_id);
// Post anclado en el menú "Siempre con nosotros"
$menu_post = get_post(24);
$page_aviso_legal = get_page(50);


$link_class = (is_page($page_inicio_id)) ? ' menu-item-anchor' : '';

?>
<div class="menu">
    <div class="menu_ol" style="display:none;"></div>

    <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 menu__col">
        <div class="row menu__col__row">

            <div class="col-lg-12 col-lg-offset-0 col-md-12 col-sm-12 col-xs-12 menu__col__row__enlaces">
                <h1><a class="menu-item<?php echo $link_class; ?>" href="<?php echo $base_link; ?>#empresa">Empresa</a></h1>
                <h1><a class="menu-item<?php echo $link_class; ?>" href="<?php echo $base_link; ?>#servicios">Servicios</a></h1>
                <h1><a class="menu-item<?php echo $link_class; ?>" href="<?php echo $base_link; ?>#documentacion">Documentación Online</a></h1>
                <h1 class="hidden-sm hidden-md hidden-lg"><a class="menu-item<?php echo $link_class; ?>" href="<?php echo $base_link; ?>#trabajo">Busco Trabajo</a></h1>
                <h1 class="hidden-sm hidden-md hidden-lg"><a class="menu-item<?php echo $link_class; ?>" href="<?php echo $base_link; ?>#trabajadores">Busco Trabajadores</a></h1>
                <h1><a class="menu-item<?php echo (is_home()) ? ' menu-item-anchor' : ''; ?>" href="<?php echo get_post_page_permalink(); ?>">Noticias</a></h1>
                <h1><a class="menu-item menu-item-anchor" href="#contacto">Contacto</a></h1>
            </div>

            <div class="col-lg-12 col-lg-offset-0 col-md-12 col-sm-12 col-xs-12 siempre">
                <p><a class="menu-item<?php echo (is_home()) ? ' menu-item-anchor' : ''; ?>" href="<?php echo get_post_page_permalink() . '#' . $menu_post->post_name; ?>">"<?php echo $menu_post->post_title; ?>"</a></p>
            </div>

            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-1 col-sm-12 col-xs-12 hidden-xs hidden-sm menu__footer">
                <p>Calle Río de la plata, 10 - Bajo. Apdo. 205<br>30700. Torre-Pacheco, Murcia.</p>
                <p><a target="_blank" href="https://www.google.es/maps/place/Agriverdes+Del+Mediterr%C3%A1neo/@37.7451702,-0.9496677,17z/data=!3m1!4b1!4m5!3m4!1s0xd636c5e9544438f:0x7c94e5ea08955b86!8m2!3d37.745166!4d-0.947479">Ver mapa</a></p>
                <p><a target="_blank" href="<?php echo get_permalink($page_aviso_legal->ID); ?>"><?php echo $page_aviso_legal->post_title; ?></a></p>
            </div>

            <div class="col-lg-5 col-lg-offset-0 col-md-5 col-sm-12 col-xs-12 hidden-xs hidden-sm menu__footer">
                <p><a href="tel:+34968587336">T.  968 587 336</a><br/>F. 968 585 555<br/><a href="mailto:info@agriverdes.com">info@agriverdes.com</a></p>
                <p><a target="_blank" href="https://es-es.facebook.com/">facebook</a> / <a target="_blank" href="https://twitter.com/">twitter</a><br>
            </div>

            <div class="col-lg-3 col-lg-offset-0 col-md-4 col-sm-12 col-xs-12 hidden-xs hidden-sm hidden-md hidden-lg menu__footer logos">
                <img src="<?php echo get_template_directory_uri() . '/img/Logo1.svg'; ?>" width="20%" style="margin-right:12px;">
                <img src="<?php echo get_template_directory_uri() . '/img/Logo2.svg'; ?>" width="50%">
            </div>
        </div>
    </div>
</div>
