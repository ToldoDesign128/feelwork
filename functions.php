<?php
   //setup_theme
   function NP_setup_theme() {
      add_theme_support("title-tag");
      register_nav_menu("header", "Navbar Header");
   }
   add_action("after_setup_theme", "NP_setup_theme");
    
    
   //add CSS
   function NP_styles() {
      wp_enqueue_style("NP-grid", get_template_directory_uri().'/css-parts/bootstrap-grid.min.css');
      wp_enqueue_style("NP-swiper", get_template_directory_uri().'/css-parts/swiper-bundle.min.css');
      wp_enqueue_style("NP-style", get_template_directory_uri().'/style.min.css');
   }
   add_action("wp_enqueue_scripts", "NP_styles");
   //add JS
   function NP_scripts() {
      wp_enqueue_script("NP-script-swiper", get_template_directory_uri().'/js/swiper-bundle.min.js', array("jquery"), null, true);
      wp_enqueue_script("NP-script-in-view", get_template_directory_uri().'/js/jquery.in-viewport-class.min.js', array("jquery"), null, true);
      wp_enqueue_script("NP-script-gradient", get_template_directory_uri().'/js/Gradient.js', array("jquery"), null, false);
      wp_enqueue_script("NP-scriptjs", get_template_directory_uri().'/js/script.js', array("jquery"), null, true);
   }
   add_action("wp_enqueue_scripts", "NP_scripts");



   /*REMOVE
   ----------------------------------------------*/

   // Remove comments
   add_action('admin_init', function () {
      global $pagenow;
      if ($pagenow === 'edit-comments.php') {
         wp_redirect(admin_url());
         exit;
      }
      remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
      foreach (get_post_types() as $post_type) {
         if (post_type_supports($post_type, 'comments')) {
               remove_post_type_support($post_type, 'comments');
               remove_post_type_support($post_type, 'trackbacks');
         }
      }
   });
   add_filter('comments_open', '__return_false', 20, 2);
   add_filter('pings_open', '__return_false', 20, 2);
   add_filter('comments_array', '__return_empty_array', 10, 2);
   add_action('admin_menu', function () {
      remove_menu_page('edit-comments.php');
   });
   add_action('init', function () {
      if (is_admin_bar_showing()) {
         remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
      }
   });

   //Remove emoji
   function NP_disable_emojis() {
      remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
      remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
      remove_action( 'wp_print_styles', 'print_emoji_styles' );
      remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
      remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
      remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
      remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
      add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
      add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
   }
   add_action( 'init', 'NP_disable_emojis' );
   function disable_emojis_tinymce( $plugins ) {
      if ( is_array( $plugins ) ) {
      return array_diff( $plugins, array( 'wpemoji' ) );
      } else {
      return array();
      }
   }
   function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
      if ( 'dns-prefetch' == $relation_type ) {
         $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
         $urls = array_diff( $urls, array( $emoji_svg_url ) );
      }
      return $urls;
   }

   // Remove XML-RPC in WordPress
   add_filter('xmlrpc_enabled', '__return_false');



   /*ADD
   --------------------------------------------*/

   // Allow SVG
   add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
      global $wp_version;
      if ( $wp_version !== '4.7.1' ) {
         return $data;
      }
      $filetype = wp_check_filetype( $filename, $mimes );
      return [
         'ext'             => $filetype['ext'],
         'type'            => $filetype['type'],
         'proper_filename' => $data['proper_filename']
      ];
   }, 10, 4 );
   function cc_mime_types( $mimes ){
   $mimes['svg'] = 'image/svg+xml';
   return $mimes;
   }
   add_filter( 'upload_mimes', 'cc_mime_types' );
   function fix_svg() {
   echo '';
   }
   add_action( 'admin_head', 'fix_svg' );


   // ADD cpt menu order in admin panel
   // Formazione
   function add_new_formazione_column($formazione_columns) { $formazione_columns['menu_order'] = "Ordine"; return $formazione_columns;}
   add_action('manage_formazione_posts_columns', 'add_new_formazione_column');
   function show_order_column_formazione($name){ global $post; switch ($name) {
      case 'menu_order': $order = $post->menu_order; echo $order; break;
      default: break;
   }}
   add_action('manage_formazione_posts_custom_column','show_order_column_formazione');
   function order_column_register_sortable_formazione($columns){ $columns['menu_order'] = 'menu_order'; return $columns; }
   add_filter('manage_edit-formazione_sortable_columns','order_column_register_sortable_formazione');
   // Servizi
   function add_new_servizi_column($servizi_columns) { $servizi_columns['menu_order'] = "Ordine"; return $servizi_columns;}
   add_action('manage_servizi_posts_columns', 'add_new_servizi_column');
   function show_order_column_servizi($name){ global $post; switch ($name) {
      case 'menu_order': $order = $post->menu_order; echo $order; break;
      default: break;
   }}
   add_action('manage_servizi_posts_custom_column','show_order_column_servizi');
   function order_column_register_sortable_servizi($columns){ $columns['menu_order'] = 'menu_order'; return $columns; }
   add_filter('manage_edit-servizi_sortable_columns','order_column_register_sortable_servizi');




/*FUNCTION PARTS
-------------------------------------------------*/
//ACF
require dirname(__FILE__).'/function_parts/acf_blocks.php';

//CUSTOM BACKEND
require dirname(__FILE__).'/function_parts/custom-backend/branded-backend.php';
require dirname(__FILE__).'/function_parts/custom-backend/custom-gb.php';
require dirname(__FILE__).'/function_parts/custom-backend/castred-backend.php';

//CPT
require dirname(__FILE__).'/function_parts/cpt/formazione.php';
// require dirname(__FILE__).'/function_parts/cpt/innovazione.php';
require dirname(__FILE__).'/function_parts/cpt/servizi.php';
?>