<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Set the recipient email address(es)
  $to = "eddwaynerainey@gmail.com";

  // Sanitize the form data
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $reason = filter_var($_POST["reason"], FILTER_SANITIZE_STRING);
  $age = filter_var($_POST["Age"], FILTER_SANITIZE_STRING);
  $location = filter_var($_POST["lifestyle"], FILTER_SANITIZE_STRING);
  $first_contact = filter_var($_POST["activity"], FILTER_SANITIZE_STRING);
  $food = filter_var($_POST["Food"], FILTER_SANITIZE_STRING);
  $comments = filter_var($_POST["comments"], FILTER_SANITIZE_STRING);
  $color = filter_var($_POST["color"], FILTER_SANITIZE_STRING);

  // Set the email subject and message
  $subject = "New contact form submission";
  $message = "Name: $name\n\n";
  $message .= "Email: $email\n\n";
  $message .= "Reason for contact: $reason\n\n";
  $message .= "Age: $age\n\n";
  $message .= "Location: $location\n\n";
  $message .= "Is this your first contact? $first_contact\n\n";
  if (!empty($food)) {
    $message .= "Food restrictions: $food\n\n";
  }
  if (!empty($comments)) {
    $message .= "Comments: $comments\n\n";
  }
  if (!empty($color)) {
    $message .= "Favorite color: $color\n\n";
  }

  // Set the email headers
  $headers = "From: $name <$email>\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  // Send the email
  mail($to, $subject, $message, $headers);

  // Redirect the user to the thank you page
  header("Location: form_submission.html");
  exit;
}

?>
