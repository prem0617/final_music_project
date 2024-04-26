<?php 
session_start();
require_once "connection.php"; // Include your database connection
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


// If user is not logged in or email is not set in session, redirect to login
if(!isset($_SESSION['email'])) {
    header('Location: login-user.php');
    exit(); // Stop further execution
}

$email = $_SESSION['email'];

// Handle OTP verification logic
if(isset($_POST['submit'])) {
    $otp_entered = mysqli_real_escape_string($con, $_POST['otp']);
    $check_otp_query = "SELECT  `email`, `code` FROM `usertable` WHERE email = '$email' AND code = '$otp_entered'";
    $result = mysqli_query($con, $check_otp_query);
    $num=mysqli_num_rows($result);
    if($num > 0) {
        // Check if OTP is still valid
       
            // Update OTP to 0 to mark it as verified
            $update_query = "UPDATE usertable SET status = 'verified', code = 0 WHERE email = '$email'";
            mysqli_query($con, $update_query);
            // Redirect user to login page or wherever needed
           
            header('Location: login-user.php');
            exit(); // Stop further execution
      
    } else {
        $errors['otp'] = "Invalid OTP. Please try again.";
    }
}

// Resend OTP functionality
if(isset($_GET['resend'])) {
    $code = rand(100000, 999999); // Generate new OTP code
    $update_query = "UPDATE usertable SET code = '$code', timestamp = CURRENT_TIMESTAMP WHERE email = '$email'";
    mysqli_query($con, $update_query);

    // Send the new OTP to the user's email
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username   = 'asthavetcare@gmail.com';
    $mail->Password   = 'gpbe grjj xrdz prqi';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setFrom('rythmrover@gmail.com', 'Rathm Rover'); // Your name and email address
    $mail->addAddress($email); // User's email address

    $mail->isHTML(true);
    $mail->Subject = 'Resend OTP';
    $mail->Body = "Your new OTP is: $code";

    if($mail->send()) {
        $info = "New OTP has been sent to your email - $email";
        $_SESSION['info'] = $info;
    } else {
        $errors['email'] = "Failed to send OTP. Please try again.";
    }

    // Redirect user to the OTP verification page
    header('Location: user-otp.php');
    exit(); // Stop further execution
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>OTP Verification</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .btn-primary {
            color: #fff;
            background-color: #6610f2;
            border-color: #007bff;
        }
        body {
            margin: 0;
            padding: 0;
            background-image: url('img/2.jpg'); /* Adjust the path to your background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        #countdown {
            text-align: center;
            margin-top: 10px;
            font-size: 18px;
            color: #ccc;
            padding: 5px;
        }
        #resend-link {
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="user-otp.php" method="POST">
                    <h2 class="text-center">OTP Verification</h2>
                    <?php if(isset($errors['otp'])) { ?>
                        <div class="alert alert-danger"><?php echo $errors['otp']; ?></div>
                    <?php } ?>
                    <div class="form-group">
                        <input type="number" class="form-control" name="otp" placeholder="Enter OTP" required>
                    </div>
                    <!-- Countdown Timer -->
                    <div id="countdown"></div>
                    <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary btn-block">Verify OTP</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <script>
        // Countdown Timer
        var seconds = 30; // Change this value to set the countdown time
        function countdown() {
            var countdownElement = document.getElementById('countdown');
            var interval = setInterval(function() {
                countdownElement.innerHTML = "Resend OTP in " + seconds + " seconds";
                seconds--;
                if (seconds < 0) {
                    clearInterval(interval);
                    countdownElement.innerHTML = "<a id='resend-link' href='user-otp.php?resend=true'>Resend OTP</a>";
                }
            }, 1000);
        }
        // Start the countdown when the page loads
        countdown();
    </script>
</body>
</html>
