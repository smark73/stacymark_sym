<?php
	//code to email webmaster when nothing is found -->
   $from_header = "From: 404@stacymark.com\r\n";
   $to = "stacy@stacymark.com";
   $subject = "404 Error";
   $today = date("D M j Y g:i:s a T");
   $ip = getenv ("REMOTE_ADDR");
   $requri = getenv ("REQUEST_URI");
   $servname = getenv ("SERVER_NAME");
   $pageload = $ip . " tried to load http://" . $servname . $requri ;
   $httpagent = getenv ("HTTP_USER_AGENT");
   $httpref = getenv ("HTTP_REFERER");
   $message = "$today \n\n$pageload \n\nUser Agent = $httpagent \n\n$httpref ";
   mail($to, $subject, $message, $from_header);
	// send them away
    header("Location: /");
    header("Connection: close");
    exit();
?>