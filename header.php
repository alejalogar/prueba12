<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agriverdes
 */

?>
<!doctype html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo('charset');?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <style>
        /* Fix para que el botón del menú de "agencia de colocación" no tenga underline */
        .header__trabajo__row__btn:hover, .header__trabajo--scrolled{
            text-decoration:unset;
        }
        </style>
        <?php wp_head();?>
    </head>

    <body <?php body_class();?>>
        <?php
get_template_part('template-parts/content', 'header');
get_template_part('template-parts/content', 'menu');
