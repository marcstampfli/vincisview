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
$gallery_video = get_field('gallery_video');
$images = get_field('gallery_images');
?>

<div class="page-header">
	<div class="margin-from-left">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>
</div>

<div class="gallery-holder page-holder">
	<div class="page-holder-left">
		<div class="margin-from-left">
        <div class="feature-image"<?php if (!$gallery_video): ?> style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>"<?php endif; ?>>
            <?php 
                if ($gallery_video):
                    echo $gallery_video;
                endif;
            ?>
		</div>
			<?php if( $images ): ?>
			<div class="gallery-images">
			<?php foreach( $images as $image ):
				echo '<a href="'.esc_url($image['url']).'" data-toggle="lightbox" data-gallery="'.basename(get_permalink()).'" class="thumb"><img src="'.esc_url($image['sizes']['thumbnail']).'" alt="'.esc_attr($image['alt']).'"></a>';
			endforeach; ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="page-holder-right">
		<div class="category-holder">
			<h3>Albums</h3>
			<ul>
				<?php 
					$terms = get_terms( array(
                        'taxonomy' => 'album',
                        'hide_empty' => false,
                    ) );
				?>
				<?php foreach($terms as $term): ?>
					<li><a href="<?php echo get_term_link($term); ?>"><?php echo $term->name; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</div>

<main class="site-main site-main-single site-main-service" id="main">
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
