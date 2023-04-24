<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agriverdes
 */

?>

        <div class="row footer" id="contacto">
            <div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 footer__col" style="padding-right:0px;padding-left:0px;">
                <div class="footer__back">
                    <img src="<?php echo get_template_directory_uri() . '/img/Arrow.svg'; ?>" width="25%" class="footer__back__arrow">
                </div>
            </div>

            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-0 col-sm-2 col-sm-offset-1 col-xs-9 col-xs-offset-1" style="margin-bottom:30px;">
                <img src="<?php echo get_template_directory_uri() . '/img/Logo_Color.svg'; ?>" width="100">
            </div>

            <div class="col-lg-3 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-7 col-xs-offset-3 footer__col">
                <h2 class="text-left">Calle Río de la Plata, 10.</h2>
                <h2 class="text-left">30700. Torre-Pacheco, Murcia </h2>
                <p><a href="https://www.google.es/maps/place/Agriverdes+Del+Mediterr%C3%A1neo/@37.7451702,-0.9496677,17z/data=!3m1!4b1!4m5!3m4!1s0xd636c5e9544438f:0x7c94e5ea08955b86!8m2!3d37.745166!4d-0.947479" target="_blank">ver mapa</a></p>
            </div>

            <div class="col-lg-3 col-lg-offset-0 col-md-4 col-md-offset-0 col-sm-3 col-sm-offset-0 col-xs-7 col-xs-offset-3 footer__col" style="margin-bottom:35px;">
                <a href="tel:968587336"><h2 class="text-left">968 58 73 36</h2></a>
                <h2 class="text-left"><a href="mailto:info@agriverdes.com" target="_blank">info@agriverdes.com </a></h2>
				
				<a href='/politica-de-calidad/' > <p class="text-left">Política de Calidad</p></a>
            
                <a href='/aviso-legal' rel='nofollow'><p class="text-left">Aviso legal y Privacidad</p> </a>
				
				
                <p class="hidden-xs hidden-sm hidden-md hidden-lg"><a href="http://www.facebook.com" target="_blank">facebook </a> / <a href="http://www.twitter.com" target="_blank">twitter </a></p>
            </div>
        </div>
    <?php wp_footer(); ?>


     <script>
        AOS.init();
    </script>


    </body>
</html>
