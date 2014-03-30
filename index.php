<?php get_header(); ?>
<div class="container" id="page-content">
	<div class="row">
		<div class="col-md-8">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="row" id="post-id-<?php the_ID();?>">
				<div class="col-md-12">
					<h2 class="featurette-heading less">
						<span class="lead"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
					</h2>
				</div>
				<div class="col-md-12"><div class="thumbnail-placeholder"><?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></div></div>
				<div class="col-md-12"><?php the_content(); ?></div>
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
			<!-- REALLY stop The Loop. -->
			<?php endif; ?>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>


<?php get_footer(); ?>