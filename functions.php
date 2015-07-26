<?php
	function register_my_menu() {
	  register_nav_menu('main-menu',__( 'Main Menu' ));
	}
	add_action( 'init', 'register_my_menu' );
	/**
	 * Enqueue scripts and styles
	 */
	function theme_scripts_and_styles() {
		// wp_register_script( 'jquery', get_stylesheet_directory_uri() . '/bower_components/jquery/dist/jquery.min.js', array(), '', 'true' );
		wp_enqueue_script( 'jquery' );
		wp_register_script( 'responsive-slides', get_stylesheet_directory_uri() . '/bower_components/jquery.responsive-slides/jquery.responsive-slides.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'responsive-slides' );
		wp_register_script( 'velocity', get_stylesheet_directory_uri() . '/js/velocity.min.js', array(), '', true );
		wp_enqueue_script( 'velocity' );
		// register main script
		wp_register_script( 'main-script', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '', true );
		wp_enqueue_script( 'main-script' );
		// register main stylesheet
		wp_register_style( 'main-css', get_stylesheet_directory_uri() . '/css/style.css', array(), '', 'all' );
		wp_enqueue_style( 'main-css' );

		wp_register_style( 'grid-css', get_stylesheet_directory_uri() . '/css/grid.css', array('main-css'), '', 'all' );
		wp_enqueue_style( 'grid-css' );

		wp_register_style( 'responsive-slides-css', get_stylesheet_directory_uri() . '/bower_components/jquery.responsive-slides/jquery.responsive-slides.css', array('main-css'), '', 'all' );
		wp_enqueue_style( 'responsive-slides-css' );

	}

	add_action( 'wp_enqueue_scripts', 'theme_scripts_and_styles', 999 );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function widgets_init() {

	register_sidebar( array(
		'name'          => 'Footer 1',
		'id'            => 'footer_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 2',
		'id'            => 'footer_2',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => 'Footer 3',
		'id'            => 'footer_3',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2>',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'widgets_init' );



// let's create the function for the custom type
function custom_post_event() {
	// creating (registering) the custom type
	register_post_type( 'event', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Event', 'iii' ), /* This is the Title of the Group */
			'singular_name' => __( 'Event', 'iii' ), /* This is the individual type */
			'all_items' => __( 'All Event', 'iii' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'iii' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Event', 'iii' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'iii' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Event', 'iii' ), /* Edit Display Title */
			'new_item' => __( 'New Event', 'iii' ), /* New Display Title */
			'view_item' => __( 'View Event', 'iii' ), /* View Display Title */
			'search_items' => __( 'Search Event', 'iii' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'iii' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'iii' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Event', 'iii' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-calendar', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'event', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'event', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	register_taxonomy_for_object_type( 'category', 'event' );
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'event' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_event');


	