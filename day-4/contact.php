<?php

# parse the form if the user submitted it
if ($_POST['did_send']) {

	# extract all the data that was type in
	# TODO: sanitize all data

	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$reason = $_POST['reason'];
	$message = $_POST['message'];
	$newsletter = $_POST['newsletter'];

	# TODO: validate each field

	# send the mail!
	$to = 'daleymj87@gmail.com';
	$subject = 'Hey Matt ' . $name ;
	$body = "Email Address: $email\n";
	$body .= "Phone Number: $phone\n";
	$body .= "Reason for contactin me: $reason\n";
	$body .= "Subscribe to newsletter? $newsletter\n\n";
	$body .= "$message\n\n";

	$headers = "From: foomanchu@gmail.com\r\n";
	$headers .= "Reply-to: $email\r\n";
	$headers .= "Bcc: dollyparton@gmail.com";

	$mail_sent = mail($to, $subject, $body, $headers);



	# give the user feedback
	if ($mail_sent) {
		$class = 'success';
		$feedback = 'Thank you for contacting me, I will get back to you shortly.';
	}

	else{
	$class = 'error';
	$feedback = 'Something went wrong, your message could not be sent.';
	}

 }
 ?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Contact Me</title>
</head>

<body>

<h1>Contact Me</h1>

<?php
if (isset($feedback) ) {
	echo '<div class="feedback ' . $class . '">';
	echo $feedback;

	echo '</div>';
}
?>


<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

<label for="the_name">Your Name</label>
<input type="text" name="name" id="the_name">

<label for="the_email">Email Address</label>
<input type="email" name="email" id="the_email">

<label for="the_phone">Phone Number</label>
<input type="tel" name="phone" id="the_phone">

<label for="the_reason">How can I help you?</label>
<select name="reason" id="the_reason">

<option selected>Choose One</option>
<option value="help">I need help</option>
<option value="hi">I just want to say 'Hi!'</option>
<option value="bug">I found a bug in you code</option>


</select>

<label for="the_message">Message</label>
<textarea name="message" id="the_message"></textarea>

<label>

<input type="checkbox" name="newsletter" value="true">
Yes! Sign me up for the awesome newsletter. I don't get enough fricken emails.

</label>

<input type="submit" name="Send Message">
<input type="hidden" name="did_send" value="true">

</form>

</body>
</html>
