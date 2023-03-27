<?php

/**
 * Form Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'form-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'form';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$overtitle = get_field('overtitle');
$title = get_field('title');
$form = get_field('select_form');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid mb-160-r">
   <div class="row t-mobile-center">
      <div class="col-12">
         <?php if ($overtitle): ?><p class="overtitle"><span><?php echo $overtitle; ?></span></p><?php endif; ?>
         <?php if ($title): ?><h2><?php echo $title; ?></h2><?php endif; ?>
      </div>
   </div>
   <?php if($form): 
      $form_id = $form->ID;
      $form_title = $form->post_title;
      $form_shortcode = '[contact-form-7 id="' . $form_id . '" title="' . $form_title . '"]'
      ?>
      <div class="row custom-form">
         <div class="col-12">
            <?php echo do_shortcode( $form_shortcode ); ?>
         </div>
      </div>
      
   <?php endif; ?>
</section>