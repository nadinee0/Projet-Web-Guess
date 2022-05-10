<?php
use PHPMailer\SMTP;
use PHPMailer\PHPMailer;
use PHPMailer\Exception;

if(isset($_SESSION['code']))
{
    $code=$_SESSION['code'];
}
else
die('$'."_SESSION['code'] isn't set because you had never been at file one");

//Load Composer's autoloader
         function sendemail($email ,$email_content){
            $mail = new PHPMailer(true);

            //$mail->SMTPDebug = 2;                                     //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'guesszaghden@gmail.com';          //SMTP username
            $mail->Password   = '050521YA';                            //SMTP password
            $mail->SMTPSecure = "ssl";                                  //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS
        
            //Recipients
            $mail->setFrom('guesszaghden@gmail.com', "guess");
            $mail->addAddress($email);                     //Add a recipient
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            
            $mail->Subject = $email_content['Subject'];      
            $mail->Body = $email_content['body'];
            
            $mail->send();
        }


?>