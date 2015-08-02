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



/****************************************************************/

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
		'has_archive' => true,
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
		'has_archive' => true,
		'register_meta_box_cb' => 'add_work_metaboxes'
		)
	);	
}
add_post_type_support('artist', 'thumbnail');
add_post_type_support('work', 'thumbnail');
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



	