<?php

/**
 * FAQ Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'faq-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'faq';
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
   <?php if( have_rows('faq') ): ?>
      <div class="row faq-row">
         <?php while( have_rows('faq') ) : the_row();
            $question = get_sub_field('faq_question');
            $answer = get_sub_field('faq_answer');
            ?>

            <article class="col-12">
               <div class="faq-container">
                  <div class="faq-question">
                     <h3><?php echo $question ?></h3>
                     <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 11.5V13.5H17.5V11.5H7.5Z"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.5 23C18.299 23 23 18.299 23 12.5C23 6.70101 18.299 2 12.5 2C6.70101 2 2 6.70101 2 12.5C2 18.299 6.70101 23 12.5 23ZM12.5 25C19.4036 25 25 19.4036 25 12.5C25 5.59644 19.4036 0 12.5 0C5.59644 0 0 5.59644 0 12.5C0 19.4036 5.59644 25 12.5 25Z"/>
                     </svg>
                  </div>
                  <div class="faq-answer">
                     <div class="wysiwyg"><?php echo $answer ?></div>
                  </div>
               </div>
            </article>

         <?php endwhile; ?>
      </div>
   <?php endif; ?>
</section>