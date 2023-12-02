<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$to = 'ai@evertvannoort.com';
$subject = 'New contact form submission';

mail($to, $subject, $message, "From: " . $name . " <" . $email . ">");
echo 'Thank you for your message!';
?>
