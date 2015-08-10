<?php
include 'meta_box_defs.php';

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'artist-page-image', 618, 9999, false ); // unlimited height
	//add_image_size( 'artist-list-thumb', 199, 150, TRUE ); 
	add_image_size( 'artist-thumb', 300, 300, true );
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
		// register main script
		wp_register_script( 'main-script', get_stylesheet_directory_uri() . '/js/main.js', array('jquery'), '', true );
		wp_enqueue_script( 'main-script' );

		wp_register_script( 'front-page-script', get_stylesheet_directory_uri() . '/js/front-page.js', array('jquery'), '', true );
		// register main stylesheet
		wp_register_style( 'main-css', get_stylesheet_directory_uri() . '/css/style.css', array(), '', 'all' );
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



function show_upcoming_events( $atts ) {
    $a = shortcode_atts( array(), $atts );

	$args = array(
		'posts_per_page'   => 5,
		'post_type'        => 'event',
		'meta_key'			=> 'date_from',
		'orderby'			=> 'meta_value_num',
		'order'				=> 'DESC'
	);

	$posts = get_posts( $args );
	$output;

	if( $posts ): 

		$output = "<ul>";

		foreach( $posts as $post ): 	

	    	$output .= "<li><a href='". esc_url( get_permalink( $post->ID ) ) . "'>" . $post->post_title . " - " . get_field('date_from', $post->ID) . "</a></li>";

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
	