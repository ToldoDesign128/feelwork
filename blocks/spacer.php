<?php

/**
 * Counters Block Template based on PAGE OPTIONS
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'spacer-block-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'spacer-block';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$space = get_field('space');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php echo $space?>"></div>