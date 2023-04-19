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

.formulario_oculto, .texto-oculto{
    display:none;
}

.z_index_negativo{
    z-index:1;
}
</style>

<?php get_template_part('template-parts/aplicacion', 'modulo1');?>

<?php get_footer();?>

<script>
    var aplicacionTrabajadores = document.querySelector('.aplicacion-de-trabajadores');
    var buscoTrabajadores = document.querySelector('#trabajadores-btn');
    var buscoTrabajo = document.querySelector('#trabajo-btn');
    aplicacionTrabajadores.style.display = "none";
    buscoTrabajadores.style.display = "none";
    buscoTrabajo.style.display = "none";
</script>
