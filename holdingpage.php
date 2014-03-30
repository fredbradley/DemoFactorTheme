<?php

/* 
Template Name: Holding Page 
	
*/

get_header('demofactor');
?>



<!-- BEGIN: HOLDING PAGE TEMPLATE -->
<div class="container">
	<div class="row layer" data-depth="0.5">
		<div class="col-md-12">
		<!--	<div class="video-container">
				<iframe class="layer" data-depth="0.2" src="//player.vimeo.com/video/80133969?title=0&amp;autoplay=1&amp;loop=1&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="1080" height="608" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			</div> -->
			<!-- <div class="meta">TEST AREA</div> -->
		</div>
		<div class="col-md-12">
			<div class="video-container">
				<video id="youtube1" width="640" height="360">
					<source src="http://www.youtube.com/watch?v=nOEw9iiopwI" type="video/youtube" >
				</video>
			</div>
			<!-- <div class="meta">TEST AREA</div> -->
		</div>
	</div>
</div>
	<script>
		jQuery(document).ready(function($) {
			$('#youtube1').mediaelementplayer();
		});
		$(".video-container").fitVids();
	</script>
<?php 
	
	get_footer('demofactor');
?>