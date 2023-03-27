<?php

/**
 * List Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'list-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'list';
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
   <?php if( have_rows('list') ): ?>
      <div class="row t-mobile-center">
         <?php while( have_rows('list') ) : the_row();
            $list_title = get_sub_field('list_title');
            $list_text = get_sub_field('list_text');
            ?>

               <div class="col-12 col-md-6 col-xl-4">
                  <div class="list-item i-v">
                     <?php if ($list_title): ?><h3><?php echo $list_title; ?></h3><?php endif; ?>
                     <?php if ($list_text): ?><div><?php echo $list_text; ?></div><?php endif; ?>
                  </div>
               </div>

            <?php endwhile; ?>
      </div>
   <?php endif; ?>
</section>