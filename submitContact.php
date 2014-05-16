<?php

if($_POST){
	$name = clean($_POST["name"]);
	$email = clean($_POST["email"]);
	$message = clean($_POST["message"]);

	$body = "Name: $name <br /> Email: $email <br /> Message: $message";
	$subject = "Web Contact Form";  

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Portfolio Website <skynet@matthewlavine.net>' . "\r\n";

	mail('msl23@njit.edu', $subject, $body, $headers);
}

function clean($data){
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
