<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)

$email = new \SendGrid\Mail\Mail();
$email->setFrom("test@example.com", "Example User");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("test@example.com", "Example User");
$email->addContent("text/plain", "and easy to do anywhere, even with PHP");
$email->addContent(
    "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
);
$sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
try {
    $response = $sendgrid->send($email);
    print $response->statusCode() . "\n";
    print_r($response->headers());
    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
///*
//This first bit sets the email address that you want the form to be submitted to.
//You will need to change this value to a valid email address that you can access.
//*/
//$webmaster_email = 'volvydeutsch1@gmail.com';
//
///*
//This bit sets the URLs of the supporting pages.
//If you change the names of any of the pages, you will need to change the values here.
//*/
//$feedback_page = "index.html";
//$error_page = "error_message.html";
//$thankyou_page = "thank_you.html";
//
///*
//This next bit loads the form field data into variables.
//If you add a form field, you will need to add it here.
//*/
//$first = $_REQUEST['first'] ;
//$last = $_REQUEST['last'] ;
//$subject = $_REQUEST['subject'] ;
//$email = $_REQUEST['email'] ;
//$message = $_REQUEST['message'] ;
//$msg =
//"first: " . $first . "\r\n" .
//"last: " . $last . "\r\n" .
//"subject" . $subject .
//"email: " . $email . "\r\n" .
//"message: " . $message ;
//
///*
//The following function checks for email injection.
//Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.
//*/
//function isInjected($str) {
//	$injections = array('(\n+)',
//	'(\r+)',
//	'(\t+)',
//	'(%0A+)',
//	'(%0D+)',
//	'(%08+)',
//	'(%09+)'
//	);
//	$inject = join('|', $injections);
//	$inject = "/$inject/i";
//	if(preg_match($inject,$str)) {
//		return true;
//	}
//	else {
//		return false;
//	}
//}
//
//// If the user tries to access this script directly, redirect them to the feedback form,
//if (!isset($_REQUEST['email'])) {
//header( "Location: $feedback_page" );
//}
//
//// If the form fields are empty, redirect to the error page.
//elseif (empty($first) || empty($email) || empty($last) || empty($subject) || empty($message)) {
//header( "Location: $error_page" );
//}
//
///*
//If email injection is detected, redirect to the error page.
//If you add a form field, you should add it here.
//*/
//elseif ( isInjected($email) || isInjected($first) || isInjected($last) || isInjected($subject) || isInjected($message)) {
//header( "Location: $error_page" );
//}
//
//// If we passed all previous tests, send the email then redirect to the thank you page.
//else {
//
//	mail( "$webmaster_email", "Feedback Form Results", $msg );
//
//	header( "Location: $thankyou_page" );
//}
//?>
