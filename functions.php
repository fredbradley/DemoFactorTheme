<?php
/**
 * Enqueue scripts and styles
 */
show_admin_bar( false );

require_once('inc/comment_form.function.php');
require_once('inc/CustomPostTypes.php');
require_once('inc/Sidebars.php');
require_once('inc/MetaBoxes/demofactor-metaboxes.php');
add_theme_support('post-thumbnails');
add_image_size('avatar', 75, 75, true);
add_image_size('talent-slider', 800);
add_image_size('judge-thumbnail', 300,300,true);


function bootstrap3_scripts() {

	wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', '', '3.0.0', 'all');
	wp_enqueue_style('fontawesome', '//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css', '', '4.0.3', 'all');
	wp_enqueue_style('theme', get_stylesheet_uri());
	wp_enqueue_style('less-styles', get_template_directory_uri() .'/less_styles.less');
	wp_enqueue_style('flexslider', get_template_directory_uri() .'/css/flexslider.css');
	wp_enqueue_style('mediaelement', get_template_directory_uri() .'/css/mediaelement.css');

	wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array( 'jquery' ), '3.0.0', true);
	wp_enqueue_script('jquery-ui', get_template_directory_uri().'/js/jquery-ui.js', array('jquery'), '1.10.4', false);
	//wp_enqueue_script( 'less-js', get_template_directory_uri() . '/js/less.js', '', '', true);
	wp_enqueue_script('fredbradley', get_template_directory_uri() . '/js/custom_scripts.js', array( 'jquery'), '1.0.0', true);
	wp_enqueue_script('fitvidsjs', get_template_directory_uri().'/js/fitvids.js', array('jquery'), '1.0.3');
	wp_enqueue_script('mediaelement-local', get_template_directory_uri().'/js/mediaelement.js', '', '1');
	wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js');
}
add_action( 'wp_enqueue_scripts', 'bootstrap3_scripts' );


function modify_jquery() {
        wp_deregister_script('jquery');
        wp_register_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', false, '1.10.2');
        wp_enqueue_script('jquery');
}
add_action('init', 'modify_jquery');


/**
 * Navigation
 * The nav walker is for bootstrap
 */
 require_once('inc/navwalker.php');
 register_nav_menus( array(
    'primary' => __( 'Primary Menu', 'fredbradley' ),
    'footer' => __("Footer Menu", 'fredbradley'),
) );


function tweakjp_custom_twitter_site( $og_tags ) {
$page_id = 2;
$page_object = get_page( $page_id );
$content = $page_object->post_content;
	$og_tags['og:type'] = 'website';
	$og_tags['og:locale'] = 'en_GB';
	$og_tags['og:description'] = wp_filter_nohtml_kses($content);
	$og_tags['og:image'] = get_template_directory_uri() . '/images/logo.png';
	$og_tags['og:image:width'] = "276";
	$og_tags['og:image:height'] = "276";
	$og_tags['og:image:type'] = 'image/png';	
	
	
	$og_tags['twitter:site'] = '@DemoFactor';
	$og_tags['twitter:card'] = 'summary_large_image';
	$og_tags['twitter:creator'] = '@DemoFactor';
	$og_tags['twitter:description'] = wp_filter_nohtml_kses($content);
	$og_tags['twitter:title'] = get_bloginfo();
	$og_tags['twitter:image:src'] = get_template_directory_uri() . '/images/logo.png';
	
	return $og_tags;
}
add_filter( 'jetpack_open_graph_tags', 'tweakjp_custom_twitter_site', 11 );


function fb_googleanalytics($domain="demofactor.com", $ua="UA-44652794-2") {
	
	echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '".$ua."', '".$domain."');
  ga('send', 'pageview');

</script>";
}

function enqueue_less_styles($tag, $handle) {
    global $wp_styles;
    $match_pattern = '/\.less$/U';
    if ( preg_match( $match_pattern, $wp_styles->registered[$handle]->src ) ) {
        $handle = $wp_styles->registered[$handle]->handle;
        $media = $wp_styles->registered[$handle]->args;
        $href = $wp_styles->registered[$handle]->src . '?ver=' . $wp_styles->registered[$handle]->ver;
        $rel = isset($wp_styles->registered[$handle]->extra['alt']) && $wp_styles->registered[$handle]->extra['alt'] ? 'alternate stylesheet' : 'stylesheet';
        $title = isset($wp_styles->registered[$handle]->extra['title']) ? "title='" . esc_attr( $wp_styles->registered[$handle]->extra['title'] ) . "'" : '';

        $tag = "<link rel='stylesheet' id='$handle' $title href='$href' type='text/less' media='$media' />";
    }
    return $tag;
}
add_filter( 'style_loader_tag', 'enqueue_less_styles', 5, 2);

