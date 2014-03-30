<?php get_header(); ?>
<div class="container" id="page-content">
	<div class="row">
		<div class="col-md-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<h2 class="featurette-heading less"><span class="lead"><?php the_title(); ?></span></h2>
			<div class="row">
				<div class="col-sm-8">
				<div class="thumbnail-placeholder visible-xs"><?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></div>
					<?php the_content(); ?>
				</div>
				<div class="col-sm-4">
					<?php the_post_thumbnail('full', array('class' => 'img-responsive hidden-xs')); ?>
					<div class="meta">
						<?php echo doShares(get_permalink()); ?>
						<?php if (get_post_meta(get_the_ID(), 'demofactor_judge_meta_job_title', true)) { ?>
						<h5>Job Title</h5>
						<p><?php echo get_post_meta(get_the_ID(),'demofactor_judge_meta_job_title', true); ?></p>
						<?php } ?>
						<?php if (get_post_meta(get_the_ID(), 'demofactor_judge_meta_company', true)) { ?>
						<h5>Company</h5>
						<p><?php echo get_post_meta(get_the_ID(), 'demofactor_judge_meta_company', true); ?></p>
						<?php } ?>
						<?php var_dump(wp_get_post_terms(get_the_ID(), 'stations')) ?>
					</div>
				</div>
			</div>
			<!-- Stop The Loop (but note the "else:" - see next line). -->
			<?php endwhile; else: ?>


			<!-- The very first "if" tested to see if there were any Posts to -->
			<!-- display.  This "else" part tells what do if there weren't any. -->
			<div class="row">
				<div class="col-md-12">
					<h1>Oops!</h1>
					<p class="lead">Sorry, no posts matched your criteria.</p>
				</div>
			</div>
			<!-- REALLY stop The Loop. -->
			<?php endif; ?>
		</div><!-- .col-md-8 -->
		<?php get_sidebar(); ?>
	</div>
</div>

<?php get_footer(); ?>