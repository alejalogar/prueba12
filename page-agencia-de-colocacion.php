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
get_header();

get_template_part('template-parts/colocacion', 'modulo1');
?>
	
<?php
get_footer();

?>

<script>

    hideButtonsOfMenu();
    marcarActivoBotonAgencia();

    // Oculta los botones del menú que no son necesarios
    function hideButtonsOfMenu()
    {
        let elements = document.getElementsByClassName('ocultar_pagina_colocacion');
        for(let element of elements){
            element.style.display="none"
        }
    }

    // Marca como activo el botón del header de esta sección
    function marcarActivoBotonAgencia(){
        let elements = document.getElementsByClassName('boton_agencia');
        for(let element of elements){
            element.style.color="white"
            element.style.background="#c2beb2"
        }
    }
</script>
