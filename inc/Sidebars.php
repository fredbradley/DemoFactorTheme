<?php
if ( ! function_exists('sidebar_talents') ) {

// Register Sidebar
function sidebar_talents()  {

	$args = array(
		'id'            => 'talent-sidebar',
		'name'          => __( 'Talents Sidebar', 'northmediatalent' ),
		'description'   => __( 'Will show on the catalog pages and the single talent pages', 'northmediatalent' ),
		'class'         => 'sidebar talent-sidebar',
		'before_title'  => '<h4 class="widgettitle featurette-heading less"><span class="lead">',
		'after_title'   => '</span></h4>',
		'before_widget' => '<!-- Start Widget --><div id="%1$s" class="col-md-12 widget %2$s">',
		'after_widget'  => "</div>\n <!-- End Widget -->\n",
	);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'sidebar_talents' );

}
if ( ! function_exists('sidebar_footer') ) {

// Register Sidebar
function sidebar_footer()  {

	$args = array(
		'id'            => 'footer-sidebar',
		'name'          => __( 'Footer Sidebar', 'northmediatalent' ),
		'description'   => __( 'This will show in the Footer of ALL pages', 'northmediatalent' ),
		'class'         => 'footer footer-sidebar col-sm-3',
		'before_title'  => '<h4 class="widgettitle">',
		'after_title'   => '</h4>',
		'before_widget' => '<div id="%1$s" class="col-sm-3 pull-right widget %2$s">',
		'after_widget'  => '</div>',
	);
	register_sidebar( $args );

}

// Hook into the 'widgets_init' action
add_action( 'widgets_init', 'sidebar_footer' );

}
?>