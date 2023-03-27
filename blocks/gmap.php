<?php

/**
 * Gmap Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'gmap-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'gmap';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$iframe = get_field('gmap');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
   <div class="embed-container">
      <?php echo $iframe ?>
   </div>
</section>