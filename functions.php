<?php

/**
 * LesPtitnours functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package LesPtitnours
 */

if (! defined('LESPTITNOURS_THEME_VERSION')) {
    // Replace the version number of the theme on each release.
    define('LESPTITNOURS_THEME_VERSION', '0.1.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lesptitnours_setup()
{
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on LesPtitnours, use a find and replace
     * to change 'lesptitnours' to the name of your theme in all the template files.
     */
    load_theme_textdomain('lesptitnours', get_template_directory() . '/languages');

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
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'lesptitnours'),
        )
    );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

}
add_action('after_setup_theme', 'lesptitnours_setup');


/**
 * Enqueue scripts and styles.
 */
function lesptitnours_scripts()
{
    // TODO Clean
    wp_enqueue_style('lesptitnours-style', get_stylesheet_uri(), array(), LESPTITNOURS_THEME_VERSION);
    wp_style_add_data('lesptitnours-style', 'rtl', 'replace');
    
    wp_enqueue_script('lesptitnours-navigation', get_template_directory_uri() . '/js/navigation.js', array(), LESPTITNOURS_THEME_VERSION, true);
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'lesptitnours_scripts');

if (! file_exists(get_template_directory() . '/includes/primary-nav-walker.php')) {
    // File does not exist... return an error.
    return new WP_Error('primary-nav-walker-missing', __('It appears the primary-nav-walker.php file may be missing.', 'lesptitnours'));
} else {
    require_once get_template_directory() . '/includes/primary-nav-walker.php';
}

require get_template_directory() . '/includes/template-functions.php';
require get_template_directory() . '/includes/template-tags.php';