<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<section class="home-instagram">
    <div class="margin-from-left">
        <a href="https://www.instagram.com/vincisview/" class="title-holder<?php if (is_front_page()) { ?> wow fadeInRight<?php } ?>" target="_blank">
            <div class="icon">
                <i class="fa fa-instagram"></i>
            </div>
            <h3>@vincisview</h3>
        </a>
        <div class="instagram-holder">
            <div class="instagram<?php if (is_front_page()) { ?> wow fadeInUp<?php } ?>">
                <?php echo do_shortcode('[instagram-feed]'); ?>
            </div>
        </div>
    </div>
</section>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="margin-from-left">
        <h2<?php if (is_front_page()) { ?> class="wow fadeInLeft"<?php } ?>>Contact me for more information</h2>
        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <a href="tel:<?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('phone_number');endwhile; ?>"<?php if (is_front_page()) { ?> class="wow fadeInLeft" data-wow-delay="0.3s"<?php } ?>>
                    <i class="fa fa-phone"></i><?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('phone_number');endwhile; ?></a>
                <a href="mailto:<?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('email_address');endwhile; ?>"<?php if (is_front_page()) { ?> class="wow fadeInLeft" data-wow-delay="0.4s"<?php } ?>>
                    <i class="fa fa-envelope"></i><?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('email_address');endwhile; ?></a>
                <a href="<?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('location_url');endwhile; ?>" target="_blank"<?php if (is_front_page()) { ?> class="wow fadeInLeft" data-wow-delay="0.5s"<?php } ?>>
                    <i class="fa fa-map"></i><?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('location_title');endwhile; ?></a>
            </div>
            <div class="col-xl-5 col-lg-6<?php if (is_front_page()) { ?> wow fadeInRight<?php } ?>"<?php if (is_front_page()) { ?> data-wow-delay="0.8s"<?php } ?>>
                <?php echo do_shortcode('[contact-form-7 id="80" title="Footer Contact Form"]'); ?>
            </div>
        </div>
    </div>

</div><!-- wrapper end -->

<div class="footer-copyright">
    <div class="margin-from-left<?php if (is_front_page()) { ?> wow fadeInUp<?php } ?>" <?php if (is_front_page()) { ?>data-wow-delay="0.9s"<?php } ?>>
        <?php echo do_shortcode('[copyrightText]'); ?>
    </div>
</div>

    </div> <!-- .site-right -->
</div><!-- .site-holder -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

