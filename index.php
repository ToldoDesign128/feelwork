<?php get_header();

if ( have_posts() ) {
    while ( have_posts() ) {
        the_post(); ?>
            <?php the_content(); ?>
        <?php
    }
}?>
</main>

<?php get_footer(); ?>