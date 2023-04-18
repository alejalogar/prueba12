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

?>

<style>

.form__btn--send{

	height: 70px !important;
}

#solicitud input{
	border:none;
}

</style>

    <?php
    get_template_part('template-parts/content', 'page-inicio-entradilla');
    get_template_part('template-parts/content', 'page-inicio-empresa');
    get_template_part('template-parts/content', 'page-inicio-servicios');
    get_template_part('template-parts/content', 'page-inicio-documentacion');
    get_template_part('template-parts/content', 'page-inicio-trabajadores');
    get_template_part('template-parts/content', 'page-inicio-trabajo');
    ?>
<?php
get_footer();
