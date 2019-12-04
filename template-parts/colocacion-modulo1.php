<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agriverdes
 */

?>
<!-- texto inicial -->
<div class="row entradilla2">
    <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
        <h1 style="padding:0;" class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">Buscamos la conjunción entre los perfiles de trabajo disponibles y las necesidades laborales de las empresas del sector</h1>
    </div>
</div>
<!-- modulo imagen y texto -->
<div class="row empresa1">
    <div class="col-lg-5 col-md-7 col-sm-6 col-xs-11 slider trans_width">
        <img class="img-responsive" src="http://agriverdes.test/wp-content/themes/agriverdes/img/02.jpg" width="100%">
    </div>
    <div class="col-lg-3 col-lg-offset-2 col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-10 col-xs-offset-1">
        <p class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">
Agriverdes selecciona y tiene una bolsa de trabajo de personal disponibles para las neceisdads de nuestros clientes.
         </p>
    </div>
</div>

<!-- modulo formulario a la derecha -->
<div class="row servicios1">
     <div class="col-lg-4 col-lg-offset-2 col-md-4 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-10 col-xs-offset-1">
        <p style="margin-bottom:4em;" class="aos-init aos-animate" data-aos="fade-up" data-aos-duration="1200">
            Selecciona una de las dos opciones y cumplimenta el formulario, te ayudaremos a encontrar lo que buscas:
        </p>


                <div onclick="mostrarBuscoTrabajadoresForm()" style="margin-bottom:4em;" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header__trabajo__row__btn  <?php echo $link_class; ?> busco_trabajadores_boton z_index_negativo"  data-url="<?php echo $trabajadores_url; ?>" id="busco_trabajadores_boton">
                    <h5>Busco trabajadores</h5>
                </div>

                <div onclick="mostrarBuscoTrabajoForm()" style="margin-bottom:4em;"  class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header__trabajo__row__btn <?php echo $link_class; ?> busco_trabajo_boton z_index_negativo" data-url="<?php echo $trabajadores_url; ?>" id="busco_trabajo_boton">
                    <h5>Busco trabajo</h5>
                </div>

                <h1 style="margin-bottom:4em;"  class="aos-init aos-animate texto_trabajadores texto-oculto" data-aos="fade-up" data-aos-duration="1200">
                     (texto boton busco trabajadores)Dinos que buscas y te ofreceremos el perfil de trabajador que más se ajuste a tus necesidades.
                </h1>

                <h1 style="margin-bottom:4em;"  class="aos-init aos-animate texto_trabajo texto-oculto" data-aos="fade-up" data-aos-duration="1200">
                     (texto boton busco trabajo)Dinos que buscas y te ofreceremos el perfil de trabajador que más se ajuste a tus necesidades.
                </h1>


            </div>

            <div class="col-lg-5 col-lg-offset-1 col-md-5 col-md-offset-2 col-sm-5 col-sm-offset-1 col-xs-11 col-xs-offset-1 slider trans_width">
                <!-- FORMULARIO DE BUSCO TRABAJADORES -->
                <div class="form sticky-element-inner formulario_busco_trabajadores formulario_oculto">
                        <?php echo do_shortcode('[contact-form-7 id="104" title="Busco trabajadores (Agencia de colocación)" html_class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0"]'); ?>
                </div>

                <!-- FORMULARIO DE BUSCO TRABAJO --->
                <div class="form sticky-element-inner formulario_busco_trabajo formulario_oculto">
                        <?php echo do_shortcode('[contact-form-7 id="105" title="Busco trabajo (agencia de colocación)" html_class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0"]'); ?>
                </div>
            </div>
        </div>

<?php

?>
