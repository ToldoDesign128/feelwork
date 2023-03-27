<?php

/**
 * Paragraph Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'paragraph-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'paragraph';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$text = get_field('text');

if ($text) :
?>

   <div class="<?php echo esc_attr($className); ?> container-fluid mb-120-r"> 
      <div class="row">
         <div class="col-12">
            <div class="wysiwyg"><?php echo $text; ?></div> 
         </div>
      </div>
   </div>

<?php endif; ?>