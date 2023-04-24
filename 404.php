<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Agriverdes
 */
get_header();
?>

<div class="row entradilla">
    <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10">
        <h1 style="padding:0;"><?php esc_html_e('La página que buscas no se ha encontrado.', 'agriverdes'); ?></h1>
        <h1 style="padding:0;"><?php // esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'agriverdes'); ?></h1>
    </div>
</div>

<?php
get_footer();
