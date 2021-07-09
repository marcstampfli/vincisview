<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<div class="article-image"
		<?php if (has_post_thumbnail()) { ?>
		  style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);" 
		<?php } ?>
	></div>

	<div class="article-body">
		<header class="entry-header">
			<?php
			the_title(
				sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
				'</a></h2>'
			);
			?>
		</header><!-- .entry-header -->
		<div class="entry-content">
			<?php the_post_summary(256); ?>
		</div><!-- .entry-content -->
		<div class="entry-footer">
			<a href="<?php the_permalink(); ?>" class="btn-primary">
				View Service
				<i class="fa fa-chevron-right"></i>
			</a>
		</div>
	</div>

</article><!-- #post-## -->
