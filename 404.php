<?php get_header('basic'); ?>
<?

#if you have some reason to change these, do.  but wordpress can handle it
$adminemail = get_option('admin_email'); #the administrator email address, according to wordpress
$website = get_bloginfo('url'); #gets your blog's url from wordpress
$websitename = get_bloginfo('name'); #sets the blog's name, according to wordpress

  if (!isset($_SERVER['HTTP_REFERER'])) {
    #politely blames the user for all the problems they caused
	$casemessage = "All is not lost!";
  } elseif (isset($_SERVER['HTTP_REFERER'])) {
    #this will help the user find what they want, and email me of a bad link
        #setup a message to be sent to me
	$failuremess = "A user tried to go to $website"
        .$_SERVER['REQUEST_URI']." and received a 404 (page not found) error. ";
	$failuremess .= "It wasn't their fault, so try fixing it.  
        They came from ".$_SERVER['HTTP_REFERER'];
	mail($adminemail, "Bad Link To ".$_SERVER['REQUEST_URI'],
        $failuremess, "From: $websitename <noreply@$website>"); #email you about problem
	$casemessage = "An administrator has been emailed 
        about this problem, too.";#set a friendly message
  }
?>
 <!-- The very first "if" tested to see if there were any Posts to -->
 <!-- display.  This "else" part tells what do if there weren't any. -->
 <div class="container">
	 <div class="row text-center featurette-heading">
		 <h1><i class="fa fa-frown"></i>ops! No page exists at: <code><?php echo $_SERVER['REQUEST_URI']; ?></code>!</h1>
		 <?php if (!isset($_SERVER['HTTP_REFERER'])) {
			 echo "<p class=\"lead\">Double check the spelling of the address you entered.";
		 } elseif (isset($_SERVER['HTTP_REFERER'])) {
			 echo "<p class=\"lead\">You can either <a href=\"".$_SERVER['HTTP_REFERER']."\">hit back</a>, and try again.";
		 } ?>
		 
		 
		 Or simply <a href="/">visit our homepage</a>!</p>
	 </div>
 </div>




<?php get_footer('basic'); ?>