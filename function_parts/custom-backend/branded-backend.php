<?php

//Custom backend main logo
function NP_custom_logo() {
    echo'<style type="text/css">

    #wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
        background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/brand/custom-logo.png) !important;
        background-position: 0 0;
        background-size: cover;
        color:rgba(0, 0, 0, 0);
    }
        #wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon {
        background-position: 0 0;
    }
    
    </style>';
}
add_action('wp_before_admin_bar_render', 'NP_custom_logo');



//Custom wp login logo = 85x85px
function NP_custom_login_logo() { 
    echo '<style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/brand/custom-login-logo.png);
            background-repeat: no-repeat;
            background-size: cover;
            margin-bottom: 10px
        }
        #login h1::after, .login h1::after {
            content: "bisogno di aiuto? 👇 (matteobruschetti@gmail.com) ";
            font-size: 16px;
            font-weight: 400;
            opacity: 0.72;
            margin-bottom: 20px
        }
    </style>';
}
add_action('login_enqueue_scripts', 'NP_custom_login_logo');



//Custom text footer
function NP_remove_footer_admin () {
    echo '<p>Bisogno di aiuto? 👉 <a href="mailto:matteobruschetti@gmail.com" target="_blank">matteobruschetti@gmail.com</a>  |  website by <a href="https://matteobruschetti.it/" target="_blank">◐Matteo</a></p>';
}
add_filter('admin_footer_text', 'NP_remove_footer_admin');




//Custom Dashboard page
function NP_custom_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', 'Bisogno di aiuto?', 'custom_dashboard_help');
}
function custom_dashboard_help() {
    echo '<p>👉 <a href="mailto:matteobruschetti@gmail.com" target="_blank">matteobruschetti@gmail.com</a></p>';
}
add_action('wp_dashboard_setup', 'NP_custom_dashboard_widgets');



//Custom inject CSS
function NP_css_injected() {
    echo '<style type="text/css">

        /*CF7 custom voce di menù*/
        //.wp-admin #adminmenuwrap #toplevel_page_wpcf7 .wp-menu-name:before{content:"Form di ";}
        .wp-admin #adminmenuwrap #toplevel_page_wpcf7 .wp-menu-name:before{content:"Form";visibility:visible;} .wp-admin #adminmenuwrap #toplevel_page_wpcf7 .wp-menu-name{visibility:hidden;}

    </style>';
}
add_action('wp_before_admin_bar_render', 'NP_css_injected');



//Custom Color Scheme
//https://wpadmincolors.com/
function nakedpress_admin_color_scheme() {
   $theme_dir = get_stylesheet_directory_uri();
   wp_admin_css_color( 'feelwork', __( 'Feelwork' ),
      $theme_dir . '/css-parts/feelwork.css',
      array( '#1d2327', '#ffffff', '#e1a948' , '#219c93')
   );
}
add_action('admin_init', 'nakedpress_admin_color_scheme');

?>