<?php get_header(); ?>

<!-- Jumbotron -->
<div <?php body_class('container'); ?> id="page-content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<?php
				$jobs = rwmb_meta('northmediatalent_role');
				$demo = demo_audio_player(wp_get_attachment_url(rwmb_meta('northmediatalent_audio_demo')));
				$soundcloud = soundcloudEmbed(rwmb_meta('northmediatalent_soundcloud'));
				$showreel = youtubeEmbed(rwmb_meta('northmediatalent_video_showreel'));
				//var_dump($jobs);	
				$slider = talentphotoslider(rwmb_meta('northmediatalent_otherimages', 'type=image'));
			?>
	<div class="row">
		<div class="col-sm-8">
			<h2 class="featurette-heading less"><span class="lead"><?php the_title(); ?></span></h2>
					<?php
						foreach($jobs as $job) {
							echo "<h3>".$job."</h3>";
						}
					?>
		</div>
		<div class="col-sm-4 profile-image hidden-xs">
			<?php the_post_thumbnail('talent-profile', array('class'=>"img-responsive img-circle")); ?>
						<?php echo $showreel; ?>

		</div>
	</div>
	<div class="row talent-profile">
		<div class="col-sm-12">
			<div class="profile-image visible-xs">
				<?php the_post_thumbnail('talent-profile', array('class'=>"img-responsive img-circle ")); ?>
			</div>
			<div class="flexslider">
				<ul class="slides">
					<?php
						foreach ($slider as $slide) {
							echo $slide;
						}
						?>
				</ul>
			</div>
			<?php echo $showreel; ?>
					<?php echo $soundcloud; ?>
					<?php echo $demo;
						the_content();?>		
		</div>
	</div>
		
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	<!-- The very first "if" tested to see if there were any Posts to -->
	<!-- display.  This "else" part tells what do if there weren't any. -->
	<div class="row">
		<h1>Oops!</h1>
		<p class="lead">Sorry, no posts matched your criteria.</p>
	</div>
	 <!-- REALLY stop The Loop. -->
	 <?php endif; ?>

</div>


<?php get_footer(); ?>