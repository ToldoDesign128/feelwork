<?php

/**
 * Heading Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'heading-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'heading';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$overtitle = get_field('overtitle');
$title = get_field('title');

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid"> 
   <div class="row">
      <div class="col-12">
         <?php if ($overtitle): ?><p class="overtitle"><span><?php echo $overtitle; ?></span></p><?php endif; ?>
         <h2><?php echo $title; ?></h2>
      </div>
   </div>
</div>
