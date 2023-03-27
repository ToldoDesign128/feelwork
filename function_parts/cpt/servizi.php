<?php
/*Replace = servizi*/

function NP_custom_servizi() {
    register_post_type( 'servizi',
        array(
            'labels'                =>          array(
               'name'              =>          'Servizi',
               'singular_name'     =>          'Servizio',
               'all_items'         =>          'Tutti i servizi',
               'add_new'           =>          'Aggiungi nuovo servizio',
               'add_new_item'      =>          'Aggiungi nuovo  servizio',
               'edit_item'         =>          'Modifica servizio',
               'new_item'          =>          'Nuovo servizio',
               'view_item'         =>          'Visualizza servizio',
               'search_items'      =>          'Cerca',
               'not_found'         =>          'Nessun elemento trovato',
               'not_found_in_trash'=>          'Nessun elemento nel cestino',
               'parent_item_colon' =>          '',
            ),
            'description'           =>          'Servizi',
            'public'                =>          true,
            'publicly_queryable'    =>          true,
            'exclude_from_search'   =>          false,
            'show_ui'               =>          true,
            'query_var'             =>          true,
            'menu_position'         =>          20,
            'menu_icon'             =>          'dashicons-admin-network', //Dashicon
            'rewrite'               =>          array(
               'slug'              =>          'servizi-sicurezza',
               'with-front'        =>          false,
            ),
            'has_archive'           =>          false,
            'capability_type'       =>          'post',
            'show_in_rest'          =>          true, //gutemberg
            'supports'              =>          array('title', 'editor', 'page-attributes')
        ), flush_rewrite_rules()
    );
}
add_action( 'init', 'NP_custom_servizi');

?>