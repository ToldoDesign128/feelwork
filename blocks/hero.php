<?php

/**
 * Hero Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'hero-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'hero';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$overtitle = get_field('overtitle');
$title = get_field('title');
$text = get_field('text');
$btn_p = get_field('btn_primary');
$btn_s = get_field('btn_secondary');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> mb-160-r">
   <div class="container-fluid">
      <canvas id="gradient-canvas" style="width:100vw;height:100vh;position:absolute;top:0;left:0;"></canvas>
         <div class="row">
            <div class="col-12">
                  <div class="hero-container t-mobile-center">
                     <?php if ($overtitle): ?><p class="overtitle"><?php echo $overtitle; ?></p><?php endif; ?>
                     <h1><?php echo $title; ?></h1>
                     <?php if ($text): ?><div class="text"><?php echo $text; ?></div><?php endif; ?>
                     <div class="btn-wrapper">
                        <?php if( $btn_p ): 
                           $link_url = $btn_p['url'];
                           $link_title = $btn_p['title'];
                           $link_target = $btn_p['target'] ? $btn_p['target'] : '_self';
                           ?>
                           <div>
                              <a class="button button-primary button-negative" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                           </div>
                        <?php endif; ?>
                        <?php if( $btn_s ): 
                           $link_url = $btn_s['url'];
                           $link_title = $btn_s['title'];
                           $link_target = $btn_s['target'] ? $btn_s['target'] : '_self';
                           ?>
                           <div>
                              <a class="button button-secondary button-negative" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                           </div>
                        <?php endif; ?>
                     </div>
                  </div>
            </div>
         </div>
      <script>
               var gradient = new Gradient()
               gradient.initGradient('#gradient-canvas');
      </script>
   </div>
</section>
<div class="afterhero"><div id="afterhero"></div></div>