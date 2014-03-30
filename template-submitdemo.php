<?php 
/*
Template Name: Submit Your Demo

*/
?>

<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<!-- Jumbotron -->
<div class="container" id="page-content">
	<div class="row">
		<div class="col-md-8">
			<h2 class="featurette-heading less"><span class="lead"><?php the_title(); ?></span></h2>
			<div class="row">
				<div class="col-md-12">
					<?php the_content(); ?>
					<h3 class="featurette-heading less"><span class="lead">Upload Your Demo</span></h3>

					<?php
					
						if(isset($_POST['new_post']) == '1'):
							$name = $_POST['post_title'];
							$email = $_POST['email'];
							$phone = $_POST['phone'];
							$twitter = $_POST['twitter'];
							$description = $_POST['description'];
							$station = $_POST['station'];
							$uniyear = $_POST['uniyear'];
							$post_title = $_POST['post_title'].' - '.$_POST['station'];
						 	
							$new_post = array(
								'ID' => '',
								'post_title' => wp_strip_all_tags($post_title),
								'post_content' => $description,
								'post_type'     => 'demos',
								'post_status' => 'pending',
								'tax_input'	=> array(
									'stations' => $station
								),
							);
							$post_id = wp_insert_post($new_post);
							if ($post_id != 0): 
							 	
								if ($_FILES) {
									foreach ($_FILES as $file => $array) {
										$newupload = insert_attachment($file, $post_id);

										// $newupload returns the attachment id of the file that
										// was just uploaded. Do whatever you want with that now.
									}
								} // END THE IF STATEMENT FOR FILES
	
								$attachment = $newupload;
							 	
						 		// We have a new post, now lets add the metadata!
						 		add_post_meta($post_id, 'demofactor_meta_the_demo', $attachment);							 	
						 		add_post_meta($post_id, 'demofactor_meta_email_address', $email);
						 		add_post_meta($post_id, 'demofactor_meta_student_twitter', $twitter);
						 		add_post_meta($post_id, 'demofactor_meta_full_name', $name);
						 		add_post_meta($post_id, 'demofactor_meta_phone', $phone);
						 		add_post_meta($post_id, 'demofactor_meta_student_station', $station);
						 		add_post_meta($post_id, 'demofactor_meta_uni_year', $uniyear);
						 		add_post_meta($post_id, 'demofactor_meta_allow_public', $_POST['allow_public']);
						 		add_post_meta($post_id, 'demofactor_meta_allow_publish', $_POST['allow_publish']);
						 		
						 		
						 		if ($_POST['allow_public']=="yes") {
						 			echo df_tweetEntrant($twitter);
						 		}
						 		
							 	echo "<div class=\"alert alert-success\"><strong>Thank You!</strong> Your demo has been submitted!</div>";
							else:
								echo "<div class=\"alert alert-warning\"><strong>Oops!</strong> We had a problem with creating your demo entry. Please try again. If the problem persists, please email <a href=\"mailto:help@demofactor.com\">help@demofactor.com</a></div>";
						 	endif;
						 else:
						?>

						<form method="post" class="" role="form" action="" enctype="multipart/form-data">
						<input type="hidden" name="new_post" value="1" />
						<div class="row">
							<fieldset class="col-sm-6">
								<div class="form-group">
									<input class="form-control" id="post_title" name="post_title" placeholder="Your Full Name" type="text" required="required" />
								</div>
					
								<div class="form-group">
									<input class="form-control" id="email" name="email" placeholder="Your Email Address" type="email" required="required" />
								</div>
							</fieldset>
					
							<fieldset class="col-sm-6">
								<div class="form-group">
									<input class="form-control" id="phone" name="phone" placeholder="Your Telephone Number" type="tel" required="required" />
								</div>
					
								<div class="form-group">
									<input class="form-control" id="twitter" name="twitter" placeholder="Your Twitter @" type="text" required="required" />
								</div>
							</fieldset>
						</div>
						<div class="row">
							<div class="col-sm-12">
								<div class="form-group">
									<textarea class="form-control" id="description" name="description" placeholder="A bit about yourself" required="required"></textarea>
								</div>
							</div>
							<div class="col-sm-8">
								<div class="form-group">
									<select name="station" id="station" class="form-control">
										
										<option value="" selected="selected">-- Select Your Station --</option>
										<?php echo sra_getStations(); ?>
										
									</select>
								</div>
							</div>
							<div class="col-sm-4">
								<div class="row">
									<div class="col-sm-12">
										<select name="uniyear" id="uniyear" class="form-control">
											<option value="" selected="selected">-- Select Your Year --</option>
											<option value="1st Year">1st Year</option>
											<option value="2nd Year">2nd Year</option>
											<option value="3rd Year">3rd Year</option>
											<option value="4th Year">4th Year</option>
										</select>
									</div>
								</div>
							</div>
														<div class="clear clearfix">&nbsp;</div>

							<div class="col-sm-12">
								<div class="form-group">
									<input type="file" class="form-control" name="the_demo" />
								</div>
							</div>

							<div class="clear clearfix">&nbsp;</div>
							<div class="col-sm-12">
								<div class="form-group">
									<div class="checkbox">
										<label for="allow_public">
											<input type="checkbox" value="yes" checked="checked" name="allow_public" />
											I give permission for Demo Factor to tweet about my submission.
										</label>
									</div>
									<div class="checkbox">
										<label for="allow_publish">
											<input type="checkbox" value="yes" checked="checked" class="" name="allow_publish" />
											I give permission for Demo Factor to publish my demo so that others can hear it in it's full glory!
										</label>
									</div>
								</div>
							</div><!-- .col-sm-12 -->
							<div class="col-sm-6">
								<div class="form-group">
									<input type="submit" class="btn btn-success" name="submit" value="Submit Your Demo" />
								</div>
							</div>
						</div>
					</form>
					<?php endif; ?>
				</div>
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
