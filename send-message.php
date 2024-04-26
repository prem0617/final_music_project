<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// required files
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["email"])) {

    $mail = new PHPMailer(true);

    $email = $_POST["email"];

    try {

        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'lorem.ipsum.sample.email@gmail.com';
        $mail->Password   = 'tetmxtzkfgkwgpsc';
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;

        // Recipients
        $mail->setFrom('rythmroveroffical@gmail.com', 'Rythm Rover');
        $mail->addAddress($_POST["email"]);
        $mail->addReplyTo('rythmroveroffical@gmail.com', 'Rythm Rover');

        // Content

        $otp = rand(100000,999999);

        $mail->isHTML(true);
        $mail->Subject = 'Thank You for Reaching Out!';
        $mail->Body = "
           <p>
                Welcome to Rythm Rover Offical Website <br>
                Your otp for sign up is $otp
           </p>
        ";
        session_start();
        $_SESSION['otp']=$otp;
        // echo $_SESSION['otp'];
        $mail->send();
        echo "
            <script>
            alert('Message was sent successfully. Thank your for reaching us!');
            
            </script>
        ";
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>

<form action="" >
    
    <input type="text" name="enteredOtp" id="" placeholder="Enter otp">
        <br><br>
    <input type="submit" value="Enter Opt and SignUp" name="sendMail">
</form>


<?php
    $checkOtp = $_SESSION['otp'];
      echo $checkOtp;
   if(isset($_POST  ['sendMail']))
   {
       $enteredOtp = $_POST['enteredOtp'];
      echo $checkOtp;

   }
?>