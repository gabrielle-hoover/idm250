<?php
/**
 * This file will be the main place to add custom php code into your theme
 *
 * @link - https://codex.wordpress.org/Functions_File_Explained
 * @return void
 */

//require get_template_directory() . '/lib/require.php';

/*
 * Enable support for Post Thumbnails on posts and pages.
 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
*/
function add_post_thumbnails_support() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'add_post_thumbnails_support');

/**
 * Include any styles into the site the proper way
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 */
function include_css_files() {
    // Example of including an external link
    wp_enqueue_style('google-fonts-roboto', 'https://fonts.googleapis.com/css2?family=family=Roboto:ital,wght@0,400;1,700&display=swap"');
    wp_enqueue_style('google-fonts-cabin', 'https://fonts.googleapis.com/css2?family=Cabin:wght@700;1,400&display=swap');

    // Example of including a style local to your theme root
    wp_enqueue_style('idm250-css', get_template_directory_uri() . '/dist/css/style.css');
}

// When WP performs this action, call our function
add_action('wp_enqueue_scripts', 'include_css_files');

/**
 * Include any scripts into the site the proper way
 *
 * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
 */
function include_js_files() {
    wp_enqueue_script('idm250-js', get_template_directory_uri() . '/dist/scripts/app.js', [], false, true);
}

// When WP performs this action, call our function
add_action('wp_enqueue_scripts', 'include_js_files');

/**
 * Register the menus on my site
 *
 * @link https://developer.wordpress.org/reference/functions/register_nav_menus/
 * @return void
 */
function register_theme_navigation() {
    register_nav_menus([
        'primary_menu' => 'Primary Menu',
        'footer_menu'  => 'Footer Menu',
        'social_menu'  => 'Social Menu',
    ]);
}

add_action('after_setup_theme', 'register_theme_navigation');

function register_project_custom_post_type() {
    $args = [
        'label' => 'Songs'
    ];
    register_post_type('songs', '');
}

//add theme support, thanks Paul for the tip
//added array of custom image sizes
//src: https://docs.woocommerce.com/document/image-sizes-theme-developers/
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce', array(
    'thumbnail_image_width' => 52,
    'gallery_thumbnail_image_width' => 52,
    'single_image_width' => 200,
));
}

add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

add_filter('acf/settings/remove_wp_meta_box', '__return_false');

//change number of columns on shop page
//taken from: https://docs.woocommerce.com/document/change-number-of-products-per-row/
add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 1; // 1 product per row
	}
}

//display price on woocommerce add to cart button on shop page
//src: stackoverflow.com/questions/51522141/display-price-on-add-to-cart-button-from-the-functions-php-file-in-woocommerce
add_filter( 'woocommerce_product_add_to_cart_text', 'custom_add_to_cart_price', 20, 2 ); // Shop and other archives pages
add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_add_to_cart_price', 20, 2 ); // Single product pages
function custom_add_to_cart_price( $button_text, $product ) {
    // Variable products
    if( $product->is_type('variable') ) {
        // shop and archives
        if( ! is_product() ){
            $product_price = wc_price( wc_get_price_to_display( $product, array( 'price' => $product->get_variation_price() ) ) );
            return 'From ' . strip_tags( $product_price );
        } 
        // Single product pages
        else {
            return $button_text;
        }
    } 
    // All other product types
    else {
        $product_price = wc_price( wc_get_price_to_display( $product ) );
        return strip_tags( $product_price );
    }
}