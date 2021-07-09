<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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

<div class="page-holder">
	<div class="page-holder-left">
		<main class="site-main site-main-page" id="main">
			<div class="margin-from-left">

			<?php
			while ( have_posts() ) {
				the_post();
				get_template_part( 'loop-templates/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			}
			?>
			</div>
		</main><!-- #main -->
	</div>
	<div class="page-holder-right">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="feature-image-one" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>">
			</div>
		<?php } ?>
		<?php if ( get_field('second_feature_image') ) { ?>
			<div class="feature-image-two" style="background-image:url(<?php echo get_field('second_feature_image'); ?>">
			</div>
		<?php } ?>
	</div>
</div>

<?php
get_footer();
