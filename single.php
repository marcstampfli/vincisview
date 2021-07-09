<?php
/**
 * The template for displaying all single posts
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
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>
</div>

<div class="post-holder page-holder">
	<div class="page-holder-left">
		<div class="margin-from-left">
			<div class="post-meta-data">
				<div class="meta date">
					<i class="fa fa-calendar"></i>
					<?php echo get_the_date(); ?>
				</div>
				<div class="meta category">
					<i class="fa fa-tag"></i>
					Posted in <?php echo get_the_category()[0]->cat_name; ?>
				</div>
				<div class="meta post-by">
					<i class="fa fa-user"></i>
					By <?php while ( have_posts() ) : the_post(); the_author(); endwhile; ?>
				</div>
			</div>
			<div class="feature-image" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>"></div>
		</div>
	</div>
	<div class="page-holder-right">
		<div class="category-holder">
			<h3>Categories</h3>
			<ul>
				<?php 
				$categories = get_the_category();
				$seperator = ' ';
				$output = '';
				$index = 0;
				if (!empty($categories)) {
					foreach($categories as $category) {
						$index++;
						if ($index >= 5) {
							break;
						}
						$output .= '<li><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>' . $seperator;
					}
					echo trim($output, $seperator);
				}
				?>
			</ul>
		</div>
		<?php understrap_post_nav(); ?>
	</div>
</div>

<main class="site-main site-main-single" id="main">
	<div class="margin-from-left">
		<div class="row">
			<div class="col-lg-9">
			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'loop-templates/content', 'single' );
			}
			?>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();
