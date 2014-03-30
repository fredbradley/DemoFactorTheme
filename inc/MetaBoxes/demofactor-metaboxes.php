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
$prefix = 'demofactor_meta_';

global $meta_boxes;

$meta_boxes = array();

// 1st meta box
$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'demo_meta',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'About Your Demo', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'demos'),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(

		// FILE UPLOAD
		array(
			'name' => __( 'Your Demo', 'rwmb' ),
			'id'   => "{$prefix}the_demo",
			'type' => 'file',
		),
		array(
			'name' => __("Your Full Name", "demofactor"),
			'id' 	=> "{$prefix}full_name",
			'type' 	=> "text",
		),
		
		array(
			'name' => __("Your Email Address", "demofactor"),
			'id' 	=> "{$prefix}email_address",
			'type' 	=> "text",
		),
		array(
			'name' => __("Your Phone Number", "demofactor"),
			'id' 	=> "{$prefix}phone",
			'type' 	=> "text",
		),
		array(
			'name' => __("Twitter", "demofactor"),
			'id'	=> "{$prefix}student_twitter",
			'type'	=> "text",
		),
		// SELECT BOX
		array(
			'name'     => __( 'Your Student Radio Station', 'rwmb' ),
			'id'       => "{$prefix}student_station",
			'type'     => 'text',
		),
		array(
			'name'		=> __('Uni Year', 'demofactor'),
			'id'		=> "{$prefix}uni_year",
			'type'		=> 'text',
		),		
	),
);

$meta_boxes[] = array(
	'id' => 'demo_publish_data',
	'title'=>"Publish Meta",
	'pages'=>array('demos'),
	'context' => 'side',
	'priority' => 'high',
	'autosave'=>true,
	'fields' => array(	
		array(
			'name'	=> "Allow Public",
			'id'	=> "{$prefix}allow_public",
			'type'	=> 'text',
		),
		array(
			'name'	=> "Allow Puslish",
			'id'	=> "{$prefix}allow_publish",
			'type'	=> 'text',
		),
	),
);

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'judge_demo',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'Judge This Demo', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'demos'),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'normal',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(

		
	),
);

$meta_boxes[] = array(
	// Meta box id, UNIQUE per meta box. Optional since 4.1.5
	'id' => 'judge_meta',

	// Meta box title - Will appear at the drag and drop handle bar. Required.
	'title' => __( 'About this Judge', 'rwmb' ),

	// Post types, accept custom post types as well - DEFAULT is array('post'). Optional.
	'pages' => array( 'judges'),

	// Where the meta box appear: normal (default), advanced, side. Optional.
	'context' => 'side',

	// Order of meta box: high (default), low. Optional.
	'priority' => 'high',

	// Auto save: true, false (default). Optional.
	'autosave' => true,

	// List of meta fields
	'fields' => array(
		array(
			'name' => __("Company", "demofactor"),
			'id' 	=> "{$prefix}company",
			'type' 	=> "text",
		),
		array(
			'name' => __("Job Title", "demofactor"),
			'id' 	=> "{$prefix}job_title",
			'type' 	=> "text",
		),
		array(
			'name' => __( 'Current Judge?', 'rwmb' ),
			'id'   => "{$prefix}checkbox",
			'type' => 'checkbox',
			'desc' => 'Tick if this judge is a current judge that is live on the site right now!?',
			// Value can be 0 or 1
			'std'  => 0,
		),
		array(
			'name' => __("Likes", "demofactor"),
			'id' 	=> "{$prefix}likes",
			'type' 	=> "text",
		),
		array(
			'name' => __("Dislikes", "demofactor"),
			'id' 	=> "{$prefix}dislikes",
			'type' 	=> "text",
		),
	),
);


/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 *
 * @return void
 */
function demofactor_meta_register_meta_boxes()
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
add_action( 'admin_init', 'demofactor_meta_register_meta_boxes' );
