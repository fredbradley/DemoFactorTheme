<?php
//include("db.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$name=($_POST['name']);
$email=($_POST['email']);
$message=($_POST['message']);

$to = "fred@fredbradley.co.uk";
$subject = "This is a test";
$message = "Message from".$name.":" .$message;
$headers = 'From: '.$email . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
mail ( $to, $subject, $message, $headers ); // [, string $additional_headers [, string $additional_parameters ]] );


/*
if(strlen($name)>0 && strlen($email)>0 && strlen($message)>0)
{
$time=time();
mysql_query("INSERT INTO contact (name,email,message,created_date) VALUES('$name','$email','$message','$time')");
echo "<h1>Thank You !</h1>";
}
*/
}
?>