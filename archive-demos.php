<?php get_header(); ?>
<div class="container" id="page-content">
	<div class="row">
		<div class="col-md-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<!-- New Item -->
			<div class="row">
				<div class="col-md-12">
					<h2 class="featurette-heading less">
						<span class="lead"><?php the_title(); ?></span>
					</h2>
				</div>
				<div class="col-md-12"><?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></div>
				<div class="col-md-12"><?php the_content(); ?></div>
				<div class="col-md-12">
					<?php $attach_id = get_post_meta(get_the_ID(),'demofactor_meta_the_demo', true); ?>
					<ul>
						<li><?php echo get_post_meta(get_the_ID(),'demofactor_meta_email_address', true); ?></li>
						<li><?php echo do_shortcode('[audio]'.wp_get_attachment_url( $attach_id ).'[/audio]'); ?></li>
					</ul>
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
 
		</div><!-- .col-md-8 -->
		<?php get_sidebar(); ?>
	</div><!-- .row -->
 </div><!-- .container -->



<?php get_footer(); ?>