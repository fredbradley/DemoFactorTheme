<div class="container">
	<div class="row">
<?php
    $blogusers = get_users();

 foreach ($blogusers as $user) {
	$profile_pic = get_avatar_url(get_avatar($user->ID));
 		echo "<div class=\"col-sm-4 col-xs-6 col-md-2 text-center\">";
 	//	echo "<div class=\"thumbnail\">";
 		echo "<img src=\"".$profile_pic."\" title=\"".$user->display_name."\" alt=\"".$user->display_name."\" class=\"img-thumbnail\">";
 	//	echo "</div>";
 		echo "</div>";

    }

?>
	</div>
</div>