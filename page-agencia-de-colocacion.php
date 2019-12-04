<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agriverdes
 */
?>

<?php get_header();?>

<style>
/** Clase para dejar los botones como en hover*/
.boton-activo{
    color:white;
    background: #c2beb2;
}

.formulario_oculto{
    display:none;
}

.z_index_negativo{
    z-index:1;
}
</style>

<?php get_template_part('template-parts/colocacion', 'modulo1');?>

<?php get_footer();?>

<script>
    añadirListenersBotonesCambiarFormulario();
    hideButtonsOfMenu();
    marcarActivoBoton('boton_agencia');
    marcarActivoBoton('busco_trabajadores_boton');

    // Oculta los botones del menú que no son necesarios
    function hideButtonsOfMenu()
    {
        let elements = document.getElementsByClassName('ocultar_pagina_colocacion');
        for(let element of elements){
            element.style.display="none"
        }
    }

    // Marca como activo el botón del header de esta sección
    function marcarActivoBoton(classeBoton){
        let elements = document.getElementsByClassName(classeBoton);
        for(let element of elements){
           // element.style.color="white"
            //element.style.background="#c2beb2"
            element.classList.add('boton-activo');
        }
    }

    function añadirListenersBotonesCambiarFormulario()
    {
        let element= document.getElementById('busco_trabajadores_boton');
        element.addEventListener("click", function(e) {
            alert('pulsado')
        }, false);
    }

    function cambiarFormulario()
    {
        let elements = document.getElementsByClassName('formulario_activo');
        for(let element of elements){
            element.classList.remove('formulario_oculto')
            element.classList.add('formulario_oculto')
        }
     //formulario_oculto
    }
</script>
