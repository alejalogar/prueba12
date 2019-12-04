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

        $i = 0;
        /* Start the Loop */
        while (have_posts()) : the_post();
            if ($i % 2 == 0) {
                $image_classes = 'col-md-offset-6 col-sm-offset-7 news__img';
                $share_classes = 'news__redes';
                $share_col_classes = 'news__redes__col';
                $content_classes = 'col-sm-offset-1';
            } else {
                $image_classes = 'news__img2';
                $share_classes = 'news__redes--left';
                $share_col_classes = 'news__redes__col--left';
                $content_classes = 'col-md-offset-7 col-sm-offset-6';
            }

            $permalink = get_the_permalink();
            $title = get_the_title();?>

            <div id="<?php echo $post->post_name; ?>" class="row news sticky-parent block" data-sticky-breakpoint="767">
                <div class="col-md-6 col-sm-5 col-xs-12 <?php echo $image_classes;?> holder trans sticky-element" style="background-image: url(<?php echo get_the_post_thumbnail_url(null, 'full'); ?>);">
					<div class="sticky-element-inner">
						<div class="<?php echo $share_classes;?>">
							<div class="col-lg-12 col-md-12 news__redes__col">
								<a target="_blank" href="<?php echo getFacebookShareUrl($permalink); ?>"><img src="<?php echo get_template_directory_uri() . '/img/facebook.svg'; ?>" width="7px" class="news__redes__icon"></a>
							</div>
							<div class="col-lg-12 col-md-12 <?php echo $share_col_classes;?>">
								<a target="_blank" href="<?php echo getTwitterShareUrl($permalink, $title); ?>"><img src="<?php echo get_template_directory_uri() . '/img/twitter.svg'; ?>" width="14px" class="news__redes__icon"></a>
							</div>
						</div>
					</div>
                </div>
                <div class="col-md-4 col-sm-5 col-xs-10 col-xs-offset-1 <?php echo $content_classes;?> news__text">
                    <h5 class="text-center"><?php echo get_the_date('j F Y'); ?></h5>
                    <h1 class="text-center"><?php echo $title; ?></h1>
                    <?php echo get_the_content(); ?>
                </div>
            </div>
        <?php $i++;
        endwhile;

    else :
        get_template_part('template-parts/content', 'none');
    endif;
    ?>
<?php
get_footer();
