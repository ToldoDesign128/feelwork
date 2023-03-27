<?php

//Custom GB full screen Logo
function NP_custom_fullscreeneditor_logo(){
    $screen = get_current_screen();
    if( ! $screen->is_block_editor ) {
        return;
    }
    echo '<style>
        body.is-fullscreen-mode .edit-post-header a.components-button.edit-post-fullscreen-mode-close svg{
            display: none;
        }
        body.is-fullscreen-mode .edit-post-header a.components-button.edit-post-fullscreen-mode-close:before{
            background-image: url(' . get_bloginfo('stylesheet_directory') . '/img/brand/custom-gb-logo.png);
            background-size: contain;
            /*you can the image paddings with the parameters below*/
            top: 10px;
            right: 10px;
            bottom: 10px;
            left: 10px;
        }     
    </style>';
}
add_action( 'admin_head', 'NP_custom_fullscreeneditor_logo' );



//CSS blocks visual helpers
function NP_blocks_helpers(){
    $screen = get_current_screen();
    if( ! $screen->is_block_editor ) {
        return;
    }
    echo '<style>
        .wp-block.wp-block:not(.editor-post-title):not(.block-list-appender):not(.block-editor-default-block-appender):not([data-type="generateblocks/grid"]){
            margin-top: 24px; margin-bottom: 24px; padding: 8px;
            border: dashed 2px #a8a8a8;
        }
        .wp-block.wp-block:not(.editor-post-title):not(.block-list-appender):not(.block-editor-default-block-appender):not([data-type="generateblocks/grid"]):hover{
            border: dashed 2px #0085ba;
        }
    </style>';
}
add_action( 'admin_head', 'NP_blocks_helpers' );



//disable gb Patterns
function NP_remove_bg_patterns() {
    remove_theme_support("core-block-patterns");
} 
add_action( 'after_setup_theme', 'NP_remove_bg_patterns' );



/*Remove all GB core blocks but not ACF
----------------------------------------------*/  
function gb_allowed_block_types( $allowed_blocks ) {
 
    // array with all the registered blocks
	$blocks = array_keys(WP_Block_Type_Registry::get_instance()->get_all_registered());
    // echo '<pre>' . print_r($blocks) . '</pre>';

    // array with all acf blocks
	$acfBlocks = array_filter($blocks, function($acf) {
        return $acf[0] == 'a' && $acf[1] == 'c' && $acf[2] == 'f';
    });
    // echo '<pre>' . print_r($acfBlocks) . '</pre>';

    return $acfBlocks;
 
}
add_filter( 'allowed_block_types_all', 'gb_allowed_block_types', 10, 2 );

//CSS soft remove all GB core blocks but not ACF
function NP_hide_gb_blocks(){
    echo '<style>

        /*Remove blocks searchbar*/
        .interface-interface-skeleton__secondary-sidebar .block-editor-inserter__search.components-search-control {display:none !important;}

        /*Remove tips*/
        .interface-interface-skeleton__secondary-sidebar .block-editor-inserter__tips {display:none !important;}

        /*Remove tutte le categorie e i relativi blocchi*/
        .interface-interface-skeleton__secondary-sidebar .block-editor-inserter__block-list div .block-editor-inserter__panel-content {display:none !important;}
        .interface-interface-skeleton__secondary-sidebar .block-editor-inserter__block-list div .block-editor-inserter__panel-header {display:none !important;}

        /*Show le ultime 3 categorie di blocchi*/
        .interface-interface-skeleton__secondary-sidebar .block-editor-inserter__block-list div .block-editor-inserter__panel-header:nth-last-of-type(-n+6) {display:inline-flex !important;}
        .interface-interface-skeleton__secondary-sidebar .block-editor-inserter__block-list div .block-editor-inserter__panel-content:nth-last-of-type(-n+5) {display:block !important;}
    
    </style>';
}
add_action( 'admin_head', 'NP_hide_gb_blocks' );




//CSS Custom ACF editor Wysiwyg
function NP_custom_wysiwyg(){
    echo '<style>

        /*paragraph*/
        .acf-block-body .acf-field-wysiwyg .mce-container.mce-flow-layout-item .mce-listbox,
        .interface-interface-skeleton__sidebar .components-panel .mce-container.mce-flow-layout-item .mce-listbox {display:none !important;}

        /*italic*/
        .acf-block-body .acf-field-wysiwyg .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(3),
        .interface-interface-skeleton__sidebar .components-panel .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(3){display:none;}

        /*ol*/
        .acf-block-body .acf-field-wysiwyg .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(5),
        .interface-interface-skeleton__sidebar .components-panel .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(5){display:none;}

        /*quote*/
        .acf-block-body .acf-field-wysiwyg .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(6),
        .interface-interface-skeleton__sidebar .components-panel .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(6){display:none;}

        /*text align*/
        .acf-block-body .acf-field-wysiwyg .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(7), .acf-block-body .acf-field-wysiwyg .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(8), .acf-block-body .acf-field-wysiwyg .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(9),
        .interface-interface-skeleton__sidebar .components-panel .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(7), .interface-interface-skeleton__sidebar .components-panel .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(8), .interface-interface-skeleton__sidebar .components-panel .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(9){display:none;}

        /*strange stuff*/
        .acf-block-body .acf-field-wysiwyg .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(11), .acf-block-body .acf-field-wysiwyg .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(12), .acf-block-body .acf-field-wysiwyg .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(13),
        .interface-interface-skeleton__sidebar .components-panel .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(11), .interface-interface-skeleton__sidebar .components-panel .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(12), .interface-interface-skeleton__sidebar .components-panel .mce-container.mce-flow-layout-item .mce-btn:nth-of-type(13){display:none;}

        /*fix del testo che scompare nel field*/
        .js .tmce-active .wp-editor-area{color: black !important;}
    
    </style>';
}
add_action( 'admin_head', 'NP_custom_wysiwyg' );


//HIDE visualizzazione blocchi ad elenco
function NP_list_view(){
    echo '<style>.interface-interface-skeleton__header .edit-post-header-toolbar__left button.edit-post-header-toolbar__list-view-toggle {display:none !important;}</style>';
}
add_action( 'admin_head', 'NP_list_view' );


//HIDE ACF access form CPT settings bar
function NP_acf_dir(){
   echo '<style>
      .interface-interface-skeleton__sidebar .edit-post-meta-boxes-area .acf-postbox button.handle-order-higher,
      .interface-interface-skeleton__sidebar .edit-post-meta-boxes-area .acf-postbox button.handle-order-lower,
      .interface-interface-skeleton__sidebar .edit-post-meta-boxes-area .acf-postbox a.acf-hndle-cog {display:none !important;}
   </style>';
}
add_action( 'admin_head', 'NP_acf_dir' );

?>