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


<?php get_template_part('template-parts/aplicacion', 'modulo2');?>

<!-- Aquí se inserta el script -->
<script>
    var aplicacionTrabajadores = document.querySelector('.aplicacion-trabajadores');
    var buscoTrabajadores = document.querySelector('#trabajadores-btn');
    var buscoTrabajo = document.querySelector('#trabajo-btn');
    
    aplicacionTrabajadores.style.display = "none";
    buscoTrabajadores.style.display = "none";
    buscoTrabajo.style.display = "none";
</script>


<?php get_footer();?>
