<?php //Load a js file for the admin backend
if ( is_admin() ) : 
   function NP_adminscript() {
      wp_enqueue_script("NP-adminjs", get_template_directory_uri().'/js/admin.js', array("jquery"), null, false);
   }
   add_action("admin_enqueue_scripts", "NP_adminscript");
endif;

//Remove items from admin bar
function NP_remove_admin_bar_links() {
    global $wp_admin_bar;
    // $wp_admin_bar->remove_node('wp-logo');
    // $wp_admin_bar->remove_node('view-site');
    // $wp_admin_bar->remove_node('site-name');
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('about');
    $wp_admin_bar->remove_node('wporg');
    $wp_admin_bar->remove_node('documentation');
    $wp_admin_bar->remove_node('support-forums');
    $wp_admin_bar->remove_node('feedback');
    $wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_node('search');
    $wp_admin_bar->remove_node('customize');
}
add_action( 'wp_before_admin_bar_render', 'NP_remove_admin_bar_links' );



//Dashboard
function NP_remove_dashboard_widgets(){
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal');   //Remove from dashboard - right now
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Remove from dashboard - recent comments
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal');   //Remove from dashboard - plugins
    remove_meta_box('dashboard_quick_press', 'dashboard', 'normal');  //Remove from dashboard - quick press
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'normal');  //Remove from dashboard - recent drafts
    remove_meta_box('dashboard_primary', 'dashboard', 'normal');   //Remove from dashboard - wordpress blog
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal');   //Remove from dashboard - other wordpress news
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');   //Remove from dashboard - activity
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');   //Remove from dashboard - incoming links
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal');   //Remove from dashboard - site health status
    remove_action('welcome_panel', 'wp_welcome_panel');   //Remove from dashboard - welcome panel
    remove_action('try_gutenberg_panel', 'wp_try_gutenberg_panel');   //Remove from dashboard - welcome panel
}
add_action('admin_init', 'NP_remove_dashboard_widgets');



//Remove items from menu
function NP_remove_menus(){
    // remove_menu_page( 'index.php' ); // Dashboard
    remove_submenu_page('index.php', 'update-core.php');

    remove_menu_page( 'tools.php' ); // Tools
    remove_menu_page( 'edit-comments.php' ); //Comments

    //Settings
    remove_submenu_page('options-general.php', 'options-discussion.php');
    remove_submenu_page('options-general.php', 'options-privacy.php');
    
    //Plugins
    // remove_submenu_page('plugins.php', 'plugin-editor.php');
    remove_submenu_page('plugins.php', 'plugin-install.php');

    //Articoli
    remove_menu_page('edit.php');
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=category'); // Post categories
    remove_submenu_page('edit.php', 'edit-tags.php?taxonomy=post_tag'); // Post tags

    //Customize from Appearance
    $customizer_url = add_query_arg( 'return', urlencode( remove_query_arg( wp_removable_query_args(), wp_unslash( $_SERVER['REQUEST_URI'] ) ) ), 'customize.php' );
    remove_submenu_page( 'themes.php', $customizer_url );
}
add_action( 'admin_menu', 'NP_remove_menus' );
//Remove theme file editor and plugin file editor
function NP_remove_menus_editors() {
    define( 'DISALLOW_FILE_EDIT', true );
}
add_action('init','NP_remove_menus_editors');



//CSS castred Theme page
function NP_css_theme_page() {
    echo '<style type="text/css">

        /*Remove New theme button*/
        .wp-admin.themes-php .wrap a.hide-if-no-js.page-title-action:first-of-type {display:none !important;}

        /*Remove Customize button*/
        .wp-admin.themes-php .wrap .theme-actions a.hide-if-no-customize {display:none !important;}

    </style>';
}
add_action('wp_before_admin_bar_render', 'NP_css_theme_page');


