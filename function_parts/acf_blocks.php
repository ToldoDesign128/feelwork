<?php
/*ADD Option Page*/
if( function_exists('acf_add_options_page') ) {
   acf_add_options_page(array(
      'page_title' 	=> 'Informazioni di Contatto',
      'menu_title'	=> 'Contatti',
      'menu_slug' 	=> 'contact-settings',
      'capability'	=> 'edit_posts',
      'icon_url'      => 'dashicons-phone',
      'redirect'		=> true
   ));   


   acf_add_options_page(array(
      'page_title' 	=> 'Blocchi Globali',
      'menu_title'	=> 'Blocchi Globali',
      'menu_slug' 	=> 'theme-general-settings',
      'capability'	=> 'edit_posts',
      'icon_url'      => 'dashicons-admin-site-alt3',
      'redirect'		=> true
   ));   

      acf_add_options_sub_page(array(
         'page_title' 	=> 'Call To Action',
         'menu_title'	=> 'Call To Action',
         'parent_slug'	=> 'theme-general-settings',
      )); 

      acf_add_options_sub_page(array(
         'page_title' 	=> 'Team',
         'menu_title'	=> 'Team',
         'parent_slug'	=> 'theme-general-settings',
      ));

      acf_add_options_sub_page(array(
         'page_title' 	=> 'Certificazioni',
         'menu_title'	=> 'Certificazioni',
         'parent_slug'	=> 'theme-general-settings',
      ));

      acf_add_options_sub_page(array(
         'page_title' 	=> 'Recensioni',
         'menu_title'	=> 'Recensioni',
         'parent_slug'	=> 'theme-general-settings',
      ));
}

/*Categorie blocchi Gutemberg
--------------------------------------------------------------*/
function NP_block_categories( $categories, $post ) {
   return array_merge(
      $categories,
      array(
         array(
            'slug' => 'contentBlocks',
            'title' => __( 'Blocchi', 'NP' ),
            'icon' => 'block-default'
         ),
         array(
            'slug' => 'optionBlocks',
            'title' => __( 'Blocchi globali', 'NP' ),
            'icon' => 'admin-site-alt3'
         ),
         array(
            'slug' => 'loopBlocks',
            'title' => __( 'Loop dinamici', 'NP' ),
            'icon' => 'update'
         ),
      ) 
   );
}
add_filter( 'block_categories', 'NP_block_categories', 10, 2 );


