<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://www.deluxeblogtips.com/meta-box/
 */

/********************* META BOX DEFINITIONS ***********************/

/**
 * Prefix of meta keys (optional)
 * Use underscore (_) at the beginning to make keys hidden
 * Alt.: You also can make prefix empty to disable it
 */
// Better has an underscore as last sign
$prefix = 'YOUR_PREFIX_';

global $meta_boxes;

$meta_boxes = array();

//////////////// work: non-iii artists meta box /////////////

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'work_artists',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Artists (non-iii)', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'work' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'side',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'low',


	// List of meta fields
	'fields' => array(
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Names', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "work_artists",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true,
		)
		
	),
	'validation' => array(
		'rules' => array(
			"{$prefix}password" => array(
				'required'  => true,
				'minlength' => 7,
			),
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			"{$prefix}password" => array(
				'required'  => __( 'Password is required', 'rwmb' ),
				'minlength' => __( 'Password must be at least 7 characters', 'rwmb' ),
			),
		)
	)
);


////////////// news: event meta box ////////////////

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'event',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Event info', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'event' ),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'side',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'low',


	// List of meta fields
	'fields' => array(
		
			// CHECKBOX
		array(
			'name' => __( 'Is it an event?', 'rwmb' ),
			'id'   => "event",
			'type' => 'checkbox',
			// Value can be 0 or 1
			'std'  => 0,
			'desc' => '(Set the start date in de \'publish\' box above. Events show up in the agenda as well.)'
		),
			// CHECKBOX
// 		array(
// 			'name' => __( 'Is it an iii event?', 'rwmb' ),
// 			'id'   => "event_iii",
// 			'type' => 'checkbox',
// 			// Value can be 0 or 1
// 			'std'  => 0,
// 			'desc' => '(leave unchecked for personal events)'			
// 		),
			// DATE
		/*array(
			'name' => __( 'Start date', 'rwmb' ),
			'id'   => 'event_start_date',
			'type' => 'date',

			// jQuery datetime picker options.
			// For date options, see here http://api.jqueryui.com/datepicker
			// For time options, see here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'appendText'      => __( 'dd.mm.yyyy', 'rwmb' ),
				'dateFormat'      => __( 'dd.mm.yyyy', 'rwmb' ),
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			
			),
		),*/
			// DATE
		array(
			'name' => __( 'End date', 'rwmb' ),
			'id'   => 'event_end_date',
			'type' => 'date',

			// jQuery datetime picker options.
			// For date options, see here http://api.jqueryui.com/datepicker
			// For time options, see here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'appendText'      => __( 'dd.mm.yyyy (leave blank if only 1 day)', 'rwmb' ),
				'dateFormat'      => __( 'dd.mm.yy', 'rwmb' ),
				'changeMonth'     => true,
				'changeYear'      => true,
				'showButtonPanel' => true,
			
			),
		),
	/*	// TIME
		array(
			'name' => __( 'Start time', 'rwmb' ),
			'id'   => 'event_start_time',
			'type' => 'time',

			// jQuery datetime picker options.
			// For date options, see here http://api.jqueryui.com/datepicker
			// For time options, see here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'stepMinute' => 5,
				'showSecond' => false,
				'stepSecond' => 10,
				'timeFormat' => __( 'hh:mm', 'rwmb' ),
			),
		),
			// TIME
		array(
			'name' => __( 'End time', 'rwmb' ),
			'id'   => 'event_end_time',
			'type' => 'time',

			// jQuery datetime picker options.
			// For date options, see here http://api.jqueryui.com/datepicker
			// For time options, see here http://trentrichardson.com/examples/timepicker/
			'js_options' => array(
				'stepMinute' => 5,
				'showSecond' => false,
				'stepSecond' => 10,
				'timeFormat' => __( 'hh:mm', 'rwmb' ),
			),
		), */
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Location', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "event_location",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true,
			'desc' => '(click + for multiple lines)'			
			),
		
	
		// TEXT
		array(
			// Field name - Will be used as label
			'name'  => __( 'Extra info (times, price, etc)', 'rwmb' ),
			// Field ID, i.e. the meta key
			'id'    => "event_info",
			// Field description (optional)
			'desc'  => __( '', 'rwmb' ),
			'type'  => 'text',
			// Default value (optional)
			'std'   => __( '', 'rwmb' ),
			// CLONES: Add to make the field cloneable (i.e. have multiple value)
			'clone' => true,
			'desc' => '(click + for multiple lines)'
			)
		),
	
	'validation' => array(
		'rules' => array(
			"{$prefix}password" => array(
				'required'  => true,
				'minlength' => 7,
			),
		),
		// optional override of default jquery.validate messages
		'messages' => array(
			"{$prefix}password" => array(
				'required'  => __( 'Password is required', 'rwmb' ),
				'minlength' => __( 'Password must be at least 7 characters', 'rwmb' ),
			),
		)
	)
);



/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function YOUR_PREFIX_register_meta_boxes()
{
	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( !class_exists( 'RW_Meta_Box' ) )
		return;

	global $meta_boxes;
	foreach ( $meta_boxes as $meta_box )
	{
		new RW_Meta_Box( $meta_box );
	}
}
// Hook to 'admin_init' to make sure the meta box class is loaded before
// (in case using the meta box class in another plugin)
// This is also helpful for some conditionals like checking page template, categories, etc.
add_action( 'admin_init', 'YOUR_PREFIX_register_meta_boxes' );
