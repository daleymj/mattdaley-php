<?php
error_reporting(E_ALL & ~E_NOTICE);

//useful function for highlighting fields with errors
function error_highlight($field, $array) {
	if(isset($array)) {
		if(array_key_exists($field, $array)){
			echo 'class="error"';
		} // end array_key_exists
	} //end isset
} //end error_highlight

# parse the form if the user submitted it
if ($_POST['did_send']) {

	# extract all the data that was type in
	# TODO: sanitize all data

	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	$phone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
	$reason = filter_var($_POST['reason'], FILTER_SANITIZE_STRING);
	$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
	$newsletter = filter_var($_POST['newsletter'], FILTER_SANITIZE_STRING);

	//validate each field
	$valid = true;
	//test for empty name field
	if($name == '') {
		$valid = false;
		$errors['name'] = 'The name field is required.';
	}
	//test if email is blank or invalid format
	if(! filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$valid = false;
		$errors['email'] = 'Please provide a valid email address.';
	}
	//test to see if the reason given is NOT on the list of allowed reasons
	$allowed_reasons = array('help', 'hi', 'bug');
	if(! in_array($reason, $allowed_reasons)) {
		$valid = false;
		$errors['reason'] = 'Please choose one of the reasons from the list.';
	}
	//check to see if checkbox comes back either true or false only
	if($newsletter != true) {
		$newsletter = false;
	}

	if($valid) {
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
	}//end if is valid

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

	//if there are errors, show them
	if(! empty($errors)) {
		echo '<ul>';
			foreach($errors as $item) {
				echo '<li>';
				echo $item;
				echo '</li>';
			}//end for each
		echo '</ul>';
	} // end $errors
	echo '</div>';
} //end $feedback
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" novalidate>

<label for="the_name">Your Name</label>
<input type="text" name="name" id="the_name" value="<?php echo $name; ?>" <?php
error_highlight('name', $errors); ?>>

<label for="the_email">Email Address</label>
<input type="email" name="email" id="the_email" value="<?php echo $email; ?>" <?php
error_highlight('email', $errors); ?>>>

<label for="the_phone">Phone Number</label>
<input type="tel" name="phone" id="the_phone" value="<?php echo $phone; ?>">

<label for="the_reason">How can I help you?</label>
<select name="reason" id="the_reason" <?php error_highlight('reason', $errors); ?>>>

<option>Choose One</option>
<option value="help" <?php if($reason == 'help'){echo 'selected';} ?>>I need help</option>
<option value="hi" <?php if($reason == 'hi'){echo 'selected';} ?>>
	I just want to say 'Hi!'</option>
<option value="bug" <?php if($reason == 'bug'){echo 'selected';} ?>>
	I found a bug in you code</option>


</select>

<label for="the_message">Message</label>
<textarea name="message" id="the_message"><?php echo $message; ?></textarea>

<label>

<input type="checkbox" name="newsletter" value="true" <?php if($newsletter){echo 'checked';} ?>>
Yes! Sign me up for the awesome newsletter. I don't get enough fucking emails.

</label>

<input type="submit" name="Send Message">
<input type="hidden" name="did_send" value="true">

</form>

</body>
</html>