// Function that outputs the contents of the dashboard widget
function dashboard_widget_welcome() {
	echo "<strong>Welcome</strong> to Demo Factor's backend! Respect the responsibility bestowed upon you. If you have any questions then it's probably best to <a href=\"mailto:help@demofactor.com\">email</a> the developer, <a href=\"http://www.twitter.com/fredbradley\">Fred</a>, first!";
}

// Function used in the action hook
function add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget_2', 'Welcome To Demo Factor', 'dashboard_widget_welcome', 'high');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'add_dashboard_widgets' );


function demo_audio_player($src) {
	$params = array(
		'width' => '20px',
		'src'	=> $src,
		'preload' => true, 
	);
	return "<div class=\"audio_player_embed\" style=\"height:30px;overflow:hidden;\">".wp_audio_shortcode( $params )."</div>";
	
}

function soundcloudParams() {
	$params = array(
		'color' => 'd00059',
		'theme_color' => '000000',
		'sharing' => false,
		'show_user' => false,
		'download' => false,
		'show_comments' => false,
		'show_bpm' => false,
		'show_playcount' => false,
		'buying' => false,
		
	);
	foreach ($params as $key => $param) {
		$output .= $key."=".$param."&";
	}
//	$output = implode("&", $params);
	return $output;
}

/**
 * Souncloud Embed 
 *
 * @author     Fred Bradley <fred@fredbradley.co.uk>
 * @version    1.0
 * @since      Since Release 1.0.0
 */
function soundcloudEmbed($url) {
	
	return "\n\n\t<div class=\"soundcloud_embed\">".wp_oembed_get($url.'?'.soundcloudParams(), array('width'=>'auto'))."</div>\n\n";
}

/**
 * YouTube Embed 
 *
 * @author     Fred Bradley <fred@fredbradley.co.uk>
 * @version    1.0
 * @since      Since Release 1.0.0
 */
function youtubeEmbed($url) {
	$html = wp_oembed_get($url);
	if (preg_match_all('~([src=\"\'])([^\"\']+)\1~', $html, $arr))
		//print_r($arr[2]);
	$eurl = $arr[2][2];
	if (preg_match_all('#^http(s)?:#', $eurl, $prefix)) {
		$prefix = $prefix[0][0];
		$eurl = str_replace($prefix, "", $eurl);
	}
	
	$output = "\n\n\t<div class=\"youtube_embed\">\n";
	$output .= "\t\t<iframe width=\"500\" height=\"400\" src=\"".$eurl."&controls=0&showinfo=0&modestbranding=1&theme=light&iv_load_policy=3&color=white\" frameborder=\"0\" allowfullscreen></iframe>";
	$output .= "\n\t</div>\n";
		
	return $output;
}

/**
 * Talent Picture Slider 
 *
 * @author     Fred Bradley <fred@fredbradley.co.uk>
 * @version    1.0
 * @since      Since Release 1.0.0
 */

function talentphotoslider($slides) {
	foreach ($slides as $slide => $data) {
		$ids[] = $slide;
	}
	$before = "<div class=\"flexslider\"><ul class=\"slides\">";
	foreach ($ids as $id) {
		$output[] = "\n<li>".wp_get_attachment_image( $id, 'talent-slider' )."\n</li>\n";
	}
	$after = "</ul></div>";
	return $output;
}


/**
 * insert_attachment
 *
 * @author http://voodoopress.com/review-of-posting-from-front-end-form/
 */
 
function insert_attachment($file_handler,$post_id,$setthumb='false') {
	// check to make sure its a successful upload
	if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();

	require_once(ABSPATH . "wp-admin" . '/includes/image.php');
	require_once(ABSPATH . "wp-admin" . '/includes/file.php');
	require_once(ABSPATH . "wp-admin" . '/includes/media.php');

	$attach_id = media_handle_upload( $file_handler, $post_id );

	if ($setthumb) update_post_meta($post_id,'_thumbnail_id',$attach_id);
	return $attach_id;
}

/**
 * Get Stations From SRA Website 
 * @author Fred Bradley <fred@fredbradley.co.uk>
 */
