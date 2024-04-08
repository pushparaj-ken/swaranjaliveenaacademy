<?php
//print_r("echo");
// header("Access-Control-Allow-Origin: *");

// // $name = $_POST['name'];
// // $email = $_POST['email'];
// // $phone_number = $_POST['phone_number'];
// // $message = $_POST['message'];

// $from = "no-reply@kindercab.in";
// $to = "lachu.sekar95@gmail.com";
// $subject = "Contact Form ";
// $headers  = 'MIME-Version: 1.0' . "\r\n";

// $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// $headers .= "From: " . $from . "\r\n";

// $msg = "Gurdian Name:" . $_POST['gname'] . "<br>   Gurdian Phonenumber: " . $_POST['gphonenumber'] . "<br> Child Name: " . $_POST['cname'] . "<br>   Child Age: " . $_POST['cage'] . "<br> Message: " . $_POST['message'];

// // Send the first email
// if (mail($to, $subject, $msg, $headers)) {
//   $data['result'] = 1;
// } else {
//   $data['result'] = 0;
//   echo "Mail delivery failed: " . error_get_last()['message'];
// }

// echo json_encode($data);

require 'vendor/autoload.php';

// Create a new PHPMailer instance
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
  // Server settings
  $mail->isSMTP();
  $mail->Host       = "mail.finesseacquaintancemigrationconsultancy.com";
  $mail->SMTPAuth   = true;
  $mail->Username   = "info@finesseacquaintancemigrationconsultancy.com";
  $mail->Password   = "ItSf,L?*$F=T1";
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
  $mail->Port       = 465;

  // Recipients
  $mail->setFrom('no-reply@swaranjaliveenaacademy-production.up.railway.app', 'Mailer');
  $mail->addAddress('pushparaj7396@gmail.com', 'Joe User');     // Add a recipient

  // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = 'Test Email';
  $mail->Body    = 'This is a test email from your Railway app!';

  $mail->send();
  echo 'Email has been sent';
} catch (Exception $e) {
  echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
