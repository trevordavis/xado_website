<?php
set_time_limit(0);
require_once "../../bin/php/php7.1.8/lib/php/Mail.php";
echo("<p>Made it to the first step</p>");

$errors = '';
// if(empty($_POST['name'])  ||
//    empty($_POST['email']) ||
//    empty($_POST['message']))
// {
//     $errors .= "\n Error: all fields are required";
//     echo("<p>Failure</p>");
// } else {
// 	echo("<p>Made it to the next step</p>");
// }
// $name = $_POST['name'];
// $email_address = $_POST['email'];
// $message = $_POST['message'];
$name = "Trevor Davis";
$email_address = "trevor.l.davis.18@dartmouth.edu";
$message = "I hope this works!";
if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
$email_address))
{
    $errors .= "\n Error: Invalid email address";
    echo("<p>Failure</p>");
} else {
	echo("<p>Information: $name $email_address $message</p>");
}

if( empty($errors)) {
	$from = "$name <$email_address>";
	$to = "Trevor Davis <trevordavis6105@gmail.com>";
	$subject = "Contact form submission: $name";
	$body = "You have received a new message. ". " Here are the details:\n Name: $name \n ". "Email: $email_address\n Message \n $message";
	$port = '587';

	$host = "smtp.live.com";
	$username = "f0024jf@dartmouth.edu";
	$password = "#essiquamvideri";

	$headers = array('From' => $from, 'To' => $to, 'Subject' => $subject, 'Reply-To' => 'trevordavis6105@gmail.com');
	$smtp = Mail::factory('smtp', array('host' => $host, 'auth' => true, 'username' => $username, 'password' => $password, 'port' => $port));
	$mail = $smtp->send($to, $headers, $body);

	echo("<p>Set up mail</p>");

	if (PEAR::isError($mail)) {
		echo("<p>" . $mail->getMessage() . "</p>");
	} else {
		echo("<p>Message successfully sent!</p>");
	}
	// header('Location: http://localhost:8888/xado/index.html');
} else {
	echo("<p>Failure</p>");
}

?>