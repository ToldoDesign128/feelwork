<?php
/*Replace = innovazione*/

function NP_custom_innovazione() {
    register_post_type( 'innovazione',
        array(
            'labels'                =>          array(
                'name'              =>          'Innovazione', //nome principale nella sidebar
                'singular_name'     =>          'Corsi di innovazione',
                'all_items'         =>          'Tutte le innovazioni', //nome link per visualizzare tutti i post
                'add_new'           =>          'Aggiungi nuovo corso', //nome link per aggiungere nuovo post
                'add_new_item'      =>          'Aggiungi nuovo  corso', //titolo della pagina di aggiunta di un nuovo post
                'edit_item'         =>          'Modifica corso', //titolo della pagina di aggiunta di un nuovo post
                'new_item'          =>          'Nuovo corso',
                'view_item'         =>          'Visualizza corso',
                'search_items'      =>          'Cerca',
                'not_found'         =>          'Nessun elemento trovato',
                'not_found_in_trash'=>          'Nessun elemento nel cestino',
                'parent_item_colon' =>          '',
            ),
            'description'           =>          'Innovazione',
            'public'                =>          true,
            'publicly_queryable'    =>          true,
            'exclude_from_search'   =>          false,
            'show_ui'               =>          true,
            'query_var'             =>          true,
            'menu_position'         =>          20,
            'menu_icon'             =>          'dashicons-share-alt', //Dashicon
            'rewrite'               =>          array(
                'slug'              =>          'corsi-innovazione',
                'with-front'        =>          false,
            ),
            'has_archive'           =>          false,
            'capability_type'       =>          'post',
            'hierarchycal'          =>          false,
            'show_in_rest'          =>          true, //gutemberg
            'supports'              =>          array('title', 'editor')
        ), flush_rewrite_rules() /*fine delle opzioni*/
    );
}
add_action( 'init', 'NP_custom_innovazione');

?>