//CSS castred Aspetto > Menu page
function NP_css_menu_page() {
    echo '<style type="text/css">

        /*Remove button Gestisci con anteprima in tempo reale*/
        .wp-admin.nav-menus-php #wpbody-content .page-title-action.hide-if-no-customize {display:none !important;}

    </style>';
}
add_action('wp_before_admin_bar_render', 'NP_css_menu_page');


//CSS Soft Remove items from menu
function NP_css_soft_remove_menu() {
    echo '<style type="text/css">

      /*hide Plugin*/
      .wp-admin #adminmenuwrap #menu-plugins {display:none !important;}

      /*hide ACF*/
      .wp-admin #adminmenuwrap #toplevel_page_edit-post_type-acf-field-group {display:none !important;}

      /*hide All-in-one wp migration*/
      .wp-admin #adminmenuwrap #toplevel_page_ai1wm_export {display:none !important;}

      /*hide Monster insight*/
      .wp-admin #adminmenuwrap #toplevel_page_monsterinsights_reports {display:none !important;}

      /*hide Iubenda*/
      // .wp-admin #adminmenuwrap #toplevel_page_iubenda {display:none !important;}
      // .wp-admin .wrap #iubenda-rate {display:none !important;} /*hide iubenda rate banner*/

    </style>';
}
add_action('wp_before_admin_bar_render', 'NP_css_soft_remove_menu');

// Remove admin bar
show_admin_bar(false);




/*Updates
---------------------------*/

//Remove update notice
// function NP_wphidenag() {
//     remove_action( 'admin_notices', 'update_nag', 3 );
// }
// add_action('admin_menu','NP_wphidenag');

//Remove wp auto updates
function NP_remove_core_auto_updates() {
    define( 'WP_AUTO_UPDATE_CORE', false );
}
add_action('init','NP_remove_core_auto_updates');

add_filter( 'auto_update_plugin', '__return_false' ); //Theme auto update
add_filter( 'auto_update_theme', '__return_false' ); //Plugin auto update

//CSS Soft Remove plugins auto updates
function NP_css_soft_remove_updates() {
    echo '<style type="text/css">

        .wp-admin #wpbody-content #auto-updates {display:none !important;}
        .wp-admin #wpbody-content .toggle-auto-update {display:none !important;}
        .wp-admin.plugins-php #wpbody-content #adv-settings label{display:none !important;}
        .wp-admin #wpbody-content li.auto-update-disabled {display:none !important;}

        /*Remove WP update from bottom right corner*/
        .wp-admin #wpfooter #footer-upgrade {display:none !important;}

    </style>';
}
add_action('wp_before_admin_bar_render', 'NP_css_soft_remove_updates');




/*Taxonomy Categories
----------------------------*/
function NP_css_custom_categories() {
    echo '<style type="text/css">
        
        /*hide category parent*/
        .wp-admin .form-field.term-parent-wrap {display:none !important;}

    </style>';
}
add_action('wp_before_admin_bar_render', 'NP_css_custom_categories');



//CSS Soft Remove annoying plugins banner Notices
function NP_css_soft_remove_notices() {
    echo '<style type="text/css">

        /*hide WP updates notice -- add a custom one*/
        .wp-admin #wpbody .update-nag.notice a:nth-of-type(2){display:none;}
        .wp-admin #wpbody .update-nag.notice:after{
            content:"Tieni aggiornato il tuo sito per mantenerlo accessibile e non incorrere in gravi problemi di sicurezza. Contatta il gestore del sito il prima possibile."
        }

        /*hide notice Yoast Duplicate Post*/
        .wp-admin #wpbody #duplicate-post-notice{display:none !important}

        /*hide notice Category Order and Taxonomy Terms Order*/
        .wp-admin #wpbody #cpt_info_box{display:none !important}

        /*hide CF7 welcome Notification*/
        .wp-admin .wrap #wpcf7-welcome-panel {display:none !important;}

    </style>';
}
add_action('wp_before_admin_bar_render', 'NP_css_soft_remove_notices');

?>