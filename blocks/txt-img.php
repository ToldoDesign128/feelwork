<?php

/**
 * TESTO IMMAGINE
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'txt-img-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'txt-img';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$image = get_field('image');
$overtitle = get_field('overtitle');
$title = get_field('title');
$text = get_field('text');
$button = get_field('button');
$position = get_field('position');
?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid mb-160-r">
   <div class="row">
      <div class="col-12">
         <div class="orientation-wrapper <?php echo $position ?>">
            <div class="col-img">
               <?php if ($image): ?>
                  <figure class="img-wrapper">
                     <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                  </figure>
               <?php endif; ?>  
            </div>
            <div class="col-txt">
               <?php if ($overtitle): ?><p class="overtitle"><span><?php echo $overtitle; ?></span></p><?php endif; ?>
               <?php if ($title): ?><h2><?php echo $title; ?></h2><?php endif; ?>
               <?php if ($text): ?><div class="wysiwyg"><?php echo $text; ?></div><?php endif; ?>
               <?php if( $button ): 
                  $link_url = $button['url'];
                  $link_title = $button['title'];
                  $link_target = $button['target'] ? $button['target'] : '_self';
                  ?>
                  <a class="button button-primary button-positive" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
               <?php endif; ?>  
            </div>
         </div>
      </div>
   </div> 
</section>