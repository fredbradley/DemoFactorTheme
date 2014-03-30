<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head prefix="og: http://ogp.me/ns#">

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta property="fb:admins" content="500260393">
		<meta property="fb:admins" content="100006239551279">
		<meta name="change-freq" content="weekly" />
		<meta name="last-updated" content="2013-07-25T12:09:49+00:00" />
		<meta name="priority" content="0.5" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="author" href="https://plus.google.com/111133901586156007045/" />

		<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title('', true, 'right'); ?></title>
		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
        
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		

<!-- Call the Wordpress Head Defaults -->

<?php wp_head(); ?>

<!-- That's enough of Wordpress spew, on with the template! -->

		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.2.0/respond.js"></script>
		<![endif]-->

<?php fb_googleanalytics($_SERVER['HTTP_HOST']); ?>

		<style>
		#logo-image,
		#page-content {
			display: none;
		}
		</style>
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-12 pagination-centered">
					<div class="logo-container">
						<a href="/">
							<img id="logo-image" class="img-responsive pagination-centered" alt="North Media Talent Logo" title="North Media Talent Logo" src="http://www.northmediatalent.com/wp-content/uploads/2013/10/North-Media-Talent-full-colour-e1381867576393.png" />
						</a>
					</div>
					<h1 class="logo text-center"><?php bloginfo(); ?></h1>
				</div>
			</div>
		</div>