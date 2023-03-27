<?php

/**
 * Loop-manual Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'loop-manual-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'loop-manual';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

?>

<?php if( have_rows('loop-manual') ): ?>
   <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> loop-cpt container-fluid mb-160-r">
      <div class="row">
         <?php while( have_rows('loop-manual') ) : the_row();
            $loop_manual_link = get_sub_field('loop-manual_link');
            $loop_manual_label = get_sub_field('loop-manual_label');
            $loop_manual_title = get_sub_field('loop-manual_title');
            $loop_manual_txt = get_sub_field('loop-manual_txt');
            $loop_manual_img = get_sub_field('loop-manual_img');
            ?>

            <div class="col-12">
               <article>
                  <?php if($loop_manual_link):
                     $link_url = $loop_manual_link['url'];
                     $link_title = $loop_manual_link['title'];
                     $link_target = $loop_manual_link['target'] ? $loop_manual_link['target'] : '_self'; ?>
                     <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" class="cpt">
                        <div class="flex-wrap">
                           <div class="content">
                                 <?php if ($loop_manual_label) : ?><p class="label"><?php echo $loop_manual_label; ?></p><?php endif; ?>
                                 <?php if ($loop_manual_title) : ?><h3><?php echo $loop_manual_title ?></h3><?php endif; ?>
                                 <?php if ($loop_manual_txt) : ?><p class="excerpt"><?php echo $loop_manual_txt; ?></p><?php endif; ?>
                           </div>
                           <div class="img">
                              <div class="aspect-ratio-square">
                                 <?php if ( $loop_manual_img) : ?><figure>
                                    <img src="<?php echo esc_url( $loop_manual_img['url']); ?>" alt="<?php echo esc_attr( $loop_manual_img['alt']); ?>" />
                                 </figure><?php endif; ?>
                              </div>
                           </div>
                        </div>
                     </a>
                  <?php else : ?>
                     <a class="cpt">
                        <div class="flex-wrap">
                           <div class="content">
                                 <?php if ($loop_manual_label) : ?><p class="label"><?php echo $loop_manual_label; ?></p><?php endif; ?>
                                 <?php if ($loop_manual_title) : ?><h3><?php echo $loop_manual_title ?></h3><?php endif; ?>
                                 <?php if ($loop_manual_txt) : ?><p class="excerpt"><?php echo $loop_manual_txt; ?></p><?php endif; ?>
                           </div>
                           <div class="img">
                              <div class="aspect-ratio-square">
                                 <?php if ( $loop_manual_img) : ?><figure>
                                    <img src="<?php echo esc_url( $loop_manual_img['url']); ?>" alt="<?php echo esc_attr( $loop_manual_img['alt']); ?>" />
                                 </figure><?php endif; ?>
                              </div>
                           </div>
                        </div>
                     </a>
                  <?php endif; ?>
               </article>
            </div>

         <?php endwhile; ?>
      </div>
   </section>
<?php endif; ?>