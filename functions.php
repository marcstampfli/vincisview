<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once $understrap_inc_dir . $file;
}

// ACF Group field helper function
// Usage: echo get_group_field( 'album_group', 'album_information' );
if ( function_exists( 'get_field' ) ) {
	function get_group_field( string $group, string $field, $post_id = 0 ) {
		$group_data = get_field( $group, $post_id );
		if ( is_array( $group_data ) && array_key_exists( $field, $group_data ) ) {
			return $group_data[ $field ];
		}
		return null;
	}
}

// Add current year
function currentYear( $atts ){
    return date('Y');
}
add_shortcode( 'year', 'currentYear' );

// Removes unnecessary words from any standard title
function prefix_category_title($title) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = '<span class="vcard">' . get_the_author() . '</span>' ;
	} elseif ( is_tax() ) { //for custom post types
		$title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
	} elseif (is_post_type_archive()) {
		$title = post_type_archive_title( '', false );
	}
	return $title;
}
add_filter('get_the_archive_title', 'prefix_category_title');

// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);

// Replace excerpt with post summary...
function the_post_summary($length = 128, $string = "") {
	if ($string) {
		$content = $string;
	} else {
		$content = wp_strip_all_tags(get_the_content());
	}
	if (strlen($content) > $length) {
		$content = substr($content,0,$length) . '...';
	}
	echo $content;
}

// Add site-left and footer copyright text
function copyrightText() {
	echo '&copy; ' .get_bloginfo( "name" ). ' ' .do_shortcode("[year]");
	echo '<span>//</span>';
	echo the_privacy_policy_link();
	if ( class_exists( 'WooCommerce' ) ) {
		echo '<span>//</span> <a href="'.get_permalink(97).'">'.get_the_title(97).'</a>'; // 97 = Page ID of Terms & Conditions
	}
	//echo '<span>//</span><a href="mailto:marcstampfli@gmail.com" target="_blank" class="marc">Website by Marc Stämpfli</a>';
}
add_shortcode( 'copyrightText', 'copyrightText' );

// Set Featured Image column on custom and blog posts
function add_img_column($columns) {
  $columns = array_slice($columns, 0, 1, true) + array("img" => "Featured Image") + array_slice($columns, 1, count($columns) - 1, true);
  return $columns;
}

function manage_img_column($column_name, $post_id) {
 if( $column_name == 'img' ) {
  echo get_the_post_thumbnail($post_id, 'thumbnail');
  echo '<style> .column-img { width: 175px; }</style>';
 }
 return $column_name;
}

add_filter('manage_post_posts_columns', 'add_img_column');
add_filter('manage_post_posts_custom_column', 'manage_img_column', 10, 2);
//add_filter('manage_page_posts_columns', 'add_img_column');
//add_filter('manage_page_posts_custom_column', 'manage_img_column', 10, 2);
add_filter('manage_service_posts_columns', 'add_img_column');
add_filter('manage_service_posts_custom_column', 'manage_img_column', 10, 2);
add_filter('manage_gallery_posts_columns', 'add_img_column');
add_filter('manage_gallery_posts_custom_column', 'manage_img_column', 10, 2);

// WooCommerce Functional Changes
// Hide the title if the shop page is default
function woo_shop_page_title($page_title) {
	if ('Shop' == $page_title) {
		return false;
	}
}
add_filter('woocommerce_page_title', 'woo_shop_page_title');

// First, remove Add to Cart Button
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 
// Second, add View Product Button
add_action( 'woocommerce_after_shop_loop_item', 'shop_view_product_button', 10);
function shop_view_product_button() {
	global $product;
	$price_html = $product->get_price_html();
	if($price_html) {
		$price_html = "$price_html - ";
	}
	$link = $product->get_permalink();
	echo '<a href="' . $link . '" class="btn-primary">'.$price_html.'Order Now</a>';
}

// Remove title hook Woocommerce
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 10);

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}