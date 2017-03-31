<?php

if(isset($_SERVER['REQUEST_METHOD']) && !empty($_SERVER['REQUEST_METHOD'])){

	$nameSender  = $_REQUEST['name']; 	// this is the sender name
	$emailSender = $_REQUEST['email'];	// Valid Email
	$message 	 = $_REQUEST['message']; // Message content of what you will send in this form

	$to      	 = 'radhwen.khadhri@gmail.com';
	$subject 	 = 'Message pour radhwen';

	$headers   = array();
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/plain; charset=iso-8859-1';
	$headers[] = "From: $nameSender <$emailSender>";
	$headers[] = "Subject: $subject";

	mail($to, $subject, $message, implode("\r\n", $headers));

}

?>