<?php 
/**
 * Contact Form
 */
  if ((isset($_POST['name'])) && (strlen(trim($_POST['name'])) > 0)) {
      $name = stripslashes(strip_tags($_POST['name']));
  } else {
      die('name field is empty');
  }
  if ((isset($_POST['email'])) && (strlen(trim($_POST['email'])) > 0)) {
      $email = stripslashes(strip_tags($_POST['email']));
  } else {
      die('email field is empty');
  }
  if ((isset($_POST['message'])) && (strlen(trim($_POST['message'])) > 0)) {
      $message = stripslashes(strip_tags($_POST['message']));
  } else {
      die('message field is empty');
  }
  ob_start();
  
  // The following is HTML email template. All styles should be inlined.
  include ('email-template-1.php');

  $body = ob_get_contents();

  $to = 'test@test.com';
  $toname = 'Contact Form';
  //$anotheraddress = 'email@example.com';
  //$anothername = 'Another Name';

  require("phpmailer.php");

  $mail = new PHPMailer();

  $mail->From = $email;
  $mail->FromName = $name;
  $mail->AddAddress($to, $toname); // Put your email
  //$mail->AddAddress($anotheraddress,$anothername); // addresses here

  $mail->WordWrap = 50;
  $mail->IsHTML(true);

  $mail->Subject = "Message from contact form";
  $mail->Body = $body;
  $mail->AltBody = $message;

  if (!$mail->Send()) {
      $recipient = $to;
      $subject = 'Contact form failed';
      $content = $body;
      mail($recipient, $subject, $content, "From: $name\r\nReply-To: $email\r\nX-Mailer: DT_formmail");
      exit;
  }
?>