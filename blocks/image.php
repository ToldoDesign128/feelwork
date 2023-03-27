<?php

/**
 * Immagine
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'blocco-immagine-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'blocco-immagine';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$image = get_field('image');

if ($image) :
?>

   <section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid mb-120-r">
      <div class="row">
         <div class="col-12">
            <figure>
               <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </figure>
         </div>
      </div>
   </section>

<?php endif; ?>