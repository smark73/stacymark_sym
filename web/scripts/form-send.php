<?php
$name = '';
$email = '';
$comments = '';

// ------------- CONFIGURABLE SECTION ------------------------
$mailto = "stacy@stacymark.com" ;
$subject = "Contact Form" ;
// the pages to be displayed, eg 
$formurl = "index.php" ;
//$errorurl = "index.php?status=error" ;
//$thankyouurl = "index.php?status=sent" ;
// other config
$name_is_required = 1;
$email_is_required = 1;
$comments_is_required = 1;
$uself = 0;
$use_envsender = 0;
$use_sendmailfrom = 0;
$use_webmaster_email_for_from = 0;
$use_utf8 = 1;
// -------------------- END OF CONFIGURABLE SECTION ---------------
$headersep = (!isset( $uself ) || ($uself == 0)) ? "\r\n" : "\n" ;
$content_type = (!isset( $use_utf8 ) || ($use_utf8 == 0)) ? 'Content-Type: text/plain; charset="iso-8859-1"' : 'Content-Type: text/plain; charset="utf-8"' ;
if (!isset( $use_envsender )) { $use_envsender = 0 ; }
if (isset( $use_sendmailfrom ) && $use_sendmailfrom) {
	ini_set( 'sendmail_from', $mailto );
}
$envsender = "-f$mailto" ;

if(isset($_POST['name']) && ($_POST['name'] != '')){
	$name = $_POST['name'];
}
if(isset($_POST['email']) && ($_POST['email'] != '')){
	$email = $_POST['email'];
}
if(isset($_POST['comments']) && ($_POST['comments'] != '')){
	$comments = $_POST['comments'];
}
$feedme = $_POST['feedme'] ;

$http_referrer = getenv( "HTTP_REFERER" );

if ($feedme != ''){
	header("Location: index.php" );
	exit;
} else {


$fromemail = (!isset( $use_webmaster_email_for_from ) || ($use_webmaster_email_for_from == 0)) ? $email : $mailto ;
// strip slashes
if (function_exists( 'get_magic_quotes_gpc' ) && get_magic_quotes_gpc()) {
	$comments = stripslashes( $comments );
}

$messageproper =
	"Contact from stacymark.com from: \n" .
	"----------------------------------------\n" .
	"Name: $name\n" .
	"Email: $email\n" .
	$comments . "\n" ;

$headers = "From: \"$name\" <$fromemail>" . $headersep . "Reply-To: \"$name\" <$email>" . $headersep . 'MIME-Version: 1.0' . $headersep . $content_type ;

if ($use_envsender) {
	mail($mailto, $subject, $messageproper, $headers, $envsender );
} else {
	mail($mailto, $subject, $messageproper, $headers );
}

//header( "Location: index.php" );
exit;
}
?>