<div class="container-fluid loop-cpt mb-160-r">
   <div class="row">
      <?php while ( $wp_loop_query->have_posts() ) : $wp_loop_query->the_post(); $post_ID = get_the_ID();
         $cpt_label = get_field('cpt-label', $post_ID);
         $cpt_excerpt = get_field('cpt-excerpt', $post_ID);
         $cpt_img = get_field('cpt-img', $post_ID);
         ?>

         <div class="col-12">
            <article>
               <a href="<?php the_permalink();?>" class="cpt">
                  <div class="flex-wrap">
                     <div class="content">
                        <!-- <div> -->
                           <?php if ($cpt_label) : ?><p class="label"><?php echo $cpt_label; ?></p><?php endif; ?>
                           <h3><?php the_title(); ?></h3>
                           <?php if ($cpt_excerpt) : ?><p class="excerpt"><?php echo $cpt_excerpt; ?></p><?php endif; ?>
                        <!-- </div>
                        <div>
                           <span class="button button-primary button-positive">Scopri di più</span>
                        </div> -->
                     </div>
                     <div class="img">
                        <div class="aspect-ratio-square">
                           <?php if ($cpt_img) : ?><figure>
                              <img src="<?php echo esc_url($cpt_img['url']); ?>" alt="<?php echo esc_attr($cpt_img['alt']); ?>" />
                           </figure><?php endif; ?>
                        </div>
                     </div>
                  </div>
               </a>
            </article>
         </div>

      <?php endwhile; ?>
   </div>
</div>
<?php wp_reset_postdata(); ?>