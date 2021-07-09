<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
$current_user = wp_get_current_user();
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital@0;1&family=Fira+Sans:ital,wght@0,200;0,400;0,700;1,400;1,500&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-DT8MLYJZ5Y"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-DT8MLYJZ5Y');
	</script>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">
	<div id="menu-overlay">
		<div class="top-logo-holder margin-from-left">
			<div class="logo-title">
				<div class="logo">
					<?php the_custom_logo(); ?>
				</div>
				<div class="social-media">
					<?php 
					while ( have_rows('social_media', 'option') ) : the_row();
						$socialchannel = get_sub_field('social_channel', 'option');
						$socialurl = get_sub_field('social_url', 'option');
						echo '<a href="' . $socialurl . '" target="_blank">';
						echo '<i class="fa fa-' . $socialchannel . '" aria-hidden="true"></i>';
						echo '<span class="sr-only hidden">' . ucfirst($socialchannel) . '</span>';
						echo '</a>';
					endwhile;
					?>
				</div>
			</div>
		</div>
		<div class="margin-from-left">
			<div class="title">
				Site Navigation
			</div>
			<?php
				wp_nav_menu(
					array(
						'theme_location' 	=> 'primary',
						'fallback_cb' 		=> '',
						'depth' 			=> 16,
						'walker'			=> new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
			?>
			<div class="sub-title">
				My Albums
			</div>
			<?php
				wp_nav_menu(
					array(
						'theme_location' 	=> 'primary',
						'fallback_cb' 		=> '',
						'depth' 			=> 1,
						'menu'				=> 17,
						'walker'			=> new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
			?>
			<div class="sub-title">
				Blog
			</div>
			<?php
				wp_nav_menu(
					array(
						'theme_location' 	=> 'primary',
						'fallback_cb' 		=> '',
						'depth' 			=> 1,
						'menu'				=> 18,
						'walker'			=> new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
			?>
		</div>
		<div class="menu-overlay-contact-form">
			<div class="margin-from-left">
				<h2>Contact me for more information</h2>
				<div class="row">
					<div class="col-xl-3 col-lg-4">
						<a href="tel:<?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('phone_number');endwhile; ?>">
							<i class="fa fa-phone"></i><?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('phone_number');endwhile; ?></a>
						<a href="mailto:<?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('email_address');endwhile; ?>">
							<i class="fa fa-envelope"></i><?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('email_address');endwhile; ?></a>
						<a href="<?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('location_url');endwhile; ?>" target="_blank">
							<i class="fa fa-map"></i><?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('location_title');endwhile; ?></a>
					</div>
					<div class="col-xl-5 col-lg-6">
						<?php echo do_shortcode('[contact-form-7 id="9" title="Footer Contact Form"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="site-holder">
		
		<div class="site-left">
			<div class="header-copyright<?php if (is_front_page()) { ?> wow fadeInLeftBig<?php } ?>"<?php if (is_front_page()) { ?> data-wow-delay="0.5s"<?php } ?>>
			<?php echo do_shortcode('[copyrightText]'); ?>
			</div>
		</div>

		<div class="site-right">

	<div id="top-bar"<?php if (is_front_page()) { ?> class="wow fadeInDown" data-wow-delay="0.5s"<?php } ?>>
	<?php if ( class_exists( 'WooCommerce' ) ) { ?><a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="login-register-mobile" title="<?php if ( is_user_logged_in() ) { _e( 'Welcome '.$current_user->display_name, 'vincisview' ); } else { _e( 'Login / Register', 'vincisview' ); } ?>">
			<i class="fa fa-user-circle"></i>
			<?php if ( is_user_logged_in() ) { _e( 'Welcome '.$current_user->display_name, 'vincisview' ); } else { _e( 'Login / Register', 'vincisview' ); } ?>
		</a><?php } ?>
		<div class="contact-info">
			<div class="contact-item phone">
				<i class="fa fa-phone"></i> 
				<a href="tel:<?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('phone_number');endwhile; ?>"><?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('phone_number');endwhile; ?></a>
			</div>
			<div class="contact-item email">
				<i class="fa fa-envelope"></i> 
				<a href="mailto:<?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('email_address');endwhile; ?>"><?php while( have_rows('contact_info', 'option') ): the_row();the_sub_field('email_address');endwhile; ?></a>
			</div>
			<div class="contact-item search">
				<i class="fa fa-search"></i> 
				<?php get_search_form(); ?>
			</div>
		</div>
		
		<?php if ( class_exists( 'WooCommerce' ) ) { ?><div class="shipping-info">
			<i class="fa fa-truck"></i> 
			Free shipping on orders over $200
		</div><?php } ?>
		
		<?php if ( class_exists( 'WooCommerce' ) ) { ?><a href="<?php echo wc_get_page_permalink( 'myaccount' ); ?>" class="login-register" title="<?php if ( is_user_logged_in() ) { _e( 'Welcome '.$current_user->display_name, 'vincisview' ); } else { _e( 'Login / Register', 'vincisview' ); } ?>">
			<?php if ( is_user_logged_in() ) { _e( 'Welcome '.$current_user->display_name, 'vincisview' ); } else { _e( 'Login / Register', 'vincisview' ); } ?>
			<i class="fa fa-user-circle"></i> 
		</a><?php } ?>
		<a href="javascript:toggleMenu();" class="mobile-menu">
			Menu
			<i class="fa fa-bars"></i> 
		</a>
	</div>

	<?php if ( class_exists( 'WooCommerce' ) ) { ?><div class="mobile-top-shippping-info margin-from-left">
		<i class="fa fa-truck"></i> 
		Free shipping on orders over $200
	</div><?php } ?>

	<div class="top-logo-holder margin-from-left">
		<div class="logo-title">
			<div class="logo<?php if (is_front_page()) { ?> wow fadeInRight<?php } ?>">
				<?php the_custom_logo(); ?>
			</div>
			<div class="social-media">
				<?php 
					while ( have_rows('social_media', 'option') ) : the_row();
						$socialchannel = get_sub_field('social_channel', 'option');
						$socialurl = get_sub_field('social_url', 'option');
						echo '<a href="' . $socialurl . '" target="_blank"'.(is_front_page() ? ' class="wow bounceIn" data-wow-delay="0.'.get_row_index().'s"' : '').'>';
						echo '<i class="fa fa-' . $socialchannel . '" aria-hidden="true"></i>';
						echo '<span class="sr-only hidden">' . ucfirst($socialchannel) . '</span>';
						echo '</a>';
					endwhile;
					?>
			</div>
		</div>
	</div>

	<div class="top-menu-right<?php if (is_front_page()) { ?> wow fadeInRight<?php } ?>"<?php if (is_front_page()) { ?> data-wow-delay="0.3s"<?php } ?>>
		<ul>
			<li>
				<a href="javascript:toggleMenu();" class="top-menu-right-menu">
					Menu
					<i class="fa fa-bars"></i>
				</a>
			</li>
			<?php if ( class_exists( 'WooCommerce' ) ) { ?>
			<li>
				<a href="<?php echo wc_get_page_permalink( 'shop' ); ?>">
					Shop
					<i class="fa fa-shopping-bag"></i>
				</a>
			</li>
			<li>
				<a href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart' ); ?>">
					Cart <span>(<?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?> – <?php echo WC()->cart->get_cart_total(); ?>)</span>
					<i class="fa fa-shopping-cart"></i>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>