<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agriverdes
 */

?>
<div class="row full_img" style="background-image:url(<?php echo get_template_directory_uri() . '/img/05.jpg'; ?>)"></div>

<div id="trabajadores" class="row sticky-parent wwu" data-sticky-breakpoint="767">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-md hidden-lg">
        <h5 class="text-center">BUSCO TRABAJADORES</h5>
    </div>

    <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-6 col-sm-offset-0 wwu__info">

        <div class="row entradilla3">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                <h1 class="text-left aos-init aos-animate"
        data-aos="fade-up"
        data-aos-duration="1200"
        style="padding:0;">Contamos con más de 900 trabajadores experimentados.</h1>
            </div>
        </div>

        <div class="row visible-xs">
            <div class="form">
                <?php echo do_shortcode('[contact-form-7 id="4" title="Busco trabajadores" html_class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0"]'); ?>
            </div>
        </div>

        <div class="row wwu2">
            <div class="col-lg-3 col-md-5 col-sm-10 col-xs-11 slider trans_width" style="margin-bottom:45px;">
                <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/img/06.jpg'; ?>" width="100%" style="margin-bottom:2em;">
            </div>
            <div class="col-lg-2 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10 col-xs-offset-1 aos-init aos-animate"
        data-aos="fade-up"
        data-aos-duration="1200"
        data-aos-delay="100" style="margin-bottom:2em;">
                <p>El 80% de las personas que trabajan con nosotros posee una amplia experiencia y formación especializada en cada puesto que desempeña.</p>
            </div>
        </div>

        <div class="row wwu2">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                <h2 class="aos-init aos-animate"
        data-aos="fade-up"
        data-aos-duration="1200">Somos una gran familia.</h2>
                <p class="sangria aos-init aos-animate"
        data-aos="fade-up"
        data-aos-duration="1200"
        data-aos-delay="100" >Entendemos que el éxito de nuestra empresa proviene de la implicación de cada uno de nuestros trabajadores. Con el paso de los años y las experiencias compartidas, nos hemos convertido en una gran familia, donde cada uno conoce su función y trabaja en equipo para dar lo máximo de sí mismo.</p>
            </div>
        </div>

        <div class="row wwu2">
            <div class="col-lg-5 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-10 col-sm-offset-2 col-xs-10 col-xs-offset-1 trans_width" style="margin-bottom:4em;">
                <img class="img-responsive" src="<?php echo get_template_directory_uri() . '/img/07.jpg'; ?>">
            </div>
        </div>

        <div class="row wwu2" style="margin-bottom:6em;">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                <p class="sangria  aos-init aos-animate"
data-aos="fade-up"
data-aos-duration="1200"
data-aos-delay="200">En nuestro proceso de selección, contamos con todo tipo de perfiles para el trabajo. Podemos asegurar que cada una de las personas que forman parte de nuestra empresa posee la formación adecuada y específica para su puesto.</p>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-lg-offset-7 col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 col-xs-12 trans_width form-wrap sticky-element hidden-xs" data-related-element-id="trabajadores-btn">
        <div class="form sticky-element-inner">
            <?php echo do_shortcode('[contact-form-7 id="4" title="Busco trabajadores" html_class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0"]');?>
        </div>
    </div>
</div>
