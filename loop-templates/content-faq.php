<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="card">
    <div class="card-header">
        <a class="card-link collapsed" data-toggle="collapse" href="#collapse-<?php the_ID(); ?>">
            <?php the_title(); ?>
            <i class="fa" aria-hidden="true"></i>
        </a>
    </div>
    <div id="collapse-<?php the_ID(); ?>" class="collapse" data-parent="#accordion">
        <div class="card-body">
            <?php the_content(); ?>
        </div>
    </div>
</div>
