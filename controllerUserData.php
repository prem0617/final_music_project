<?php 
session_start();
require "connection.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$email = "";
$name = "";
$errors = array();

// if user signup button is clicked
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }

    $email_check = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);

    // if(mysqli_num_rows($res) > 0){
    //     $errors['email'] = "Email that you have entered is already exist!";
    // }

    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO usertable (name, email, password, code, status)
                        values('$name', '$email', '$password', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);

        if($data_check){
            // Send verification email using PHPMailer
            $mail = new PHPMailer(true);

            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'asthavetcare@gmail.com';
                $mail->Password   = 'gpbe grjj xrdz prqi';
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465;

                // Enable verbose debug output
                

                //Recipients
                $mail->setFrom('rythmrover@gmail.com', 'Rythm Rover');
                $mail->addAddress($email, $name);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Email Verification Code';
                $mail->Body    = "Your verification code is $code";

                $mail->send();

                $info = "We've sent a verification code to your email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                session_start();
                $_SESSION['name'] = $name;
                header('location: user-otp.php');
                exit();
            } catch (Exception $e) {
                $errors['otp-error'] = "Failed while sending code! Error: {$mail->ErrorInfo}";
            }
        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
}
//login
 

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $check_email = "SELECT * FROM usertable WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    
    if(mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];

        $result = "SELECT `email`, `password` FROM `usertable` WHERE email='$email' and password='$password'";
        $checkEmail = mysqli_query($con,$result);
        $noOfRows = mysqli_fetch_array($checkEmail);

        if($noOfRows > 0) {
            $status = $fetch['status'];
            $otp = isset($fetch['otp']) ? $fetch['otp'] : null;
            
            if($status == 'verified') {
                if($otp === null || $otp == 0) {
                    // User is verified and OTP is 0 or not set, proceed to login
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    header('location: index.php');
                    exit(); // Stop further execution
                } else {
                    // User is verified but OTP is not 0, redirect to OTP verification page
                    $_SESSION['email'] = $email;
                    header('location: user-otp.php');
                    exit(); // Stop further execution
                }
            } else {
                // Email is not verified
                $errors['email'] = "Your email is not verified. Please verify your email first.";
            }
        } else {
            // Incorrect email or password
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        // Email not found
        $errors['email'] = "It looks like you're not yet a member! Click on the bottom link to sign up.";
    }
}


    //if user click continue button in forgot password form
    if(isset($_POST['check-email'])) {
        $email = mysqli_real_escape_string($con, $_POST['email']);
    
        $email_check = "SELECT * FROM usertable WHERE email = '$email'";
        $res = mysqli_query($con, $email_check);
    
        if(mysqli_num_rows($res) == 0) {
            $errors['email'] = "Email not found. Please enter a valid email address.";
        } else {
            $row = mysqli_fetch_assoc($res);
            $name = $row['name'];
            $code = rand(999999, 111111);
    
            // Update the reset code in the database
            $update_code_query = "UPDATE usertable SET code = '$code' WHERE email = '$email'";
            mysqli_query($con, $update_code_query);
    
            // Send password reset email using PHPMailer
            $mail = new PHPMailer(true);
    
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'asthavetcare@gmail.com'; // Replace with your email
                $mail->Password   = 'gpbe grjj xrdz prqi'; // Replace with your password
                $mail->SMTPSecure = 'ssl';
                $mail->Port       = 465 ;
    
                $mail->setFrom('rythmrover@gmail.com', 'Rythm Rover'); // Replace with your email and name
                $mail->addAddress($email, $name);
    
                $mail->isHTML(true);
                $mail->Subject = 'Password Reset';
                $mail->Body    = "HELLOM GOOD MORINGh";
    
                $mail->send();
    
                $_SESSION['info'] = "Password reset instructions have been sent to your email.";
                header('location: otpforget.php');
                
                exit();
            } catch (Exception $e) {
                $errors['email'] = "Failed to send email. Please try again later.";
            }
        }
    }

    
   // Set $_SESSION['email'] before using it
//if user click check reset otp button
if(isset($_POST['check-reset-otp'])){
    $_SESSION['info'] = "";
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM usertable WHERE  code = $otp_code  ";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
        $info = "Please create a new password that you don't use on any other site.";
        $_SESSION['info'] = $info;
        header('location: new-password.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}


    
    
    
    
    //if user click change password button
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Confirm password not matched!";
        } else {
            $email = $_SESSION['email']; //getting this email using session
            // $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE usertable SET code = 0, password = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Your password changed. Now you can login with your new password.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
                exit(); // Stop further execution
            } else {
                $errors['db-error'] = "Failed to change your password!";
            }
        }
    }
    
    
   //if login now button click
    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }

 
?>