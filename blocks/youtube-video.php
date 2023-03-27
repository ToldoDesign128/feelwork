<?php

/**
 * Youtube Video
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

$id = 'youtube-video-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$className = 'youtube-video';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assign defaults.
$iframe = get_field('embed');

// Use preg_match to find iframe src.
preg_match('/src="(.+?)"/', $iframe, $matches);
$src = $matches[1];

// Add extra parameters to src and replace HTML.
$params = array(
   'controls'  => 0,
   'hd'        => 1,
   'autohide'  => 1
);
$new_src = add_query_arg($params, $src);
$iframe = str_replace($src, $new_src, $iframe);

// Add extra attributes to iframe HTML.
$attributes = 'frameborder="0"';
$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> container-fluid mb-120-r">
   <div class="row">
      <div class="col-12 col-lg-10">
         <div class="embed-container">
            <?php echo $iframe ?>
         </div>
      </div>
   </div>
</section>