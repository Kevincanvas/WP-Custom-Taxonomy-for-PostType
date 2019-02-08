<?php

add_action('init', 'create_post_type_comunicados'); // Add our HTML5 Blank Custom Post Type
add_action('init', 'comunicados_filter');


function create_post_type_comunicados()
{
    // register_taxonomy_for_object_type('category', 'noticia-oefa'); // Register Taxonomies for Category
    // register_taxonomy_for_object_type('post_tag', 'noticia-oefa');
    register_post_type('comunicados', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Comunicados'), // Rename these to suit
            'singular_name' => __('Comunicados'),
            'add_new' => __('Nuevo'),
            'add_new_item' => __('Nuevo'),
            'edit' => __('Editar'),
            'edit_item' => __('Editar'),
            'new_item' => __('Nuevo'),
            'view' => __('Ver'),
            'view_item' => __('Ver'),
            'search_items' => __('Buscar'),
            'not_found' => __('No se encontraron comunicados'),
            'not_found_in_trash' => __('No se encontraron comunicados en la papelera')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'show_ui' => true,
        'supports' => array(
            'title',
            //'thumbnail',
            //'page-attributes',
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            //'post_tag',
            //'category'
        ) // Add Category and Post Tags support
    ));
}

function comunicados_filter(){

    register_taxonomy("categoria-comunicados",

    array("comunicados"),

    array(
        "hierarchical" => true,
        "label" => __( "Categor&iacute;as" ),
        "singular_label" => __( "categoria-comunicados" ),
        "rewrite" => array(
                'slug' => 'categoria-comunicados',
                'hierarchical' => true
                )
        )
    );
}

?>
