<?php
/**
 * Template Name: Template Contact
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="page-header">
	<div class="margin-from-left">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>
</div>

<div class="page-holder">
	<div class="page-holder-left">
		<main class="site-main" id="main">
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
		<div class="iframe-holder">
			<iframe class="iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d62724.212158671784!2d-61.591587749522866!3d10.71416644505913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8c3609243694a965%3A0xe3f0c63abffc3b84!2sDiego%20Martin!5e0!3m2!1sen!2stt!4v1615385982259!5m2!1sen!2stt" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</div>
</div>

<?php
get_footer();
