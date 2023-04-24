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

<?php get_template_part('template-parts/colocacion', 'modulo1');?>

<?php get_footer();?>

<script>
    hideButtonsOfMenu();
    mostrarBuscoTrabajadoresForm();
    marcarActivoBoton('boton_agencia');

    // Oculta los botones del menú que no son necesarios
    function hideButtonsOfMenu(){
        let elements = document.getElementsByClassName('ocultar_pagina_colocacion');
        for(let element of elements){
            element.style.display="none"
        }
    }

    // Marca  o descamarcar como activo el botón del header de esta sección
    function marcarActivoBoton(claseBoton){
        let elements = document.getElementsByClassName(claseBoton);
        for(let element of elements){
            element.classList.add('boton-activo');
        }
    }

    function desMarcarActivoBoton(claseBoton){
        let elements = document.getElementsByClassName(claseBoton);
        for(let element of elements){
            element.classList.remove('boton-activo');
        }
    }
 

    // Como son solo dos formularios, una foo para cada uno.
    function mostrarBuscoTrabajadoresForm(){
        document.querySelector('.formulario_busco_trabajo').classList.add('formulario_oculto')
        document.querySelector('.formulario_busco_trabajadores').classList.remove('formulario_oculto')
        document.querySelector('.texto_trabajo').classList.add('texto-oculto');
        document.querySelector('.texto_trabajadores').classList.remove('texto-oculto');
        marcarActivoBoton('busco_trabajadores_boton');
        desMarcarActivoBoton('busco_trabajo_boton');
    }
    function mostrarBuscoTrabajoForm(){
        document.querySelector('.formulario_busco_trabajadores').classList.add('formulario_oculto')
        document.querySelector('.formulario_busco_trabajo').classList.remove('formulario_oculto')
        document.querySelector('.texto_trabajadores').classList.add('texto-oculto');
        document.querySelector('.texto_trabajo').classList.remove('texto-oculto');
        marcarActivoBoton('busco_trabajo_boton');
        desMarcarActivoBoton('busco_trabajadores_boton');

    }


</script>
