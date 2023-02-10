<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
if ( !function_exists( 'chld_thm_cfg_locale_css' ) ):
    function chld_thm_cfg_locale_css( $uri ){
        if ( empty( $uri ) && is_rtl() && file_exists( get_template_directory() . '/rtl.css' ) )
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter( 'locale_stylesheet_uri', 'chld_thm_cfg_locale_css' );
         
if ( !function_exists( 'child_theme_configurator_css' ) ):
    function child_theme_configurator_css() {
        wp_enqueue_style( 'chld_thm_cfg_child', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style','neve-style' ) );
    }
endif;
add_action( 'wp_enqueue_scripts', 'child_theme_configurator_css', 200 );
// END ENQUEUE PARENT ACTION







/*
* On utilise une fonction pour créer notre custom post type
*/
function wpm_custom_post_type() {

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x( 'Chalets', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x( 'Chalet', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __( 'Chalets'),
		// Les différents libellés de l'administration
		'all_items'           => __( 'Toutes les chalets'),
		'view_item'           => __( 'Voir les chalets'),
		'add_new_item'        => __( 'Ajouter un nouveau chalet'),
		'add_new'             => __( 'Ajouter'),
		'edit_item'           => __( 'Editer le chalet'),
		'update_item'         => __( 'Modifier le chalet'),
		'search_items'        => __( 'Rechercher un chalet'),
		'not_found'           => __( 'Non trouvée'),
		'not_found_in_trash'  => __( 'Non trouvée dans la corbeille'),
	);
	
	// On peut définir ici d'autres options pour notre custom post type
	
	$args = array(
		'label'               => __( 'Chalets'),
		'description'         => __( 'Tous sur chalets'),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-admin-home',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array( 'title', 'editor', 'category','thumbnail', 'revisions', 'custom-fields', ),
		/* 
		* Différentes options supplémentaires
		*/	
		'show_in_rest'		  => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array( 'slug' => 'chalets'),

		'taxonomies'          => array( 'category' ),

	);
	
	// On enregistre notre custom post type qu'on nomme ici "serietv" et ses arguments
	register_post_type( 'chalets', $args );

}

add_action( 'init', 'wpm_custom_post_type', 0 );






// Cacher editeur WordPress
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
    // Use your post type key instead of 'product'
    if ($post_type === 'chalets') return false;
    return $current_status;
}
