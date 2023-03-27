<?php

/**
 * contact-CTA Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'contact-cta-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'contact-cta';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$overtitle = get_field('cta-overtitle', 'options');
$title = get_field('cta-title', 'options');
$text = get_field('cta-text', 'options');
$btn_p = get_field('cta_btn_p', 'options');
$btn_s = get_field('cta_btn_s', 'options');

$bg = get_field('cta-bg-switcher');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> i-v mb-160-r<?php if ($bg) : echo ' white-bg'; endif; ?>">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12 t-center">
            <?php if ($overtitle): ?><p class="overtitle"><span><?php echo $overtitle; ?></span></p><?php endif; ?>
            <?php if ($title): ?><h2><?php echo $title; ?></h2><?php endif; ?>
            <?php if ($text): ?><div class="text"><?php echo $text; ?></div><?php endif; ?>
            <div class="btn-wrapper">
               <?php if( $btn_p ): 
                  $link_url = $btn_p['url'];
                  $link_title = $btn_p['title'];
                  $link_target = $btn_p['target'] ? $btn_p['target'] : '_self';
                  ?>
                  <div>
                     <a class="button button-primary <?php if ($bg) : echo 'button-positive'; else : echo 'button-negative'; endif; ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  </div>
               <?php endif; ?>
               <?php if( $btn_s ): 
                  $link_url = $btn_s['url'];
                  $link_title = $btn_s['title'];
                  $link_target = $btn_s['target'] ? $btn_s['target'] : '_self';
                  ?>
                  <div>
                     <a class="button button-secondary <?php if ($bg) : echo 'button-positive'; else : echo 'button-negative'; endif; ?>" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                  </div>
               <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
   
   </div>
</section>