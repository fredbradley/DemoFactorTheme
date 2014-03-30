<?php
$to = "fred@fredbradley.co.uk";
$subject = "Message from NorthMediaTalent.com";
$message = "You have a message from ".$_POST['name']." (".$_POST['email']."):\n\n" .$_POST['message'];
$headers = 'From: '.$_POST['name'].' <'.$_POST['email'].'>' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail ( $to, $subject, $message, $headers ); // [, string $additional_headers [, string $additional_parameters ]] );
