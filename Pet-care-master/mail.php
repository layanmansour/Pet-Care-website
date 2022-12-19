<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;
  require 'PHPMailer-master/src/Exception.php';
  require 'PHPMailer-master/src/PHPMailer.php';
  require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient,$subject,$message)
{

  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "tls";
  $mail->Port       = 587;
  $mail->Host       = "smtp.gmail.com";
  $mail->Username   = "raseelalrowais@gmail.com" ;
  $mail->Password   = "nitvdhqclmnpmjgs";

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, "Pet Care user");
  $mail->SetFrom("raseelalrowais@gmail.com", "Pet Care");
 
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 
  if(!$mail->Send()) {
   
    return false;
  } else {
   
    return true;
  }

}

?>
