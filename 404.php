<?php get_header(); ?>

<section class="hero">
   <div class="container-fluid">
      <div class="row">
         <div class="col-12">
            <div class="hero-container t-mobile-center">
               <p class="overtitle">ERRORE 404</p>
               <h1>Pagina non trovata</h1>
               <div class="text"><p>Questa pagina non esiste.</p></div>
               <div class="btn-wrapper">
                  <div>
                     <a class="button button-primary button-negative" href="<?php echo esc_url_raw(home_url()); ?>">Homepage</a>
                  </div>
                  <div>
                     <a class="button button-secondary button-negative" href="<?php echo get_permalink( get_page_by_path( 'contatti' ) ); ?>">Contattaci</a>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

</main>

<?php get_footer(); ?>