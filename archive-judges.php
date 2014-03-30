<?php get_header(); ?>

<?php

//$args = array ( 'posts_per_page' => 1 );
//$custom_query = new WP_Query( $args );

$args = array( 'post_type'=>'judges','posts_per_page' => -1, 'orderby'=>'rand' );

query_posts($args);

?>
<?php $class = "container"; ?>
<!-- Jumbotron -->
<div <?php body_class($class); ?> id="page-content">
	<div class="row">
		<div class="col-md-8">
			<h2 class="featurette-heading less"><span class="lead">The Judges</span></h2>
			<div class="row">
				<div class="col-md-12">
					<p>The judges are back! This year will see some judges return, but also we welcome two brand new judges to the Demo Factor panel. Find out more about each judge below.</p>
				</div>
				<div class="col-md-12">
				
			<?php while ( have_posts() ) : the_post(); ?>
					<hr class="break" />
					<div class="row">
						<div class="col-sm-3">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail('full', array('class' => 'img-responsive', 'alt'=>get_the_title()." Profile Picture")); ?>
							</a>
						</div>
						<div class="col-sm-9">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><strong>Likes: </strong><?php echo get_post_meta(get_the_ID(),'demofactor_meta_likes', true); ?></p>
							<p><strong>Dislikes: </strong><?php echo get_post_meta(get_the_ID(),'demofactor_meta_dislikes', true); ?></p>
							<p><em><a href="<?php the_permalink(); ?>">Full Profile</a></em></p>
						</div>
					</div>
			<?php endwhile; ?>
							</div>

			</div>
		</div>
		<?php get_sidebar(); ?>
	</div>
</div>



<?php get_footer(); ?>