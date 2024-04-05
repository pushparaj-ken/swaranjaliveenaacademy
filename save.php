<?php
//print_r("echo");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// $name = $_POST['name'];
// $email = $_POST['email'];
// $phone_number = $_POST['phone_number'];
// $message = $_POST['message'];

$from = "no-reply@kindercab.in";
$to = "lachu.sekar95@gmail.com";
$subject = "Contact Form ";
$headers  = 'MIME-Version: 1.0' . "\r\n";

$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

$headers .= "From: " . $from . "\r\n";

$msg = "Gurdian Name:" . $_POST['gname'] . "<br>   Gurdian Phonenumber: " . $_POST['gphonenumber'] . "<br> Child Name: " . $_POST['cname'] . "<br>   Child Age: " . $_POST['cage'] . "<br> Message: " . $_POST['message'];

// Send the first email
if (mail($to, $subject, $msg, $headers)) {
  $data['result'] = 1;
} else {
  $data['result'] = 0;
}

echo json_encode($data);
