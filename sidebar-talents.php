<?php if ( is_active_sidebar( 'talent-sidebar' ) ) : ?>

			<div class="row">
				<ul id="sidebar">
					<?php dynamic_sidebar( 'talent-sidebar' ); ?>
					
				<!-- END OF SIDEBAR -->
				</ul>
			</div>
<?php endif; ?>

			<h4 class="featurette-heading less"><span class="lead">Social Media</span></h4>
			<div class="row socialbuttons">
				<div class="col-xs-6">
					<div class="linkedin">
							<a href="http://uk.linkedin.com/pub/chris-north/2/96b/127" class="linkedin" target="_blank"><i class="icon-linkedin"></i></a>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="twitter">
							<a href="http://twitter.com/NMediaTalent" class="twitter" target="_blank"><i class="icon-twitter"></i></a>
					</div>
				</div>
<!--				<div class="col-xs-4">
					<div class="gplus">
							<a href="http://twitter.com/NMediaTalent" class="gplus" target="_blank"><i class="icon-google-plus"></i></a>
					</div>
				</div> -->
			</div>
			<h4 class="featurette-heading less"><span class="lead">Contact Chris</span></h4>
			<div class="lead row">
				<div class="col-xs-12">
					<?php echo do_shortcode("[cscf-contact-form]"); ?>
					<div class="twitter-button">
						
					</div>
				</div>
			</div>