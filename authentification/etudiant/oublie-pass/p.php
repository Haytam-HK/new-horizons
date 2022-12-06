<?php
  require("/PHPMailer-master/src/PHPMailer.php");
  require("/PHPMailer-master/src/SMTP.php");
  require("/PHPMailer-master/src/Exception.php");
if (isset($_POST['sbmt'])){
$e=$_POST['mail'];
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->IsSMTP(); 
$mail->CharSet="UTF-8";
$mail->Host = "smtp.gmail.com";  $mail->SMTPAuth = true;
$mail->SMTPAutoTLS = true;
$mail->SMTPDebug = 1; 
$mail->Port = 465 ;
$mail->SMTPSecure = 'ssl';  
$mail->SMTPAuth = true; 
$mail->IsHTML(true);
$mail->Username = "horizonsnew2022@gmail.com";
$mail->Password = "horizons2022";
$mail->SetFrom("horizonsnew2022@gmail.com");
$mail->AddAddress($e);
$mail->Subject = "Réinitialisation de mot de passe";
$mail->Body = "Madame,Monsieur,
  Nous avons reçu une demande de réinitialisation de votre mot de passe,
  New Horizons ,vous invite à créer un nouveau mot de passe.
  Cliquez <a href='R.php'> ici </a> pour créer un nouveau mot de passe.";
if(!$mail->Send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
   } else {
      echo "Message has been sent";
   }
}
?> 