/*Registriamo blocchi ACF
--------------------------------------------------------------*/
add_action('acf/init', 'NP_acf_init_block_types');
function NP_acf_init_block_types() {
   if( function_exists('acf_register_block_type') ) {

      /*Hero
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'hero',
         'title'             => __('Hero'),
         'description'       => __('Sezione hero'),
         'render_template'   => '/blocks/hero.php',
         'category'          => 'contentBlocks',
         'icon'              => 'superhero-alt',
         'keywords'          => array( 'section', 'hero' ),
         'mode'              => 'edit',
         
      ));

      /*Heading
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'heading',
         'title'             => __('Titolo'),
         'description'       => __('Sezione con soprattitolo e titolo'),
         'render_template'   => '/blocks/heading.php',
         'category'          => 'contentBlocks',
         'icon'              => 'heading',
         'keywords'          => array( 'section', 'heading' ),
         'mode'              => 'edit',
         
      ));
      
      /*Paragrafo
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'paragraph',
         'title'             => __('Paragrafo'),
         'description'       => __('Sezione per inserire un paragrafo di testo'),
         'render_template'   => '/blocks/paragraph.php',
         'category'          => 'contentBlocks',
         'icon'              => 'editor-paragraph',
         'keywords'          => array( 'section', 'paragraph' ),
         'mode'              => 'edit',
      ));

      /*Immagine
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'img',
         'title'             => __('Immagine'),
         'description'       => __('Aggiungi un immagine'),
         'render_template'   => '/blocks/image.php',
         'category'          => 'contentBlocks',
         'icon'              => 'format-image',
         'keywords'          => array( 'sezione', 'immagine'),
         'mode'              => 'edit',
      ));

      /*Cards
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'cards',
         'title'             => __('Cards'),
         'description'       => __('Sezione con cards'),
         'render_template'   => '/blocks/cards.php',
         'category'          => 'contentBlocks',
         'icon'              => 'columns',
         'keywords'          => array( 'section', 'cards' ),
         'mode'              => 'edit',
         
      ));

      /*List
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'list',
         'title'             => __('Elenco'),
         'description'       => __('Sezione con elenco'),
         'render_template'   => '/blocks/list.php',
         'category'          => 'contentBlocks',
         'icon'              => 'editor-ul',
         'keywords'          => array( 'section', 'list' ),
         'mode'              => 'edit',
         
      ));

      /*FAQ
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'faq',
         'title'             => __('F.A.Q.'),
         'description'       => __('Rispondi alle domande degli utenti'),
         'render_template'   => '/blocks/faq.php',
         'category'          => 'contentBlocks',
         'icon'              => 'editor-help',
         'keywords'          => array( 'section', 'faq' ),
         'mode'              => 'edit',
      ));

      /*FORM
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'form',
         'title'             => __('Form'),
         'description'       => __('Raccogli messaggi dagli utenti'),
         'render_template'   => '/blocks/form.php',
         'category'          => 'contentBlocks',
         'icon'              => 'testimonial',
         'keywords'          => array( 'section', 'form' ),
         'mode'              => 'edit',
      ));


      /*TESTO & IMMAGINE
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'txt_img',
         'title'             => __('Testo e Immagine'),
         'description'       => __('Blocco con testo su un lato e immagine sull\'altro'),
         'render_template'   => '/blocks/txt-img.php',
         'category'          => 'contentBlocks',
         'icon'              => 'align-pull-left',
         'keywords'          => array( 'testo', 'immagine', 'testo immagine' ),
         'mode'              => 'edit',
      ));

      /*CTA
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'cta',
         'title'             => __('Call to action'),
         'description'       => __('Sezione in evidenza con call to action'),
         'render_template'   => '/blocks/cta.php',
         'category'          => 'contentBlocks',
         'icon'              => 'button',
         'keywords'          => array( 'section', 'call to action' ),
         'mode'              => 'edit',
      ));

      /*GMAP
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'gmap',
         'title'             => __('Google Maps'),
         'description'       => __('Inserisci iframe'),
         'render_template'   => '/blocks/gmap.php',
         'category'          => 'contentBlocks',
         'icon'              => 'admin-site-alt',
         'keywords'          => array( 'section', 'gmap' ),
         'mode'              => 'edit',
      ));

      /*Youtube Video
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'youtube-video',
         'title'             => __('Youtube Video'),
         'description'       => __('Embed your youtube video'),
         'render_template'   => '/blocks/youtube-video.php',
         'category'          => 'contentBlocks',
         'icon'              => 'video-alt3',
         'keywords'          => array( 'section', 'youtube-video' ),
         'mode'              => 'edit',
      ));

      /*Spacers
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'spacer',
         'title'             => __('Spacers'),
         'description'       => __('Aggiungi uno spazio vuoto'),
         'render_template'   => '/blocks/spacer.php',
         'category'          => 'contentBlocks',
         'icon'              => 'fullscreen-alt',
         'keywords'          => array( 'sezione', 'spazio', 'vuoto' ),
         'mode'              => 'edit',
      ));

      /*Loop manuale
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'loop-manual',
         'title'             => __('Loop manuale'),
         'description'       => __('Aggiungi un elenco'),
         'render_template'   => '/blocks/loop-manual.php',
         'category'          => 'contentBlocks',
         'icon'              => 'menu-alt3',
         'keywords'          => array( 'sezione', 'spazio', 'vuoto' ),
         'mode'              => 'edit',
      ));



      /* GLOBAL BLOCKS
      --------------------------------------------------------
      --------------------------------------------------------*/

      /*Contact-CTA
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'contact-cta',
         'title'             => __('Contattaci CTA'),
         'description'       => __('Sezione con call to action ai contatti'),
         'render_template'   => '/blocks/global_contact-cta.php',
         'category'          => 'optionBlocks',
         'icon'              => 'button',
         'keywords'          => array( 'section', 'call to action' ),
         'mode'              => 'edit',
      ));

      /*Team
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'team',
         'title'             => __('Team'),
         'description'       => __('Sezione con team'),
         'render_template'   => '/blocks/global_team.php',
         'category'          => 'optionBlocks',
         'icon'              => 'buddicons-buddypress-logo',
         'keywords'          => array( 'section', 'team' ),
         'mode'              => 'edit',
      ));

      /*Certificazioni
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'logos',
         'title'             => __('Certificazioni'),
         'description'       => __('Sezione con certificazioni'),
         'render_template'   => '/blocks/global_logos.php',
         'category'          => 'optionBlocks',
         'icon'              => 'awards',
         'keywords'          => array( 'section', 'cert' ),
         'mode'              => 'edit',
      ));

      /*Recensioni
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'rev',
         'title'             => __('Recensioni'),
         'description'       => __('Sezione con recensioni'),
         'render_template'   => '/blocks/global_rev.php',
         'category'          => 'optionBlocks',
         'icon'              => 'star-half',
         'keywords'          => array( 'section', 'rev' ),
         'mode'              => 'edit',
      ));



      /* LOOP CPT BLOCKS
      --------------------------------------------------------
      --------------------------------------------------------*/
      
      /*Formazione
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'formazione',
         'title'             => __('Formazione'),
         'description'       => __('Sezione per i corsi di formazione'),
         'render_template'   => '/blocks/loop_formazione.php',
         'category'          => 'loopBlocks',
         'icon'              => 'welcome-learn-more',
         'keywords'          => array( 'section', 'formazione' ),
         'mode'              => 'edit',
      ));
      
      /*Innovazione
      --------------------------------------------------------*/
      // acf_register_block_type(array(
      //    'name'              => 'innovazione',
      //    'title'             => __('Innovazione'),
      //    'description'       => __('Sezione per i corsi di innovazione'),
      //    'render_template'   => '/blocks/loop_innovazione.php',
      //    'category'          => 'loopBlocks',
      //    'icon'              => 'share-alt',
      //    'keywords'          => array( 'section', 'innovazione' ),
      //    'mode'              => 'edit',
      // ));
      
      /*Servizi
      --------------------------------------------------------*/
      acf_register_block_type(array(
         'name'              => 'servizi',
         'title'             => __('Servizi'),
         'description'       => __('Sezione per i servizi'),
         'render_template'   => '/blocks/loop_servizi.php',
         'category'          => 'loopBlocks',
         'icon'              => 'admin-network',
         'keywords'          => array( 'section', 'servizi' ),
         'mode'              => 'edit',
      ));

   }
}
?>