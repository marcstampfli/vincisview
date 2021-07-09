<?php
/**
 * The template for isplaying all woocommerce pages.
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a different template.
 * 
 * @package understrap
 */

get_header();

$container = get_theme_mod('understrap_contrain_type');

?>

<div class="page-header">
	<div class="margin-from-left">
        <?php
        if(is_shop()) {
            echo '<h1 class="entry-title">Shop</h1>';
        } else if  (is_product_category()) {
            single_term_title('<h1 class="entry-title">', '</h1>');
        } else {
            the_title('<h1 class="entry-title">', '</h1>');
        }
        ?>
	</div>
</div>

<div class="header">
    <div class="container">
        <div class="holder">

        </div>
    </div>
</div>

<main class="site-main site-main-woocommerce" id="main">
	<div class="margin-from-left">
        <?php woocommerce_content(); ?>
	</div>
</main><!-- #main -->

<?php get_footer();
