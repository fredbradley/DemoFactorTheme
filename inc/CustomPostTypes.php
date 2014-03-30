<?php 

if ( ! function_exists('demofactor_demos') ) {
	// Register Custom Post Type
	function demofactor_demos() {
	
		$labels = array(
			'name'                => _x( 'Demos', 'Post Type General Name', 'demofactor' ),
			'singular_name'       => _x( 'Demo', 'Post Type Singular Name', 'demofactor' ),
			'menu_name'           => __( 'Demos', 'demofactor' ),
			'parent_item_colon'   => __( 'Parent Product:', 'demofactor' ),
			'all_items'           => __( 'All Demos', 'demofactor' ),
			'view_item'           => __( 'View Demo', 'demofactor' ),
			'add_new_item'        => __( 'Add New Demo', 'demofactor' ),
			'add_new'             => __( 'New Demo', 'demofactor' ),
			'edit_item'           => __( 'Edit Demo', 'demofactor' ),
			'update_item'         => __( 'Update Demo', 'demofactor' ),
			'search_items'        => __( 'Search demos', 'demofactor' ),
			'not_found'           => __( 'No demos found', 'demofactor' ),
			'not_found_in_trash'  => __( 'No demos found in Trash', 'demofactor' ),
		);
		$args = array(
			'label'               => __( 'demo', 'demofactor' ),
			'description'         => __( 'Demos', 'demofactor' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions', ),
			'taxonomies'          => array( 'post_tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => get_template_directory_uri().'/images/icon-fredbradley.png',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type' => 'post',
			/*'capabilities' => array(
				'publish_posts' => 'publish_demos',
				'edit_posts' => 'edit_demos',
				'edit_others_posts' => 'edit_others_demos',
				'delete_posts' => 'delete_demos',
				'delete_others_posts' => 'delete_others_demos',
				'read_private_posts' => 'read_private_demos',
				'edit_post' => 'edit_demo',
				'delete_post' => 'delete_demo',
				'read_post' => 'read_demo',
			),*/
		);
		register_post_type( 'demos', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'demofactor_demos', 0 );
}

if ( ! function_exists('demofactor_judges') ) {
	// Register Custom Post Type
	function demofactor_judges() {
	
		$labels = array(
			'name'                => _x( 'Judges', 'Post Type General Name', 'demofactor' ),
			'singular_name'       => _x( 'Judge', 'Post Type Singular Name', 'demofactor' ),
			'menu_name'           => __( 'Judges', 'demofactor' ),
			'parent_item_colon'   => __( 'Parent Product:', 'demofactor' ),
			'all_items'           => __( 'All Judges', 'demofactor' ),
			'view_item'           => __( 'View Judge', 'demofactor' ),
			'add_new_item'        => __( 'Add New Judge', 'demofactor' ),
			'add_new'             => __( 'New Judge', 'demofactor' ),
			'edit_item'           => __( 'Edit Judge', 'demofactor' ),
			'update_item'         => __( 'Update Judge', 'demofactor' ),
			'search_items'        => __( 'Search Judges', 'demofactor' ),
			'not_found'           => __( 'No judges found', 'demofactor' ),
			'not_found_in_trash'  => __( 'No judges found in Trash', 'demofactor' ),
		);
		$args = array(
			'label'               => __( 'judge', 'demofactor' ),
			'description'         => __( 'Judges of Demofactor', 'demofactor' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'trackbacks', 'revisions',),
			'taxonomies'          => array( 'post_tag' ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'menu_icon'           => get_template_directory_uri().'/images/icon-fredbradley.png',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'post',
		);
		register_post_type( 'judges', $args );
	
	}
	
	// Hook into the 'init' action
	add_action( 'init', 'demofactor_judges', 0 );
}


if ( ! function_exists( 'student_radio_stations' ) ) {

// Register Custom Taxonomy
function student_radio_stations() {

	$labels = array(
		'name'                       => _x( 'Student Stations', 'Taxonomy General Name', 'demofactor' ),
		'singular_name'              => _x( 'Student Station', 'Taxonomy Singular Name', 'demofactor' ),
		'menu_name'                  => __( 'SRA Stations', 'demofactor' ),
		'all_items'                  => __( 'All SRA Stations', 'demofactor' ),
		'parent_item'                => __( 'Parent Item', 'demofactor' ),
		'parent_item_colon'          => __( 'Parent Item:', 'demofactor' ),
		'new_item_name'              => __( 'New SRA Station', 'demofactor' ),
		'add_new_item'               => __( 'Add SRA Station', 'demofactor' ),
		'edit_item'                  => __( 'Edit SRA Station', 'demofactor' ),
		'update_item'                => __( 'Update SRA Station', 'demofactor' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'demofactor' ),
		'search_items'               => __( 'Search SRA Stations', 'demofactor' ),
		'add_or_remove_items'        => __( 'Add or remove SRA Stations', 'demofactor' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'demofactor' ),
		'not_found'                  => __( 'Not Found', 'demofactor' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'stations', array( 'demos', 'post', 'page' ), $args );

}

// Hook into the 'init' action
add_action( 'init', 'student_radio_stations', 0 );

}


?>