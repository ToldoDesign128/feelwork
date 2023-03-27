<?php

/**
 * Certificazioni
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'logos-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'logos';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$overtitle = get_field('logos_overtitle', 'options');
$title = get_field('logos_title', 'options');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> mb-160-r">

   <div class="container-fluid">
      <div class="row t-mobile-center">
         <div class="col-12">
            <?php if ($overtitle): ?><p class="overtitle"><span><?php echo $overtitle; ?></span></p><?php endif; ?>
            <?php if ($title): ?><h2><?php echo $title; ?></h2><?php endif; ?>
         </div>
      </div>
   </div>

   <?php if( have_rows('logos', 'options') ): ?>
      <div class="swiper swiper__logos">
         <div class="swiper-wrapper">
            <?php while( have_rows('logos', 'options') ) : the_row();
               $logo_img = get_sub_field('logo_img');
               $logo_url = get_sub_field('logo_url');
               ?>
               <div class="swiper-slide">
                  <a <?php if($logo_url): echo 'href="' . $logo_url . '" target="_blank" rel="noopener noreferrer"'; endif;?>>
                     <figure>
                        <img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php echo esc_attr($logo_img['alt']); ?>" />
                     </figure>
                  </a>
               </div>
            <?php endwhile; ?>
         </div>
      </div>
    <?php endif; ?>

</section>

<?php