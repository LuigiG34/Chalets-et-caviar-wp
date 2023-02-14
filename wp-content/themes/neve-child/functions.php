<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;
// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:
if (!function_exists('chld_thm_cfg_locale_css')) :
	function chld_thm_cfg_locale_css($uri)
	{
		if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
			$uri = get_template_directory_uri() . '/rtl.css';
		return $uri;
	}
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('child_theme_configurator_css')) :
	function child_theme_configurator_css()
	{
		wp_enqueue_style('chld_thm_cfg_child', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', array('neve-style', 'neve-style'));
	}
endif;
add_action('wp_enqueue_scripts', 'child_theme_configurator_css', 200);
// END ENQUEUE PARENT ACTION







/*
* On utilise une fonction pour créer notre custom post type
*/
function wpm_custom_post_type()
{

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x('Chalets en location', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x('Chalet en location', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __('Chalets en location'),
		// Les différents libellés de l'administration
		'all_items'           => __('Tout les chalets en location'),
		'view_item'           => __('Voir les chalets en location'),
		'add_new_item'        => __('Ajouter un nouveau chalet en location'),
		'add_new'             => __('Ajouter'),
		'edit_item'           => __('Editer le chalet en location'),
		'update_item'         => __('Modifier le chalet en location'),
		'search_items'        => __('Rechercher un chalet en location'),
		'not_found'           => __('Non trouvée'),
		'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
	);

	// On peut définir ici d'autres options pour notre custom post type

	$args = array(
		'label'               => __('Chalets en location'),
		'description'         => __('Tous sur les chalets en location'),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-admin-home',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields',),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest'		  => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array('slug' => 'chalets-location'),

	);

	// On enregistre notre custom post type qu'on nomme ici "chalets-location" et ses arguments
	register_post_type('chalets-location', $args);
}

add_action('init', 'wpm_custom_post_type', 0);







/*
* On utilise une fonction pour créer notre custom post type
*/
function wpm_custom_post_type_2()
{

	// On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
	$labels = array(
		// Le nom au pluriel
		'name'                => _x('Chalets en vente', 'Post Type General Name'),
		// Le nom au singulier
		'singular_name'       => _x('Chalet en vente', 'Post Type Singular Name'),
		// Le libellé affiché dans le menu
		'menu_name'           => __('Chalets en vente'),
		// Les différents libellés de l'administration
		'all_items'           => __('Tout les chalets en vente'),
		'view_item'           => __('Voir les chalets en vente'),
		'add_new_item'        => __('Ajouter un nouveau chalet en vente'),
		'add_new'             => __('Ajouter'),
		'edit_item'           => __('Editer le chalet en vente'),
		'update_item'         => __('Modifier le chalet en vente'),
		'search_items'        => __('Rechercher un chalet en vente'),
		'not_found'           => __('Non trouvée'),
		'not_found_in_trash'  => __('Non trouvée dans la corbeille'),
	);

	// On peut définir ici d'autres options pour notre custom post type

	$args = array(
		'label'               => __('Chalets en vente'),
		'description'         => __('Tous sur les chalets en vente'),
		'labels'              => $labels,
		'menu_icon'           => 'dashicons-admin-home',
		// On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
		'supports'            => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields',),
		/* 
		* Différentes options supplémentaires
		*/
		'show_in_rest'		  => true,
		'hierarchical'        => false,
		'public'              => true,
		'has_archive'         => true,
		'rewrite'			  => array('slug' => 'chalets-vente'),
	);

	// On enregistre notre custom post type qu'on nomme ici "chalets-vente" et ses arguments
	register_post_type('chalets-vente', $args);
}

add_action('init', 'wpm_custom_post_type_2', 0);




// Cacher editeur WordPress
add_filter('use_block_editor_for_post_type', 'prefix_disable_gutenberg', 10, 2);
function prefix_disable_gutenberg($current_status, $post_type)
{
	// Use your post type key instead of 'product'
	if ($post_type === 'chalets-location' || $post_type === 'chalets-vente') return false;
	return $current_status;
}

// Captcha que sur page contact
function block_recaptcha_badge()
{
	if (!is_page(array('contact'))) {
		wp_dequeue_script('google-recaptcha');
		wp_deregister_script('google-recaptcha');
		add_filter('wpcf7_load_js', '__return_false');
		add_filter('wpcf7_load_css', '__return_false');
	}
}
add_action('wp_print_scripts', 'block_recaptcha_badge');

// thumbnails
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
}


/**
 * Require a featured image to be set before a post can be published.
 */

add_filter('wp_insert_post_data', function ($data, $postarr) {

	$post_id              = $postarr['ID'];
	$post_status          = $data['post_status'];
	$original_post_status = $postarr['original_post_status'];

	if ($post_id && 'publish' === $post_status && 'publish' !== $original_post_status) {
		$post_type = get_post_type($post_id);
		if (post_type_supports($post_type, 'thumbnail') && !has_post_thumbnail($post_id)) {
			$data['post_status'] = 'draft';
		}
	}

	return $data;
}, 10, 2);
