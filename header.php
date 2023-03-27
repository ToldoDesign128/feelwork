<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
   <!-- Google tag (gtag.js) -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-MPEE3HL1DB"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-MPEE3HL1DB');
   </script>
   <meta <?php bloginfo('charset'); ?>>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
   <meta name="format-detection" content="telephone=no">
   <meta name="theme-color" content="#1F1D1D">
   <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/brand/favicon-light.png" type="image/x-icon" media="(prefers-color-scheme: light)">
   <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/brand/favicon-dark.png" type="image/x-icon" media="(prefers-color-scheme: dark)">
   <meta name="description" content="<?php bloginfo('description'); ?>">
   <!-- <style>
      .hero{
         background-image: url("<?php //echo get_template_directory_uri(); ?>/img/feelwork-gradient-s.jpg"); 
         background-repeat: no-repeat;
         background-size: cover;
         background-position: center;
         background-origin: border-box;
      }
      @media screen and (min-width: 768px) {
         .hero{
            background-image: url("<?php //echo get_template_directory_uri(); ?>/img/feelwork-gradient-t.jpg"); 
         }
      }
      @media screen and (min-width: 1200px) {
         .hero{
            background-image: url("<?php //echo get_template_directory_uri(); ?>/img/feelwork-gradient-d.jpg"); 
         }
      }
   </style> -->
   <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>> <?php wp_body_open(); ?>

   <a class="skip-link" href="#site-content"><?php echo __('Skip to content', 'np') ?></a>
    
   <header id="navigation">
      <nav>
         <div class="container-fluid">
            <div class="row align-items-center">
               <!--Logo-->
               <div class="col-8 col-xl-3">
                  <a class="header__logo" href="<?php echo esc_url_raw(home_url()); ?>">
                     <img src="<?php echo get_template_directory_uri(); ?>/img/brand/feelwork-logo.svg" alt="Logo <?php bloginfo('name'); ?>">
                  </a>
               </div>   
               <!--icona hamburger-->
               <div class="col-4 header__hamburger">
                     <button class="hamburger" type="button">
                        <span class="menu-icon-bread menu-icon-bread-top">
                           <span class="menu-icon-bread-crust menu-icon-bread-crust-top"></span>
                        </span>
                        <span class="menu-icon-bread menu-icon-bread-bottom">
                           <span class="menu-icon-bread-crust menu-icon-bread-crust-bottom"></span>
                        </span>
                     </button>
               </div>               
               <!--pannello menu widget-->
               <div class="col-xl-9 header__menu">
                  <?php wp_nav_menu(array(
                        'theme_location'    =>  'header',
                        'container'         =>  false,
                        'menu_class'      => 'main-menu'
                  )); ?>
               </div>
            </div>
         </div> 
      </nav>
   </header>
    
   <main id="site-content">