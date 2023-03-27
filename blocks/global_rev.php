<?php

/**
 * Recensioni
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'rev-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'rev';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$overtitle = get_field('rev-overtitle', 'options');
$title = get_field('rev-title', 'options');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid mb-160-r">
   <div class="row t-mobile-center">
      <div class="col-12">
         <?php if ($overtitle): ?><p class="overtitle"><span><?php echo $overtitle; ?></span></p><?php endif; ?>
         <?php if ($title): ?><h2><?php echo $title; ?></h2><?php endif; ?>
      </div>
   </div>

   <?php if( have_rows('revs', 'options') ):?>
      <div class="row justify-content-center">
         <?php while( have_rows('revs', 'options') ) : the_row();
            $rev_text = get_sub_field('rev_text');
            $rev_img = get_sub_field('rev_img');
            $rev_name = get_sub_field('rev_name');
            ?>

            <div class="col-rev col-12 col-md-6 col-xl-4">
               <article class="rev-wrap t-center">
                  <div>
                     <div class="svg-wrapper">
                        <svg width="157" height="20" viewBox="0 0 157 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M9.54737 15.6571L15.4476 19.4807L13.8819 12.2743L19.0947 7.42559L12.2302 6.80028L9.54737 0.00390625L6.86456 6.80028L0 7.42559L5.21286 12.2743L3.64709 19.4807L9.54737 15.6571Z" fill="url(#paint0_linear_229_1579)"/>
                           <path d="M43.9179 15.6571L49.8182 19.4807L48.2524 12.2743L53.4653 7.42559L46.6007 6.80028L43.9179 0.00390625L41.2351 6.80028L34.3705 7.42559L39.5834 12.2743L38.0176 19.4807L43.9179 15.6571Z" fill="url(#paint1_linear_229_1579)"/>
                           <path d="M78.2884 15.6571L84.1887 19.4807L82.6229 12.2743L87.8358 7.42559L80.9712 6.80028L78.2884 0.00390625L75.6056 6.80028L68.7411 7.42559L73.9539 12.2743L72.3881 19.4807L78.2884 15.6571Z" fill="url(#paint2_linear_229_1579)"/>
                           <path d="M112.659 15.6571L118.559 19.4807L116.993 12.2743L122.206 7.42559L115.342 6.80028L112.659 0.00390625L109.976 6.80028L103.112 7.42559L108.324 12.2743L106.759 19.4807L112.659 15.6571Z" fill="url(#paint3_linear_229_1579)"/>
                           <path d="M147.029 15.6571L152.93 19.4807L151.364 12.2743L156.577 7.42559L149.712 6.80028L147.029 0.00390625L144.347 6.80028L137.482 7.42559L142.695 12.2743L141.129 19.4807L147.029 15.6571Z" fill="url(#paint4_linear_229_1579)"/>
                           <defs>
                           <linearGradient id="paint0_linear_229_1579" x1="156.577" y1="0.00396618" x2="-0.275384" y2="16.9285" gradientUnits="userSpaceOnUse">
                           <stop stop-color="#24B7AC"/>
                           <stop offset="1" stop-color="#1B7F78"/>
                           </linearGradient>
                           <linearGradient id="paint1_linear_229_1579" x1="156.577" y1="0.00396618" x2="-0.275384" y2="16.9285" gradientUnits="userSpaceOnUse">
                           <stop stop-color="#24B7AC"/>
                           <stop offset="1" stop-color="#1B7F78"/>
                           </linearGradient>
                           <linearGradient id="paint2_linear_229_1579" x1="156.577" y1="0.00396618" x2="-0.275384" y2="16.9285" gradientUnits="userSpaceOnUse">
                           <stop stop-color="#24B7AC"/>
                           <stop offset="1" stop-color="#1B7F78"/>
                           </linearGradient>
                           <linearGradient id="paint3_linear_229_1579" x1="156.577" y1="0.00396618" x2="-0.275384" y2="16.9285" gradientUnits="userSpaceOnUse">
                           <stop stop-color="#24B7AC"/>
                           <stop offset="1" stop-color="#1B7F78"/>
                           </linearGradient>
                           <linearGradient id="paint4_linear_229_1579" x1="156.577" y1="0.00396618" x2="-0.275384" y2="16.9285" gradientUnits="userSpaceOnUse">
                           <stop stop-color="#24B7AC"/>
                           <stop offset="1" stop-color="#1B7F78"/>
                           </linearGradient>
                           </defs>
                        </svg>
                     </div>
                     <?php if ($rev_text) : ?><p class="text">“<?php echo $rev_text; ?>”</p><?php endif; ?>
                  </div>
                  <div>
                     <div class="img-wrapper">
                        <div class="aspect-ratio-square">
                           <figure>
                              <?php if ($rev_img) : ?><img src="<?php echo esc_url($rev_img['url']); ?>" alt="<?php echo esc_attr($rev_img['alt']); ?>" /><?php endif; ?>
                           </figure>
                        </div>
                     </div>
                     <?php if ($rev_name) : ?><p class="name"><?php echo $rev_name; ?></p><?php endif; ?>
                  </div>
               </article>
            </div>

         <?php endwhile; ?>
      </div>
   <?php endif; ?>

</section>