<?php if ( is_active_sidebar( 'footer-sidebar' ) ) : ?>
	<!-- FOOTER -->
	<footer id="phat-footer">
		<div class="container">
			<div class="row">
					<?php dynamic_sidebar( 'footer-sidebar' ); ?>
			</div>
			<div class="row">
			     <?php
                wp_nav_menu( array(
                    'menu'       => 'footer',
                    'theme_location' => 'footer',
                    'depth'      => 1,
                    'container'  => false,
                    'menu_class' => 'nav nav-pills',
                    'fallback_cb' => 'wp_page_menu',
                    'walker' => new wp_bootstrap_navwalker())
                );
            ?>
			</div>
		</div>
	</footer>
	<?php endif; ?>
<?php wp_footer(); ?>

<script type="text/javascript">!function(d,s,id){var 
js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 
'script', 'twitter-wjs');</script>
	
<script>
$(".youtube_embed").fitVids();

		$(".kkcount-down").kkcountdown({
			dayText : 'day',
			daysText : ' days, ',
			hoursText : ' hours, ',
			minutesText : 'mins, ',
			secondsText : 'secs, ',
			displayZeroDays : true,
			oneDayClass : 'one-day'
		});
</script>
</body>
</html>