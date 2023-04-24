<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agriverdes
 */

?>
<div class="row full_img" style="background-image:url(<?php echo get_template_directory_uri() . '/img/08.jpg'; ?>)"></div>

<div id="trabajo" class="row sticky-parent wwu" data-sticky-breakpoint="767">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 hidden-sm hidden-md hidden-lg">
        <h5 class="text-center">BUSCO TRABAJO</h5>
    </div>
    <div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 col-sm-6 col-sm-offset-0 wwu__info">
        <div class="row wwu3">
            <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-9 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                <h1 class="text-left aos-init aos-animate"
data-aos="fade-up"
data-aos-duration="1200" style="padding:0;margin-bottom:2em;">Trabaja con nosotros.</h1>
                <p class="sangria aos-init aos-animate"
data-aos="fade-up"
data-aos-duration="1200"
data-aos-delay="100">El activo más importante de nuestra empresa es nuestra base de recursos humanos. Por lo que ponemos mucho empeño en cuidar y formar a nuestros trabajadores. Para entrar en nuestra bolsa de trabajo, introduce tus datos en el siguiente formulario. </p>
            </div>
        </div>
    </div>

    <!--<div class="col-lg-5 col-lg-offset-7 col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 form holder trans_width sticky-element" data-related-element-id="trabajo-btn">-->
    <div class="col-lg-5 col-lg-offset-7 col-md-6 col-md-offset-6 col-sm-6 col-sm-offset-6 trans_width form-wrap sticky-element" data-related-element-id="trabajo-btn">
        <div class="form sticky-element-inner">
            <?php echo do_shortcode('[contact-form-7 id="18" title="Busco trabajo" html_class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0"]'); ?>
        </div>
    </div>
</div>
