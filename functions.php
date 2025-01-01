<?php
/**
 * DoStart functions and definitions
 */

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */

define('DOSTART_THEME_VERSION', wp_get_theme()->get('Version'));
define('DOSTART_THEME_DIR', trailingslashit(get_template_directory()));
define('DOSTART_THEME_URI', trailingslashit(esc_url(get_template_directory_uri())));

/*
* Load Kirki template file
*/
locate_template('/assets/kirki/kirki.php', true, true);
//Check if Kirki is active
if (class_exists('Kirki')) {
    locate_template('customizer', true, true);
}

if ( ! function_exists('dostart_theme_setup') ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function dostart_theme_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on dostart, use a find and replace
         * to change 'dostart to the name of your theme in all the template files.
         */
        load_theme_textdomain('dostart', get_template_directory() . '/languages');

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
        add_image_size('dostart-thumb', 740, 367, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'primary' => esc_html__('Primary Menu', 'dostart'),
            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            [
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
            ]
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'dostart_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // This theme styles the visual editor to resemble the theme style.
        add_editor_style('assets/css/editor-dostart-style.css');

        add_theme_support("custom-header");

        /**
         * Yost seo support added for theme
         */
        add_theme_support('yoast-seo-breadcrumbs');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 40,
                'width' => 200,
                'flex-width' => true,
                'flex-height' => true,
            )
        );


        // Add support for Block Styles.
        add_theme_support('wp-block-styles');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Add support for editor styles.
        add_theme_support('editor-styles');

        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );

        /**
         * Post Excerpt Length
         **/

        function dostart_custom_excerpt_length( $length ) {
            if ( is_admin() ) {
                return $length;
            }

            return 50;
        }

        add_filter('excerpt_length', 'dostart_custom_excerpt_length', 999);
    }
endif;
add_action('after_setup_theme', 'dostart_theme_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dostart_content_width() {
    $GLOBALS['content_width'] = apply_filters('dostart_content_width', 640);
}

add_action('after_setup_theme', 'dostart_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dostart_widgets_setup() {
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'dostart'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'dostart'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );

    register_sidebar(
        array(
            'name' => esc_html__('Footer Widgets', 'dostart'),
            'id' => 'footer-widgets',
            'description' => esc_html__('Add footer widgets here.', 'dostart'),
            'before_widget' => '<div class="col-md-3 col-sm-6"><div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div></div>',
            'before_title' => '<h3 class="footer-widget-title">',
            'after_title' => '</h3>',
        )
    );
}

add_action('widgets_init', 'dostart_widgets_setup');

/**
 * Enqueue scripts and styles.
 */
function dostart_load_style_and_scripts() {

    // Define Directory URI
    $dir = DOSTART_THEME_URI;

    wp_enqueue_style('dostart-library', $dir . 'assets/css/library.min.css', array(), DOSTART_THEME_VERSION);
    wp_enqueue_style('dostart-theme', $dir . 'assets/css/dostart-style.min.css', array(), DOSTART_THEME_VERSION);

    wp_enqueue_style('dostart-style', get_stylesheet_uri(), array(), DOSTART_THEME_VERSION);

    wp_enqueue_script('skip-link-focus-fix', $dir . 'assets/js/skip-link-focus-fix.js', array( 'jquery' ), DOSTART_THEME_VERSION, true);
    wp_enqueue_script('navigation', $dir . 'assets/js/navigation.js', array( 'jquery' ), DOSTART_THEME_VERSION, true);
    wp_enqueue_script('bootstrap', $dir . 'assets/js/bootstrap.js', array( 'jquery' ), DOSTART_THEME_VERSION, true);
    wp_enqueue_script('hc-offcanvas', $dir . 'assets/js/hc-offcanvas-nav.js', array( 'jquery' ), DOSTART_THEME_VERSION, true);
    wp_enqueue_script('dostart-active', $dir . 'assets/js/active.js', array( 'jquery' ), DOSTART_THEME_VERSION, true);

    if ( is_singular() && comments_open() && get_option('thread_comments') ) {

        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'dostart_load_style_and_scripts');

function dostart_load_admin_script_callback() {
    $dir = DOSTART_THEME_URI;
    wp_enqueue_style('dostart-admin-style', $dir . 'assets/css/dostart-admin.min.css', array(), DOSTART_THEME_VERSION);

    wp_enqueue_script('dostart-admin', $dir . 'assets/js/admin.js', array( 'jquery' ), DOSTART_THEME_VERSION, true);

    // Ajax admin localization.
     $admin_notice_nonce = wp_create_nonce('dostart_theme_notice_status');
     wp_localize_script(
         'dostart-admin',
         'dostart_admin_notice_ajax_object',
         array(
             'dostart_admin_notice_ajax_url' => admin_url('admin-ajax.php'),
             'nonce'              => $admin_notice_nonce,
         )
     );


}
add_action('admin_enqueue_scripts', 'dostart_load_admin_script_callback');



/**
 * Load Helper Class.
 */
require DOSTART_THEME_DIR . '/inc/class/helper.php';


/**
 * Load Hooks.
 */
require DOSTART_THEME_DIR . '/inc/hooks.php';

/**
 * Breadcrumb.
 */
require DOSTART_THEME_DIR . '/inc/breadcrumb.php';

/**
 * Promotion area for this theme.
 */
require DOSTART_THEME_DIR . '/inc/codepopular-promotion.php';

/**
 * Dynamic style for this theme.
 */
require DOSTART_THEME_DIR . '/inc/dynamic-style.php';


/**
 * Custom template tags for this theme.
 */
require DOSTART_THEME_DIR . '/inc/template-tags.php';

/**
 * Required plugin installer
 */
require DOSTART_THEME_DIR . '/inc/required-plugins.php';

/**
 * Custom Header
 */

require DOSTART_THEME_DIR . '/inc/custom-header.php';

/**
 * customizer
 */
require DOSTART_THEME_DIR . '/inc/customizer/customizer.php';

/**
 * WooCommerce
 */
if ( class_exists('WooCommerce') ) {
    include_once DOSTART_THEME_DIR . '/inc/class/woocommerce.php';
}

/**
 * Walker Menu
 * //
 */
require DOSTART_THEME_DIR . '/inc/walker/init.php';
require DOSTART_THEME_DIR . '/inc/walker/menu-walker.php';

/**
 * Dostart Theme Metabox.
 */
require DOSTART_THEME_DIR . '/inc/class/dostart-metabox.php';


/**
 * Load Vendor.
 */
require __DIR__ . '/vendor/autoload.php';


/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function appsero_init_tracker_dostart() {

    if ( ! class_exists( 'Appsero\Client' ) ) {
      require_once __DIR__ . '/appsero/src/Client.php';
    }

    $client = new Appsero\Client( 'e694735f-bc5b-41e5-bb50-b97852ea560a', 'Dostart', __FILE__ );

    // Active insights
    $client->insights()->init();

}

appsero_init_tracker_dostart();
