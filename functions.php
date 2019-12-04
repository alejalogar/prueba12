<?php
/**
 * Agriverdes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Agriverdes
 */
if (!function_exists('agriverdes_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function agriverdes_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Agriverdes, use a find and replace
         * to change 'agriverdes' to the name of your theme in all the template files.
         */
        load_theme_textdomain('agriverdes', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus([
            'menu-1' => esc_html__('Primary', 'agriverdes'),
        ]);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('agriverdes_custom_background_args', [
            'default-color' => 'ffffff',
            'default-image' => '',
        ]));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', [
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ]);
    }
endif;
add_action('after_setup_theme', 'agriverdes_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function agriverdes_content_width()
{
    $GLOBALS['content_width'] = apply_filters('agriverdes_content_width', 640);
}
add_action('after_setup_theme', 'agriverdes_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function agriverdes_widgets_init()
{
    register_sidebar([
        'name' => esc_html__('Sidebar', 'agriverdes'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'agriverdes'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ]);
}
add_action('widgets_init', 'agriverdes_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function agriverdes_scripts()
{
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
    wp_enqueue_style('app-css', get_template_directory_uri() . '/css/agriverdes.css', ['bootstrap-css'], null);

    wp_enqueue_style( 'aos', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css'); //aos

    wp_enqueue_script('bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', ['jquery'], null);
    wp_enqueue_script('app-js', get_template_directory_uri() . '/js/agriverdes.min.js', ['jquery'], null);
    wp_enqueue_script('jquery-mousewheel', '//cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js', ['jquery'], '3.1.13');
//    wp_enqueue_script('aos', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js', ['jquery'], null);
     wp_enqueue_script('aos', 'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js', ['jquery'], null); 
}
add_action('wp_enqueue_scripts', 'agriverdes_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

function getFacebookShareUrl($url)
{
    return 'https://www.facebook.com/sharer.php?u=' . $url;
}

function getTwitterShareUrl($url, $title, $via = null, $hastags = null)
{
    $shareUrl = 'https://twitter.com/intent/tweet?url=' . $url . '&text=' . $title . '';
    $via = ($via !== null) ? '&via=' . $via . '' : '';
    $hastags = ($hastags !== null) ? '&hashtags=' . $hastags . '' : '';
    return $shareUrl . $via . $hastags;
}

function get_post_page_permalink()
{
    // Si se ha establecido una página como blog
    if ('page' == get_option('show_on_front')) {
        return get_permalink(get_option('page_for_posts'));
    } else {
        return home_url();
    }
}

// Eliminamos el panel de bienvenida
remove_action('welcome_panel', 'wp_welcome_panel');


function remove_menus()
{
	if(!current_user_can( 'administrator' )) {
		remove_menu_page('themes.php');                 //Appearance
		remove_menu_page('plugins.php');                //Plugins
		remove_menu_page( 'edit-comments.php' );          //Comments
		remove_menu_page('tools.php');                  //Tools
		remove_menu_page('options-general.php');        //Settings
		remove_menu_page('wpcf7');
	}
}
add_action('admin_menu', 'remove_menus');

