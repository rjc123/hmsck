<?php

$errors = '';
$targetemail = 'enquiry@hmsck.com';

if (empty($_POST['name'])  ||
   	empty($_POST['email']) ||
   	empty($_POST['message']))
	{
    $errors .= "\n Error: all fields are required";
	}

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

if (!preg_match(
	"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
	$email_address))
	{
    $errors .= "\n Error: Invalid email address";
	}

if (empty($errors))
	{
	$to = $targetemail;
	$email_subject = "Contact form submission: $name";
	$email_body = "You have received an enquiry to the HMSCK shut-down web page. ".
		"Here are the details:\n Name: $name \n ".
		"Email: $email_address\n Message \n $message";
	$headers = "From: $targetemail\n";
	$headers .= "Reply-To: $email_address";
	mail($to,$email_subject,$email_body,$headers);

//redirect to the 'thank you' notice
	header('Location: ../index.html#success_message');
	}
else
//redirect to the error notice
	{
	header('Location: ../index.html#error_message');
	}
?>
