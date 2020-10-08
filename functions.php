<?php
include 'meta_box_defs.php';

// require_once( 'include/Mobile_Detect.php' );


update_option('image_default_link_type','none');


if ( function_exists( 'add_image_size' ) ) {
	add_image_size( 'artist-page-image', 618, 9999, false ); // unlimited height
	//add_image_size( 'artist-list-thumb', 199, 150, TRUE );
	add_image_size( 'artist-thumb', 300, 300, true );
	add_image_size( 'artist-thumb-crop', 300, 200, true );
	add_image_size( 'work-thumb', 410, 280, true );
}

add_filter('widget_text', 'do_shortcode');



	function register_my_menu() {
	  register_nav_menu('main-menu-left',__( 'Main Menu Left' ));
	  register_nav_menu('main-menu-right',__( 'Main Menu Right' ));
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
		wp_register_script( 'isotope', get_stylesheet_directory_uri() . '/bower_components/isotope/dist/isotope.pkgd.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'isotope' );
		wp_register_script( 'imagesloaded', get_stylesheet_directory_uri() . '/bower_components/imagesloaded/imagesloaded.pkgd.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'imagesloaded' );
		wp_register_script( 'bbq', get_stylesheet_directory_uri() . '/bower_components/jquery.bbq/jquery.ba-bbq.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'bbq' );
		wp_register_script( 'readmore', get_stylesheet_directory_uri() . '/js/readmore.min.js', array('jquery'), '', true );
		wp_enqueue_script( 'readmore' );
		// register main script
		wp_register_script( 'main-script', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '', true );
		wp_enqueue_script( 'main-script' );

		wp_register_script( 'front-page-script', get_stylesheet_directory_uri() . '/js/front-page.js', array('jquery'), '', true );
		// register main stylesheet
		wp_register_style( 'main-css', get_stylesheet_directory_uri() . '/css/style.css', array(), '1.1', 'all' );
		wp_enqueue_style( 'main-css' );

		wp_register_style( 'grid-css', get_stylesheet_directory_uri() . '/css/grid.css', array('main-css'), '', 'all' );
		wp_enqueue_style( 'grid-css' );

		wp_register_style( 'responsive-slides-css', get_stylesheet_directory_uri() . '/bower_components/jquery.responsive-slides/jquery.responsive-slides.css', array('main-css'), '', 'all' );
		wp_enqueue_style( 'responsive-slides-css' );

		// comment reply script for threaded comments
		if ( is_front_page()) {
			wp_enqueue_script( 'front-page-script' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'theme_scripts_and_styles', 999 );

function vc_enqueue_main_css_forever() { wp_enqueue_style('js_composer_front'); }
add_action('wp_enqueue_scripts', 'vc_enqueue_main_css_forever');

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
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
			'menu_icon' => 'dashicons-calendar', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'event', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'agenda', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'event' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'event' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_event');

function custom_post_production() {
	// creating (registering) the custom type
	register_post_type( 'production', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Production', 'iii' ), /* This is the Title of the Group */
			'singular_name' => __( 'Production', 'iii' ), /* This is the individual type */
			'all_items' => __( 'All Productions', 'iii' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'iii' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Production', 'iii' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'iii' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Production', 'iii' ), /* Edit Display Title */
			'new_item' => __( 'New Production', 'iii' ), /* New Display Title */
			'view_item' => __( 'View Production', 'iii' ), /* View Display Title */
			'search_items' => __( 'Search Production', 'iii' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'iii' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'iii' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Production', 'iii' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
			// 'menu_icon' => 'dashicons-calendar', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'production', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'productions', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'production' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'production' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_production');

	register_taxonomy( 'production_category',
		array('production'), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
		array('hierarchical' => true,     /* if this is true, it acts like categories */
			'labels' => array(
				'name' => __( 'Production Categories', 'tas' ), /* name of the custom taxonomy */
				'singular_name' => __( 'Production Category', 'tas' ), /* single taxonomy name */
				'search_items' =>  __( 'Search Production Categories', 'tas' ), /* search title for taxomony */
				'all_items' => __( 'All Production Categories', 'tas' ), /* all title for taxonomies */
				'parent_item' => __( 'Parent Production Category', 'tas' ), /* parent title for taxonomy */
				'parent_item_colon' => __( 'Parent Production Category:', 'tas' ), /* parent taxonomy title */
				'edit_item' => __( 'Edit Production Category', 'tas' ), /* edit custom taxonomy title */
				'update_item' => __( 'Update Production Category', 'tas' ), /* update title for taxonomy */
				'add_new_item' => __( 'Add New Production Category', 'tas' ), /* add new title for taxonomy */
				'new_item_name' => __( 'New Production Category Name', 'tas' ) /* name title for taxonomy */
			),
			'show_admin_column' => true,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'production-category' ),
		)
	);

function custom_post_research() {
	// creating (registering) the custom type
	register_post_type( 'research', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Research', 'iii' ), /* This is the Title of the Group */
			'singular_name' => __( 'Research', 'iii' ), /* This is the individual type */
			'all_items' => __( 'All Research', 'iii' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'iii' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Research', 'iii' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'iii' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Research', 'iii' ), /* Edit Display Title */
			'new_item' => __( 'New Research', 'iii' ), /* New Display Title */
			'view_item' => __( 'View Research', 'iii' ), /* View Display Title */
			'search_items' => __( 'Search Research', 'iii' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'iii' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'iii' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Research', 'iii' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
			// 'menu_icon' => 'dashicons-calendar', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'research', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'research', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'production' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'production' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_research');

function custom_post_residency() {
	// creating (registering) the custom type
	register_post_type( 'residency', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Residency', 'iii' ), /* This is the Title of the Group */
			'singular_name' => __( 'Residency', 'iii' ), /* This is the individual type */
			'all_items' => __( 'All Residencies', 'iii' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'iii' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Residency', 'iii' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'iii' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Residency', 'iii' ), /* Edit Display Title */
			'new_item' => __( 'New Residency', 'iii' ), /* New Display Title */
			'view_item' => __( 'View Residency', 'iii' ), /* View Display Title */
			'search_items' => __( 'Search Residency', 'iii' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'iii' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'iii' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Residency', 'iii' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
			// 'menu_icon' => 'dashicons-calendar', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'residency', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'residencies', /* you can rename the slug here */
            /* Custom archive label.  Must filter 'post_type_archive_title' to use. */
            'archive_title' => __( 'Residencies', 'iii' ),
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'production' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'production' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_residency');
/****************************************************************/

function custom_post_workshop() {
	// creating (registering) the custom type
	register_post_type( 'workshop', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 'labels' => array(
			'name' => __( 'Workshop', 'iii' ), /* This is the Title of the Group */
			'singular_name' => __( 'Workshop', 'iii' ), /* This is the individual type */
			'all_items' => __( 'All Workshop', 'iii' ), /* the all items menu item */
			'add_new' => __( 'Add New', 'iii' ), /* The add new menu item */
			'add_new_item' => __( 'Add New Workshop', 'iii' ), /* Add New Display Title */
			'edit' => __( 'Edit', 'iii' ), /* Edit Dialog */
			'edit_item' => __( 'Edit Workshop', 'iii' ), /* Edit Display Title */
			'new_item' => __( 'New Workshop', 'iii' ), /* New Display Title */
			'view_item' => __( 'View Workshop', 'iii' ), /* View Display Title */
			'search_items' => __( 'Search Workshop', 'iii' ), /* Search Custom Type Title */
			'not_found' =>  __( 'Nothing found in the Database.', 'iii' ), /* This displays if there are no entries yet */
			'not_found_in_trash' => __( 'Nothing found in Trash', 'iii' ), /* This displays if there is nothing in the trash */
			'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Workshop', 'iii' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 7, /* this is what order you want it to appear in on the left hand side menu */
			// 'menu_icon' => 'dashicons-calendar', /* the icon for the custom post type menu */
			'rewrite'	=> array( 'slug' => 'workshop', 'with_front' => false ), /* you can specify its url slug */
			'has_archive' => 'workshop', /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky')
		) /* end of options */
	); /* end of register post type */

	/* this adds your post categories to your custom post type */
	// register_taxonomy_for_object_type( 'category', 'production' );
	/* this adds your post tags to your custom post type */
	// register_taxonomy_for_object_type( 'post_tag', 'production' );

}

	// adding the function to the Wordpress init
	add_action( 'init', 'custom_post_workshop');


// custom post types : artist, work, news

function create_post_type() {
	register_post_type( 'artist',
		array(
			'labels' => array(
				'name' => __( 'Artists' ),
				'singular_name' => __( 'Artist' )
			),
		'supports' => array('title', 'editor', 'author'),
		'public' => true,
		'has_archive' => 'artists', /* you can rename the slug here */
		'register_meta_box_cb' => 'add_artist_metaboxes'
		)
	);
	register_post_type( 'work',
		array(
			'labels' => array(
			'name' => __( 'Works' ),
			'singular_name' => __( 'Work' )
			),
		'public' => true,
		'has_archive' => 'works', /* you can rename the slug here */
		'register_meta_box_cb' => 'add_work_metaboxes'
		)
	);
	register_post_type( 'commission',
		array(
			'labels' => array(
			'name' => __( 'Commissions' ),
			'singular_name' => __( 'Commission' )
			),
		'public' => true,
		'has_archive' => 'commissions', /* you can rename the slug here */
		'register_meta_box_cb' => 'add_commission_metaboxes'
		)
	);
}
add_post_type_support('artist', 'thumbnail');
add_post_type_support('work', 'thumbnail');
add_post_type_support('commission', 'thumbnail');
add_action( 'init', 'create_post_type' );

/****************************************************************/

// Add the Artist Meta Boxes

function add_artist_metaboxes() {
    add_meta_box('artist_url', 'Website (without http://)', 'artist_url', 'artist', 'side', 'default');
    add_meta_box('artist_email', 'Email', 'artist_email', 'artist', 'side', 'default');
}


// The Artist Metaboxes

function artist_url() {
	global $post;

	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="artistmeta_noncename" id="artistmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	// Get the location data if its already been entered
	$url = get_post_meta($post->ID, '_url', true);

	// Echo out the field
	echo '<input type="text" name="_url" value="' . $url  . '" class="widefat" />';

}

function artist_email() {
	global $post;

	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="artistmeta_noncename" id="artistmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	// Get the location data if its already been entered
	$url = get_post_meta($post->ID, '_email', true);

	// Echo out the field
	echo '<input type="text" name="_email" value="' . $url  . '" class="widefat" />';

}



// Save the Metabox Data

function save_artist_meta($post_id, $post) {

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['artistmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.

	$artist_meta['_url'] = $_POST['_url'];
	$artist_meta['_email'] = $_POST['_email'];

	// Add values of $artist_meta as custom fields

	foreach ($artist_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}
add_action('save_post', 'save_artist_meta', 1, 2); // save the custom fields


// add featured image to artist custom post type

 if (class_exists('MultiPostThumbnails')) {
		new MultiPostThumbnails(
			array(
				'label' => 'Homepage image big (410x280)',
				'id' => 'home-big',
				'post_type' => 'artist'
			)
		);
}
 if (class_exists('MultiPostThumbnails')) {
		new MultiPostThumbnails(

			array(
				'label' => 'Homepage image small (190x125)',
				'id' => 'home-small',
				'post_type' => 'artist'
			)
		);
}

// add featured image to homepage custom post type

 if (class_exists('MultiPostThumbnails')) {
		new MultiPostThumbnails(
			array(
				'label' => 'Homepage image big (410x280)',
				'id' => 'home-big',
				'post_type' => 'homepage'
			)
		);
}
 if (class_exists('MultiPostThumbnails')) {
		new MultiPostThumbnails(

			array(
				'label' => 'Homepage image small (190x125)',
				'id' => 'home-small',
				'post_type' => 'homepage'
			)
		);
}

/****************************************************************/

// custom post type : work page
/*
function create_post_type() {
	register_post_type( 'work',
		array(
			'labels' => array(
			'name' => __( 'Works' ),
			'singular_name' => __( 'Work' )
			),
		'public' => true,
		'has_archive' => true,
		//'register_meta_box_cb' => 'add_work_metaboxes',
		)
	);
}
add_post_type_support('work', 'thumbnail');
add_action( 'init', 'create_post_type' );
*/

// Add the Work Meta Boxes

function add_work_metaboxes() {
	if (is_admin()) { }
    add_meta_box('work_date', 'Year', 'work_date', 'work', 'side', 'default');
    //add_meta_box('artist_email', 'Email', 'artist_email', 'artist', 'side', 'default');
}

// The Work Metaboxes

function work_date() {
	global $post;

	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="workmeta_noncename" id="workmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	// Get the location data if its already been entered
	$date = get_post_meta($post->ID, '_date', true);

	// Echo out the field
	echo '<input type="text" name="_date" value="' . $date  . '" class="widefat" />';

}

// Save the Metabox Data

function save_work_meta($post_id, $post) {

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['workmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.

	$work_meta['_date'] = $_POST['_date'];
//	$artist_meta['_email'] = $_POST['_email'];

	// Add values of $artist_meta as custom fields

	foreach ($work_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}
add_action('save_post', 'save_work_meta', 1, 2); // save the custom fields


// Add the Commission Meta Boxes

function add_commission_metaboxes() {
	if (is_admin()) { }
    add_meta_box('commission_date', 'Year', 'commission_date', 'commission', 'side', 'default');
    //add_meta_box('artist_email', 'Email', 'artist_email', 'artist', 'side', 'default');
}

// The Commission Metaboxes

function commission_date() {
	global $post;

	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="commissionmeta_noncename" id="commissionmeta_noncename" value="' .
	wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	// Get the location data if its already been entered
	$date = get_post_meta($post->ID, '_date', true);

	// Echo out the field
	echo '<input type="text" name="_date" value="' . $date  . '" class="widefat" />';

}

// Save the Metabox Data

function save_commission_meta($post_id, $post) {

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['commissionmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.

	$commission_meta['_date'] = $_POST['_date'];
//	$artist_meta['_email'] = $_POST['_email'];

	// Add values of $artist_meta as custom fields

	foreach ($commission_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}
add_action('save_post', 'save_commission_meta', 1, 2); // save the custom fields



function show_upcoming_events( $atts ) {
    $a = shortcode_atts( array(), $atts );

	$args = array(
		'posts_per_page'   => 5,
		'post_type'        => 'event',
		'meta_key'			=> 'date_from',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'ASC',
		'meta_query' => array(
		    'relation' => 'OR',
	        array(
	            'key' => 'date_from',
	            'value' => date("Ymd", strtotime("now")),
	            'type' => 'NUMERIC',
	            'compare' => '>='
	        ),
	        array(
	            'key' => 'date_until',
	            'value' => date("Ymd", strtotime("now")),
	            'type' => 'NUMERIC',
	            'compare' => '>='
	        )
		)
	);

	$posts = get_posts( $args );
	$output;

	if( $posts ):

		$output = "<ul>";

		foreach( $posts as $post ):

	    	$output .= "<li><a href='". esc_url( get_permalink( $post->ID ) ) . "'>" . $post->post_title . "</a>";

	    	$date = "";
            if(get_field('date_from', $post->ID)){
                    $unixtimestamp = strtotime(get_field('date_from', $post->ID));
                    $date_from = date_i18n("d M, Y", $unixtimestamp);
                    $date = $date_from;
                if(get_field('date_until', $post->ID)){
                    $unixtimestamp = strtotime(get_field('date_until', $post->ID));
                    $date_until = date_i18n("d M, Y", $unixtimestamp);
                    $date .= " - ". $date_until;
                }
            }
            if(get_field('location', $post->ID)){

            }

            $location = "";
			// check if the repeater field has rows of data

			if( have_rows('location', $post->ID) ):

			 	// loop through the rows of data
			    while ( have_rows('location', $post->ID) ) : the_row();

			        // display a sub field value
			        $location .= "<br>" . get_sub_field('location');

			    endwhile;

			else :

			    // no rows found

			endif;

	    	$output .= "<span class='post-date'>" .  $date . $location . "</span></li>";
	    	// $output .= "<span class='post-location'>" . $location . "</span></li>";

	    // return, don't echo
		endforeach;

		$output .= "</ul>";

	endif;

	return $output;


}
add_shortcode( 'show_upcoming_events', 'show_upcoming_events' );

function show_press( $atts ) {
    $a = shortcode_atts( array(), $atts );

	$args = array(
		'posts_per_page'   => -1,
		'post_type'        => 'post',
		'category_name'		=> 'Press',
		'meta_key'			=> 'date_from',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'DESC'
	);

	$posts = get_posts( $args );
	$output;

	if( $posts ):

		$output = "<ul>";

		foreach( $posts as $post ):

	    	$output .= "<li><a href='". esc_url( get_permalink( $post->ID ) ) . "'>" . $post->post_title . " - " . $post->post_date . "</a></li>";

	    // return, don't echo
		endforeach;

		$output .= "</ul>";

	endif;

	return $output;


}
add_shortcode( 'show_press', 'show_press' );

function show_featured_event( $atts ) {
    $a = shortcode_atts( array(), $atts );
    $preview = false;
if(is_user_logged_in()):
	$args = array(
		'posts_per_page'   => -1,
		'post_type'        => 'event',
		'meta_key'			=> 'date_from',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'ASC',
		'post_status'		=> 'any',
		'meta_query' => array(
			array(
                'key' => 'enable_preview',
                'value' => true,
                'compare' => 'LIKE'
            )
		)
	);

	if(!get_posts( $args )){
		$args = array(
			'posts_per_page'   => 1,
			'post_type'        => 'event',
			'meta_key'			=> 'date_from',
			'orderby'			=> 'meta_value_num',
			'order'				=> 'ASC',
			'meta_query' => array(
				'relation' => 'AND',
	            array(
				    'relation' => 'OR',
			        array(
			            'key' => 'date_from',
			            'value' => date("Ymd", strtotime("now")),
			            'type' => 'NUMERIC',
			            'compare' => '>='
			        ),
			        array(
			            'key' => 'date_until',
			            'value' => date("Ymd", strtotime("now")),
			            'type' => 'NUMERIC',
			            'compare' => '>='
			        )
		        ),
				array(
	                'key' => 'featured_on_homepage',
	                'value' => true,
	                'compare' => 'LIKE'
	            )
			)
		);
	}else{
		$preview = true;
	};

else:

	$args = array(
		'posts_per_page'   => 1,
		'post_type'        => 'event',
		'meta_key'			=> 'date_from',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'ASC',
		'meta_query' => array(
			'relation' => 'AND',
            array(
			    'relation' => 'OR',
		        array(
		            'key' => 'date_from',
		            'value' => date("Ymd", strtotime("now")),
		            'type' => 'NUMERIC',
		            'compare' => '>='
		        ),
		        array(
		            'key' => 'date_until',
		            'value' => date("Ymd", strtotime("now")),
		            'type' => 'NUMERIC',
		            'compare' => '>='
		        )
	        ),
			array(
                'key' => 'featured_on_homepage',
                'value' => true,
                'compare' => 'LIKE'
            )
		)
	);

endif;
	$posts = get_posts( $args );

	$output;

	if( $posts ):

		// $output = "<ul>";

		foreach( $posts as $post ):


	    	if(get_field( "alt_title", $post->ID )){
	    		$output .= "<h2 class='vc_custom_heading'><a href='". esc_url( get_permalink( $post->ID ) ) . "'>" . get_field( "alt_title", $post->ID ) . "</a></h2>";
	    	}else{
	    		$output .= "<h2 class='vc_custom_heading'><a href='". esc_url( get_permalink( $post->ID ) ) . "'>" . $post->post_title . "</a></h2>";
	    	}

            $locations = get_field('location', $post->ID);
            if($locations) {
                foreach($locations as $location){
                    $loc .= $location[location].' '; //''
                }
            }

			if(get_field('date_from', $post->ID)){
                    $unixtimestamp = strtotime(get_field('date_from', $post->ID));
                    $date_from = date_i18n("d M, Y", $unixtimestamp);
                    $date .= $date_from;
                if(get_field('date_until', $post->ID)){
                    $unixtimestamp = strtotime(get_field('date_until', $post->ID));
                    $date_until = date_i18n("d M, Y", $unixtimestamp);
                    $date .= " - ". $date_until;
                }
            }

	    	$output .= "<h3>" . $date . " at " . $loc . "</h3>";
	    	$output .= "<p>" . $post->post_excerpt . "</p>";
	    	if(get_field( "alt_image", $post->ID )){
	    		$thumb = get_field( "alt_image", $post->ID );
		    	$output .= "<div class='wpb_single_image'><img src='" . $thumb["sizes"]["large"] . "' /></div>";
	    	}else{
	    	$output .= "<div class='wpb_single_image'>" . get_the_post_thumbnail( $post->ID, "large" ) . "</div>";
	    	}
	    	if($preview) $output .= "<span class='preview_indicator'>This is a preview</span>";

	    // return, don't echo
		endforeach;

		// $output .= "</ul>";
	else:

		$args = array(
			'posts_per_page'   => 1,
			'post_type'        => 'event',
			'meta_key'			=> 'date_from',
			'orderby'			=> 'meta_value_num',
			'order'				=> 'DESC',
			'meta_query' => array(
	                'key' => 'featured_on_homepage',
	                'value' => true,
	                'compare' => 'LIKE'
			)
		);

		$posts = get_posts( $args );

		$output;

		foreach( $posts as $post ):


	    	if(get_field( "alt_title", $post->ID )){
	    		$output .= "<h2 class='vc_custom_heading'><a href='". esc_url( get_permalink( $post->ID ) ) . "'>" . get_field( "alt_title", $post->ID ) . "</a></h2>";
	    	}else{
	    		$output .= "<h2 class='vc_custom_heading'><a href='". esc_url( get_permalink( $post->ID ) ) . "'>" . $post->post_title . "</a></h2>";
	    	}

            $locations = get_field('location', $post->ID);
            if($locations) {
                foreach($locations as $location){
                    $loc .= $location[location].' '; //''
                }
            }

			if(get_field('date_from', $post->ID)){
                    $unixtimestamp = strtotime(get_field('date_from', $post->ID));
                    $date_from = date_i18n("d M, Y", $unixtimestamp);
                    $date .= $date_from;
                if(get_field('date_until', $post->ID)){
                    $unixtimestamp = strtotime(get_field('date_until', $post->ID));
                    $date_until = date_i18n("d M, Y", $unixtimestamp);
                    $date .= " - ". $date_until;
                }
            }

	    	$output .= "<h3>" . $date . " at " . $loc . "</h3>";
	    	$output .= "<p>" . $post->post_excerpt . "</p>";
	    	if(get_field( "alt_image", $post->ID )){
	    		$thumb = get_field( "alt_image", $post->ID );
		    	$output .= "<div class='wpb_single_image'><img src='" . $thumb["sizes"]["large"] . "' /></div>";
	    	}else{
	    	$output .= "<div class='wpb_single_image'>" . get_the_post_thumbnail( $post->ID, "large" ) . "</div>";
	    	}
	    	if($preview) $output .= "<span class='preview_indicator'>This is a preview</span>";

	    // return, don't echo
		endforeach;

		// $output .= "</ul>";
	endif;

	return $output;


}
add_shortcode( 'show_featured_event', 'show_featured_event' );

function show_upcoming_host( $atts ) {
    $a = shortcode_atts( array(), $atts );

	$args = array(
		'posts_per_page'   => 1,
		'post_type'        => 'event',
		'meta_key'			=> 'date_from',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'ASC',
		'meta_query' => array(
			'relation' => 'AND',
            array(
			    'relation' => 'OR',
		        array(
		            'key' => 'date_from',
		            'value' => date("Ymd", strtotime("now")),
		            'type' => 'NUMERIC',
		            'compare' => '>='
		        ),
		        array(
		            'key' => 'date_until',
		            'value' => date("Ymd", strtotime("now")),
		            'type' => 'NUMERIC',
		            'compare' => '>='
		        )
	        ),
            array(
                'key' => 'host_|_circulation',
                'value' => 'host',
                'compare' => 'LIKE'
            )
		)
	);

	$posts = get_posts( $args );
	$output;

	if( $posts ):

		// $output = "<ul>";

		foreach( $posts as $post ):


	    	if(get_field( "alt_title", $post->ID )){
	    		$output .= "<h2 class='vc_custom_heading'><a href='". esc_url( get_permalink( $post->ID ) ) . "'>" . get_field( "alt_title", $post->ID ) . "</a></h2>";
	    	}else{
	    		$output .= "<h2 class='vc_custom_heading'><a href='". esc_url( get_permalink( $post->ID ) ) . "'>" . $post->post_title . "</a></h2>";
	    	}

            $locations = get_field('location', $post->ID);
            if($locations) {
                foreach($locations as $location){
                    $loc .= $location[location].' '; //''
                }
            }

			if(get_field('date_from', $post->ID)){
                    $unixtimestamp = strtotime(get_field('date_from'));
                    $date_from = date_i18n("d M, Y", $unixtimestamp);
                    $date .= $date_from;
                if(get_field('date_until')){
                    $unixtimestamp = strtotime(get_field('date_until'));
                    $date_until = date_i18n("d M, Y", $unixtimestamp);
                    $date .= " - ". $date_until;
                }
            }

	    	$output .= "<h3>" . $date . " at " . $loc . "</h3>";
	    	$output .= "<p>" . $post->post_excerpt . "</p>";
	    	if(get_field( "alt_image", $post->ID )){
	    		$thumb = get_field( "alt_image", $post->ID );
		    	$output .= "<div class='wpb_single_image'><img src='" . $thumb["sizes"]["large"] . "' /></div>";
	    	}else{
	    	$output .= "<div class='wpb_single_image'>" . get_the_post_thumbnail( $post->ID, "large" ) . "</div>";
	    	}

	    // return, don't echo
		endforeach;

		// $output .= "</ul>";

	endif;

	return $output;


}
add_shortcode( 'show_upcoming_host', 'show_upcoming_host' );

function show_upcoming_residency( $atts ) {
    $a = shortcode_atts( array(), $atts );

            $args = array(
                'post_type' => 'residency',
                'post_state' => 'publish',
                'meta_key' => 'date_from',
                'orderby' => 'rand',
                // 'order' => 'ASC',
                'posts_per_page' => 4,
                'meta_query' => array(
                    'relation' => 'OR',
                    array(
	                    'relation' => 'AND',
	                    array(
	                        'key' => 'date_from',
	                        'value' => date('Ymd', strtotime("now")),
	                        'type' => 'NUMERIC',
	                        'compare' => '<='
	                    ),
	                    array(
	                        'key' => 'date_until',
	                        'value' => date('Ymd', strtotime("now")),
	                        'type' => 'NUMERIC',
	                        'compare' => '>='
	                    )
                    ),
                    array(
                        'key' => 'date_from',
                        'value' => date('Ymd', strtotime("now")),
                        'type' => 'NUMERIC',
                        'compare' => '>'
                    )
                )
            );


	$posts = get_posts( $args );
	// var_dump($posts);
	// echo count($posts);
	if( count($posts) < 4 ){
		$ids = array();
		foreach ( $posts as $post ) {
		   $ids[] += $post->ID;
		}
		$args = array(
		    'post_type' => 'residency',
		    'post_state' => 'publish',
		    'orderby' => 'rand',
		    'posts_per_page' => (4 - count($posts)),
		    'post__not_in' => $ids,
            'meta_key' => 'date_from',
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key' => 'date_from',
                    'value' => date('Y', strtotime("now"))."0101",
                    'type' => 'NUMERIC',
                    'compare' => '>='
                ),
                array(
                    'key' => 'date_until',
                    'value' => date('Ymd', strtotime("now"))."1231",
                    'type' => 'NUMERIC',
                    'compare' => '<'
                )
            )
		);
		$posts2 = get_posts( $args );
		$posts = array_merge($posts, $posts2);

	}
	$output;
	if( $posts ):



		$output = "<h2 class='vc_custom_heading'><a href='/residencies/''>Residency Program</a></h2>";
		$i = 0;
		$output .= '<div class="vc_row wpb_row vc_inner vc_row-fluid">';
		foreach( $posts as $post ):
			if($i!=0&&$i%2==0){
				$output .= '</div><div class="vc_row wpb_row vc_inner vc_row-fluid">';
			}
			$output .= '<div class="wpb_column vc_column_container vc_col-sm-6"><div class="wpb_wrapper">';
	    	if(get_field( "alt_title", $post->ID )){
				$output .= '<h4 class="vc_custom_heading"><a href="' . esc_url( get_permalink( $post->ID ) ) . '">' . get_field( "alt_title", $post->ID ) . '</a></h4>';
	    	}else{
				$output .= '<h4 class="vc_custom_heading"><a href="' . esc_url( get_permalink( $post->ID ) ) . '">' . $post->post_title . '</a></h4>';
	    	}
	    	if(get_field( "alt_image", $post->ID )){
	    		$thumb = get_field( "alt_image", $post->ID );
				$output .= '<div class="wpb_single_image wpb_content_element vc_align_left"><div class="wpb_wrapper"><div class="vc_single_image-wrapper   vc_box_border_grey"><a href="' . esc_url( get_permalink( $post->ID ) ) . '"><img src="' . $thumb["sizes"]["artist-thumb-crop"] . '" /></a></div></div></div>';
	    	}else{
				$output .= '<div class="wpb_single_image wpb_content_element vc_align_left"><div class="wpb_wrapper"><div class="vc_single_image-wrapper   vc_box_border_grey"><a href="' . esc_url( get_permalink( $post->ID ) ) . '">' . get_the_post_thumbnail( $post->ID, array(300,200) ) . '</a></div></div></div>';
	    	}
			$output .= '</div></div>';
			$i++;
	    // return, don't echo
		endforeach;
		$output .= '</div>';

	endif;

	return $output;


}
add_shortcode( 'show_upcoming_residency', 'show_upcoming_residency' );

/**
 * Recent_Posts widget class
 *
 * @since 2.8.0
 */
class iii_Widget_Recent_Posts extends WP_Widget {

	public function __construct() {
		$widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "Your site&#8217;s most recent Posts.") );
		parent::__construct('iii-recent-posts', __('iii Recent Posts'), $widget_ops);
		$this->alt_option_name = 'widget_recent_entries';

		add_action( 'save_post', array($this, 'flush_widget_cache') );
		add_action( 'deleted_post', array($this, 'flush_widget_cache') );
		add_action( 'switch_theme', array($this, 'flush_widget_cache') );
	}

	public function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'iii_widget_recent_posts', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Posts' );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number )
			$number = 5;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		/**
		 * Filter the arguments for the Recent Posts widget.
		 *
		 * @since 3.4.0
		 *
		 * @see WP_Query::get_posts()
		 *
		 * @param array $args An array of arguments used to retrieve the recent posts.
		 */
		$r = new WP_Query( apply_filters( 'widget_posts_args', array(
			'posts_per_page'      => $number,
			'no_found_rows'       => true,
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true
		) ) );

		if ($r->have_posts()) :
?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<ul>
		<?php while ( $r->have_posts() ) : $r->the_post(); ?>
			<li>
			<?php if ( $show_date ) : ?>
				<span class="post-date"><?php echo get_the_date(); ?></span>
			<?php endif; ?>
				<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $args['after_widget']; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'widget_recent_posts', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = (int) $new_instance['number'];
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$this->flush_widget_cache();

		$alloptions = wp_cache_get( 'alloptions', 'options' );
		if ( isset($alloptions['widget_recent_entries']) )
			delete_option('widget_recent_entries');

		return $instance;
	}

	public function flush_widget_cache() {
		wp_cache_delete('widget_recent_posts', 'widget');
	}

	public function form( $instance ) {
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
		$number    = isset( $instance['number'] ) ? absint( $instance['number'] ) : 5;
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
?>
		<p><label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></p>

		<p><label for="<?php echo $this->get_field_id( 'number' ); ?>"><?php _e( 'Number of posts to show:' ); ?></label>
		<input id="<?php echo $this->get_field_id( 'number' ); ?>" name="<?php echo $this->get_field_name( 'number' ); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>

		<p><input class="checkbox" type="checkbox" <?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
		<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label></p>
<?php
	}
}

add_action( 'widgets_init', create_function( '', 'register_widget( "iii_Widget_Recent_Posts" );' ) );

//Gets post cat slug and looks for single-[cat slug].php and applies it
add_filter('single_template', create_function(
	'$the_template',
	'foreach( (array) get_the_category() as $cat ) {
		if ( file_exists(TEMPLATEPATH . "/single-{$cat->slug}.php") )
		return TEMPLATEPATH . "/single-{$cat->slug}.php"; }
	return $the_template;' )
);

// define the wp_calculate_image_sizes callback 
function filter_wp_calculate_image_sizes( $sizes, $size, $image_src ) { 
    // make filter magic happen here... 
    $width = 0;
 
    if ( is_array( $size ) ) {
        $width = absint( $size[0] );
    } elseif ( is_string( $size ) ) {
        if ( ! $image_meta && $attachment_id ) {
            $image_meta = wp_get_attachment_metadata( $attachment_id );
        }
 
        if ( is_array( $image_meta ) ) {
            $size_array = _wp_get_image_size_from_meta( $size, $image_meta );
            if ( $size_array ) {
                $width = absint( $size_array[0] );
            }
        }
    }
 
    if ( ! $width ) {
        return false;
    }
 
    // Setup the default 'sizes' attribute.
    $sizes = sprintf( '(max-width: %1$dpx) 100vw', $width );
    return $sizes; 
}; 
         
// add the filter 
add_filter( 'wp_calculate_image_sizes', 'filter_wp_calculate_image_sizes', 10, 3 ); 

// function new_excerpt_more($more) {
//     return '';
// }
// add_filter('excerpt_more', 'new_excerpt_more', 21 );

// function the_excerpt_more_link( $excerpt ){
//     $post = get_post();
//     $excerpt .= '<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . "[&hellip;]" . '</a>';
//     return $excerpt;
// }
// add_filter( 'the_excerpt', 'the_excerpt_more_link', 21 );
