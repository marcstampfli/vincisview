<?php
/**
 * Template Name: Template Home
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<section class="home-opening-text margin-from-left">
    <h2 class="wow fadeInDown"><?php echo get_field("header_small_opening_text"); ?></h2>
    <h3 class="wow fadeInUp"><?php echo get_field("header_big_opening_text"); ?></h3>
</section>

<section class="home-main-albums margin-from-left">
    <div class="row">
    <?php
        $terms = get_terms( array(
            'taxonomy' => 'album',
            'hide_empty' => false,
        ) );
        $count = 0;
        foreach($terms as $term):
    ?>
        <div class="col-sm-4">
            <a href="<?php echo get_term_link($term); ?>" class="action wow bounceIn" data-wow-delay="<?php echo $count / 2.5; ?>s">
                <div class="title"><?php echo $term->name; ?></div>
                <div class="img-holder">
                    <div class="img" style="background-image:url('<?php echo get_field('cover_image', $term); ?>"></div> 
                </div>
            </a>
        </div>
    <?php
        $count++;
        endforeach;
        wp_reset_query();
    ?>
		<!-- <div class="col-sm-6">
            <div class="info wow fadeInLeft" data-wow-delay="0.1s"><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit.</div>
        </div>
        <div class="col-sm-6">
            <div class="info wow fadeInRight" data-wow-delay="0.2s"><strong>Lorem ipsum dolor sit amet</strong>, consectetur adipiscing elit.</div>
        </div> -->
    </div>
</section>

<section class="home-about">
    <div class="margin-from-left">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <h2 class="wow fadeInLeft"><?php echo get_field("header_about"); ?></h2>
                <p class="wow fadeInUp"><?php echo get_field("text_about"); ?></p>
                <a href="<?php echo get_group_field( 'button_about', 'url' ); ?>" class="btn btn-primary wow fadeInUp"><?php echo get_group_field( 'button_about', 'text' ); ?> <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
        <div class="large-image wow fadeInRight" data-wow-delay="1.0s" style="background-image:url('<?php echo get_field('second_feature_image'); ?>">
        </div>
    </div>
</section>

<section class="home-join-community">
    <div class="margin-from-left">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <h2 class="wow fadeInLeft"><?php echo get_field("header_newsletter"); ?></h2>
                <p class="wow fadeInUp" data-wow-delay="0.3s"><?php echo get_field("text_newsletter"); ?></p>
                <div class="wow fadeInUp" data-wow-delay="0.5s">
                <?php echo do_shortcode('[contact-form-7 id="12" title="Newsletter Signup Homepage"]'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-services">
    <div class="margin-from-left">
        <h2 class="wow fadeInDown">Services Offered</h2>
        <div class="action-items">
            <div class="row">
                <?php 
                    $arg = array( 
                        'post_type' => 'service',
                        'posts_per_page' => 4,
                        'orderby' => 'rand',
                    );
                    $q = new WP_Query( $arg );
                ?>
                <?php while ($q->have_posts()) : $q->the_post(); ?>
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <a href="<?php echo get_permalink(); ?>" class="action wow bounceIn" data-wow-delay="<?php echo $q->current_post / 2; ?>s">
                        <div class="img-holder">
                            <div class="img" style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>"></div> 
                        </div>
                        <div class="title"><?php echo get_the_title(); ?></div>
                    </a>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
                <a href="<?php echo get_post_type_archive_link( 'service' ); ?>" class="view-all button wow bounceIn" data-wow-delay="2s">
                    view all
                    <i class="fa fa-chevron-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="home-blog">
    <div class="margin-from-left">
        <div class="row">
            <?php
                $latest_post = wp_get_recent_posts(array(
                    'numberposts' => 1, 
                    'post_status' => 'publish'
                ));
                foreach( $latest_post as $post_item ) : 
            ?>
            <div class="col-lg-5 col-md-9">
                <h2 class="wow fadeInDown"><?php echo get_the_title($post_item['ID']); ?></h2>
                <div class="meta-data">
                    <div class="category wow bounceInRight">Stories</div>
                    <div class="post-details wow bounceInRight" data-wow-delay="0.3s">
                        <div class="date">
                            <i class="fa fa-clock-o"></i>
                            <span>Posted on </span><?php echo get_the_date('', $post_item['ID']); ?>
                        </div>
                        <div class="sub-category">
                            <i class="fa fa-edit"></i>
                            <span>Posted in </span><?php echo get_the_category($post_item['ID'])[0]->cat_name; ?>
                        </div>
                    </div>
                </div>
                <div class="photo-album-md wow bounceIn">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/polaroid.png" alt="Polaroid" width="85%">
                </div>
                <p class="wow fadeInUp"><?php the_post_summary(128, wp_strip_all_tags(get_the_content('', '', $post_item['ID']))); ?></p>
                <div class="buttons">
                    <a href="<?php echo get_permalink($post_item['ID']); ?>" class="button wow bounceIn" data-wow-delay="0.5s">Read this story <i class="fa fa-chevron-right"></i></a>
                    <a href="<?php echo get_category_link(get_the_category($post_item['ID'])[0]); ?>" class="button wow bounceIn" data-wow-delay="0.6s">Read all stories <i class="fa fa-chevron-right"></i></a>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <div class="photo-album wow bounceIn">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/polaroid.png" alt="Polaroid" width="100%">
                </div>
            </div>
        </div>
    </div>
</section>

<section class="home-testimonials">
    <div class="margin-from-left">
        <div class="row">
            <div class="col-lg-5">
                <div id="testimonials" class="carousel slide carousel-fade wow fadeInUp" data-wow-delay="0.3s" data-ride="carousel">
                    <h3 class="wow fadeInLeft">Testimonials</h3>
                    <div class="arrows">
                        <a class="carousel-control-prev" href="#testimonials" data-slide="prev"><i class='fa fa-chevron-left'></i></a>
                        <a class="carousel-control-next" href="#testimonials" data-slide="next"> <i class='fa fa-chevron-right'></i></a>
                    </div>
                    <div class="carousel-inner">
                    <?php 
                        $arg = array( 
                            'post_type' => 'testimonial',
                        );
                        $q = new WP_Query( $arg );
                    ?>
                    <?php while ($q->have_posts()) : $q->the_post(); ?>
                        <div class="testimonial carousel-item<?php echo ($q->current_post == $q->post_count-1) ? ' active' : ''; ?>">
                            <p>"<?php echo wp_strip_all_tags(get_the_content()); ?>"</p>
                            <div class="author"><?php the_title(); ?></div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-1"></div>
            <div class="col-lg-6">
                <?php 
                    $arg = array( 
                        'post_type' => 'faq',
                        'posts_per_page' => '1',
                    );
                    $q = new WP_Query( $arg );
                ?>
                <div class="faqs">
                <?php while ($q->have_posts()) : $q->the_post(); ?>
                    <h2 class="wow fadeInRight"><?php echo the_title(); ?></h2>
                    <p class="wow fadeInRight" data-wow-delay="0.3s"><?php echo the_post_summary(128); ?></p>
                    <a href="<?php echo get_post_type_archive_link( 'faq' ); ?>" class="btn btn-primary wow fadeInRight" data-wow-delay="0.5s">
                        Read All Frequently Asked Questions
                        <i class="fa fa-chevron-right"></i>
                    </a>
                <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
