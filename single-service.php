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
$service_video = get_field('service_video');
$images = get_field('service_images');
?>

<div class="page-header">
	<div class="margin-from-left">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>
</div>

<div class="service-holder page-holder">
	<div class="page-holder-left">
		<div class="margin-from-left">
			<div class="feature-image"<?php if (!$service_video): ?> style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>"<?php endif; ?>>
				<?php 
					if ($service_video):
						echo $service_video;
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
			<h3>Services</h3>
			<ul>
				<?php 
					$args = array( 
						'post_type' => 'service', 
						'posts_per_page' => 5, 
						'orderby' => 'rand'
					);
					$the_query = new WP_Query( $args );
				?>
				<?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
					<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
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
