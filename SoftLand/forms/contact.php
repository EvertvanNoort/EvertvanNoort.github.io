<?php
// Define variables and initialize with empty values
$name = $email = $subject = $message = "";
$name_err = $email_err = $subject_err = $message_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate subject
    if(empty(trim($_POST["subject"]))){
        $subject_err = "Please enter a subject.";
    } else {
        $subject = trim($_POST["subject"]);
    }

    // Validate message
    if(empty(trim($_POST["message"]))){
        $message_err = "Please enter your message.";
    } else {
        $message = trim($_POST["message"]);
    }

    // Check input errors before sending email
    if(empty($name_err) && empty($email_err) && empty($subject_err) && empty($message_err)){
        // Recipient email address
        $to = 'your@email.com';
        $headers = "From: " . $email;
        
        // Send the email
        if(mail($to, $subject, $message, $headers)){
            echo '<p class="success">Message sent successfully!</p>';
        } else {
            echo '<p class="error">Message could not be sent.</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your existing HTML head content -->
</head>
<body>
    <!-- Your existing HTML body content, including the contact form -->
    <!-- Make sure the form method is set to post and action is set to the current file -->
    <!-- Example: <form action="contact.php" method="post"> -->
    
    <!-- Display error messages -->
    <?php
    if(!empty($name_err)){
        echo '<p class="error">' . $name_err . '</p>';
    }
    if(!empty($email_err)){
        echo '<p class="error">' . $email_err . '</p>';
    }
    if(!empty($subject_err)){
        echo '<p class="error">' . $subject_err . '</p>';
    }
    if(!empty($message_err)){
        echo '<p class="error">' . $message_err . '</p>';
    }
    ?>
</body>
</html>
