<?php

/**
 * Servizi Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


$cpt = 'servizi';

$args = array(
   'post_type'       => $cpt,
   'posts_per_page'  => -1,
   'post_status'     => 'publish',
   'orderby'         => 'menu_order',
   'order'           => 'ASC',
);
$wp_loop_query = new WP_Query( $args );

if ( $wp_loop_query->have_posts() ) :
   require( locate_template( 'loop.php' ) );
endif; ?>