<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agriverdes
 */
get_header();
?>
    <div class="row"></div>

        <?php
        if (have_posts()) :

            /* Start the Loop */
            while (have_posts()) : the_post(); ?>
                <div class="row news block">
                    <div class="col-lg-6 col-lg-offset-6 col-md-6 col-md-offset-6 col-sm-5 col-sm-offset-7 col-xs-2 col-xs-offset-10 holder news__img trans" style="background: url(<?php echo get_the_post_thumbnail_url(null, 'full'); ?>); background-size: cover; background-repeat: no-repeat;">
                        <div class="news__redes">
                            <div class="col-lg-12 col-md-12 news__redes__col">
                                <a href="<?php echo getFacebookShareUrl(get_the_permalink()); ?>"><img src="<?php echo get_template_directory_uri() . '/img/facebook.svg'; ?>" width="7px" class="news__redes__icon"></a>
                            </div>
                            <div class="col-lg-12 col-md-12 news__redes__col">
                                <a href="<?php echo getTwitterShareUrl(get_the_permalink(), get_the_title()); ?>"><img src="<?php echo get_template_directory_uri() . '/img/twitter.svg'; ?>" width="14px" class="news__redes__icon"></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-lg-offset-1 col-md-4 col-md-offset-1 col-sm-5 col-sm-offset-1 col-xs-8 col-xs-offset-1 news__text">
                        <h5 class="text-center"><?php echo get_the_date('j F Y'); ?></h5>
                        <h1 class="text-center"><?php echo get_the_title(); ?></h1>
                        <?php echo get_the_content(); ?>
                    </div>
                </div>
        <?php
            endwhile;

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>


<?php
get_footer();
