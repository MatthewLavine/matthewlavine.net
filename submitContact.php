<?php
require_once 'application.php';
error_reporting(E_ALL);

$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

$message = "Name: $name <br /> Email: $email <br /> Message: $message";
$subject = "Web Contact Form";  

#echo $message;

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: NJIT Website <msl23_web@njit.edu>' . "\r\n";

mail('msl23@njit.edu', $subject, $message, $headers);

//Redirect upon completion
$web_root = RELATIVE_WEB_ROOT;
echo $web_root;
$url = $web_root."index.php?contactSuccess";
header("Location: ".$url);
?>