function sra_getStations() {
	$file = "http://www.studentradio.org.uk/members.xml.php?key=mgeg04eh2y";
	$feed = simplexml_load_file($file);

	if (is_object($feed) && !isset($feed->error)) {
		$stations = $feed->station;
	
		foreach($stations as $station) {
			$station_name = (string) $station->name;
			echo "<option value=\"".$station_name."\">".$station_name."</option>\n\t\t\t\t\t\t\t\t\t\t";
		}
			echo "<option value=\"Individual Memeber\">Individual Membership</option>";
	} else {
		echo "<option value=\"Update Later\">...no connection to API. Please choose this for now!</option>";
	}
}

function doRand($array) {
	$random = array_rand($array);
	$result = $array[$random];
	return $result;
}

function df_tweetEntrant($user) {
	// Tweet Entrant
	// Follow Entrant
	// (Add entrant to list?)
	$hello = array("Hi", "Hello", "Hey", "Hiya", "Howdy", "Aloha");
	$grammar = array(
		"Thanks for uploading your demo! Good luck!",
		"Good idea, uploading your demo! Tell everyone else!",
		"Woop Woop, demo all received! Hopefully the judges are kind to you!",
		"We love your demo, but will the judges!? Find out at #SRACon!"
	);
	$ga = "utm_source=twitter&utm_medium=onUpload&utm_campaign=df_tweetEntrant&utm_term=".$user."&utm_content=".$user;
	$link = "http://www.demofactor.com?".$ga;
	$text = doRand($hello)." @".$user."! ".doRand($grammar)." ".$link;
	
	return socialmedia_updateTwitter($text);
}
function doShares($permalink) {
	
	$tweet = "<a href=\"https://twitter.com/share\" class=\"twitter-share-button\" data-count=\"vertical\" data-lang=\"en\">TEST</a>";
	$facebook = "<div class=\"fb-share-button\" data-href=\"".$permalink."\" data-type=\"box_count\"></div>";
	
	$google = "<div class=\"g-plus\" data-action=\"share\" data-annotation=\"vertical-bubble\"></div>";
	$plusone ="<div class=\"g-plusone\" data-size=\"tall\"></div>";



	
	$html = "<div class=\"row no-padding\">
				<div class=\"col-sm-4 col-xs-3\">".$tweet."</div>";
	$html .= "<div class=\"col-sm-4 col-xs-3\">".$facebook."</div>";
	$html .= "<div class=\"col-sm-4 col-xs-3\">".$google."</div>";
	$html .= "<div class=\"col-sm-4 col-xs-3\">".$plusone."</div></div>";
	return $html;
}

/**
 * Tweet a message via @DemoFactor
 * @author Fred Bradley <fred@fredbradley.co.uk>
 */

function socialmedia_updateTwitter($message){
	//$consumerKey = 'MGePSbqLTvzkQtoJKiow'; // fredbradley
	$consumerKey = '6DftG8FiNtNvHzVGV1B2Q'; // demofactor
	//$consumerSecret = 'ijQIqBfi3z719GR6anDggfMOpAgo2BF2fUSWF23zTmo'; // fredbradley
	$consumerSecret = 'brPNtL5m5vNMyCiZJXBK0i4IdctsQ0x3pkNTHM6kHI'; // demofactor
	//$oAuthToken = '83694807-c5N4UrRO3eSegJ0SyTTIwrpItoyZW8D7jOeNHeQP3'; // fredbradley
	$oAuthToken = '1926610183-67DLDn09ZzDVx7kjikf4Qb6GcTL3P9v8eJG2lhK'; // demofactor
	//$oAuthSecret = 'KTcSelq63nQUfcWUm1vjp8JLx0bUdwcYRO3qNIeZhj8'; // fredbradley
	$oAuthSecret = 'CqjG0NSUdftBb0cV6hFJvIuieXPeCG6VIJp51mjDJBVAP'; // demofactor
	
	require_once('twitteroauth/twitteroauth.php');
	
	// create a new instance
	$connection = new TwitterOAuth($consumerKey, $consumerSecret, $oAuthToken, $oAuthSecret);
	
	//send a tweet
	$connection->post('statuses/update', array('status' => $message));
}

function socialmedia_updateFacebook($message){
	//FUNCTIONALLITY GOES HERE
}



/**
 * Redirect non-admins to the homepage after logging into the site.
 *
 * @since 	1.0
 */
function soi_login_redirect( $redirect_to, $request, $user  ) {
	return ( is_array( $user->roles ) && in_array( 'administrator', $user->roles ) ) ? admin_url() : site_url();
} // end soi_login_redirect
add_filter( 'login_redirect', 'soi_login_redirect', 10, 3 );