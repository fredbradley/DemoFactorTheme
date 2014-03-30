<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>



<!-- Jumbotron -->
<div class="container" id="page-content">
	<div class="row">
		<div class="col-md-8">
			<h2 class="featurette-heading less"><span class="lead"><?php the_title(); ?></span></h2>
			<div class="row">
				<div class="col-md-12"><?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?></div>
				<div class="col-md-12">
					<?php $previous_winners = get_post_meta(get_the_ID(), 'previous_winner');
					foreach ($previous_winners as $winner) {
						echo $winner;
					}
					
					
					 ?>
					<?php the_content(); ?></div>

			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>
       <!-- Stop The Loop (but note the "else:" - see next line). -->
 <?php endwhile; else: ?>


 <!-- The very first "if" tested to see if there were any Posts to -->
 <!-- display.  This "else" part tells what do if there weren't any. -->
 <div class="container">
	 <div class="row">
		 <h1>Oops!</h1>
		 <p class="lead">Sorry, no posts matched your criteria.</p>
	 </div>
 </div>


 <!-- REALLY stop The Loop. -->
 <?php endif; ?>


<?php get_footer(); ?>