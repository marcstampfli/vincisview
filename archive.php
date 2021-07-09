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

<div class="archive-category-list">
	<div class="margin-from-left">
		<h2>Categories</h2>
		<ul>
			<?php 
			$categories = get_the_category();
			$seperator = ' ';
			$output = '';
			$index = 0;
			if (!empty($categories)) {
				foreach($categories as $category) {
					$index++;
					if ($index > 4) {
						break;
					}
					$output .= '<li><a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'vincisview'), $category->name)) . '">' . esc_html($category->name) . '</a></li>' . $seperator;
				}
				echo trim($output, $seperator);
			}
			?>
		</ul>
	</div>
</div>

<div class="archive-posts-listings">
	<?php while (have_posts()) : the_post(); ?>
	<?php get_template_part('loop-templates/content', get_post_format()); ?>
	<?php endwhile; ?>
</div>

<?php
get_footer();
