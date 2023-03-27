<?php get_header();

if ( have_posts() ) {
   while ( have_posts() ) { the_post();
   $post_ID = get_the_ID();

   $label = get_field('cpt-label', $post_ID);
   $excerpt = get_field('cpt-excerpt', $post_ID);
   ?>

   <section class="hero mb-160-r">
      <div class="container-fluid">
         <div class="row">
            <div class="col-12">
               <div class="hero-container t-mobile-center">
                  <p class="overtitle"><?php echo $label; ?></p>
                  <h1 class="h2-style"><?php the_title(); ?></h1>
                  <div class="text"><p><?php echo $excerpt; ?></p></div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <?php the_content(); 

   }
}?>

</main>
    
<?php get_footer(); ?>