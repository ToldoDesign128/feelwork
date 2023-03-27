<?php

/**
 * Cards Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'cards-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'cards';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$overtitle = get_field('overtitle');
$title = get_field('title');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid mb-160-r">
   <div class="row t-mobile-center">
      <div class="col-12">
         <?php if ($overtitle): ?><p class="overtitle"><span><?php echo $overtitle; ?></span></p><?php endif; ?>
         <?php if ($title): ?><h2><?php echo $title; ?></h2><?php endif; ?>
      </div>
   </div>
   <?php if( have_rows('cards') ): ?>
      <div class="row cards-row t-mobile-center">
         <?php while( have_rows('cards') ) : the_row();
            $card_img = get_sub_field('card_img');
            $card_title = get_sub_field('card_title');
            $card_text = get_sub_field('card_text');
            $card_btn = get_sub_field('card_btn');
            ?>

            <div class="card-col col-12 col-md-6 col-xl-4">

               <a <?php if( $card_btn ): 
               $link_url = $card_btn['url'];
               $link_title = $card_btn['title'];
               $link_target = $card_btn['target'] ? $card_btn['target'] : '_self';
               ?>
                  href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"
               <?php endif; ?>
               class="card">
                  <div class="content-wrapper">
                     <?php if ($card_img): ?><figure>
                        <img src="<?php echo esc_url($card_img['url']); ?>" alt="<?php echo esc_attr($card_img['alt']); ?>" />
                     </figure><?php endif; ?>
                     <?php if ($card_title): ?><h3><?php echo $card_title; ?></h3><?php endif; ?>
                     <?php if ($card_text): ?><div><?php echo $card_text; ?></div><?php endif; ?>
                  </div>
                  <?php if( $card_btn ): ?>
                     <div class="button-wrapper">
                        <p class="button button-primary button-negative"><?php echo esc_html( $link_title ); ?></p>
                     </div>
                  <?php endif; ?>
               </a>

            </div>

         <?php endwhile; ?>
      </div>
   <?php endif; ?>
</section>