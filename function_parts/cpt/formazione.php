<?php
/*Replace = formazione*/

function NP_custom_formazione() {
    register_post_type( 'formazione',
        array(
            'labels'                =>          array(
               'name'              =>          'Formazione',
               'singular_name'     =>          'Corso formazione',
               'all_items'         =>          'Tutti i corsi', 
               'add_new'           =>          'Aggiungi nuovo corso',
               'add_new_item'      =>          'Aggiungi nuovo  corso',
               'edit_item'         =>          'Modifica corso',
               'new_item'          =>          'Nuovo corso',
               'view_item'         =>          'Visualizza corso',
               'search_items'      =>          'Cerca',
               'not_found'         =>          'Nessun elemento trovato',
               'not_found_in_trash'=>          'Nessun elemento nel cestino',
               'parent_item_colon' =>          '',
            ),
            'description'           =>          'Formazione',
            'public'                =>          true,
            'publicly_queryable'    =>          true,
            'exclude_from_search'   =>          false,
            'show_ui'               =>          true,
            'query_var'             =>          true,
            'menu_position'         =>          20,
            'menu_icon'             =>          'dashicons-welcome-learn-more', //Dashicon
            'rewrite'               =>          array(
               'slug'               =>          'corsi-formazione',
               'with-front'         =>          false,
            ),
            'has_archive'           =>          false,
            'capability_type'       =>          'post',
            'hierarchycal'          =>          false,
            'show_in_rest'          =>          true, //gutemberg
            'supports'              =>          array('title', 'editor', 'page-attributes')
        ), flush_rewrite_rules()
    );
}
add_action( 'init', 'NP_custom_formazione');

?>