<?php

/**
 * Team
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'team-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'team';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$bg = get_field('team-bg-switcher');


if( have_rows('teams', 'options') ):?>
   <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> i-v mb-160-r<?php if ($bg) : echo ' white-bg'; endif; ?>">
      <div class="container-fluid">
         <div class="row justify-content-center">
            <?php while( have_rows('teams', 'options') ) : the_row();
               $team_img = get_sub_field('team_img');
               $team_name = get_sub_field('team_name');
               $team_role = get_sub_field('team_role');
               $team_spec = get_sub_field('team_spec');
               ?>

               <div class="col-team col-12 col-md-6 col-xl-4">
                  <article class="team-wrap t-center">
                     <div class="img-wrapper">
                        <div class="aspect-ratio-square">
                           <figure>
                              <?php if ($team_img) : ?><img src="<?php echo esc_url($team_img['url']); ?>" alt="<?php echo esc_attr($team_img['alt']); ?>" /><?php endif; ?>
                           </figure>
                        </div>
                     </div>
                     <?php if ($team_name) : ?><h3><?php echo $team_name; ?></h3><?php endif; ?>
                     <?php if ($team_role) : ?><p class="role"><?php echo $team_role; ?></p><?php endif; ?>
                     <?php if ($team_spec) : ?><p class="spec"><?php echo $team_spec; ?></p><?php endif; ?>
                  </article>
               </div>

            <?php endwhile; ?>
         </div>
      </div>
   </section>
<?php endif; ?>