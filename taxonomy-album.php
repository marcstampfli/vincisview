<?php
/**
 * The template for displaying archive pages
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="page-header">
	<div class="margin-from-left">
		<?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?>
	</div>
</div>

<div class="archive-posts-listings">
	<?php
		$category = get_queried_object();
		$current_category_arg = $category->name;	
		$args = array( 
			'post_type' => 'gallery',
			'tax_query' => array(
				array (
					'taxonomy' => 'album',
					'field' => 'slug',
					'terms' => $current_category_arg,
				)
			),
		);
		$the_query = new WP_Query( $args );
	?>
	<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
	    <?php get_template_part('loop-templates/content', 'album'); ?>
	<?php endwhile; ?>
	<?php echo paginate_links(); ?>
</div>

<?php
get_footer();
