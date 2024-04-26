<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        /* Custom CSS for icon buttons */
        .social-login-btn {
            margin-top: 10px;
            padding:10px;
        }
        .social-login-btn a {
            display: inline-block;
            margin-right: 10px;
            padding: 10px 15px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .google-btn {
            background-color: #DB4437; /* Google Red */
            
        }
        .facebook-btn {
            background-color: #3B5998; /* Facebook Blue */
        }
        body {
            margin: 0;
            padding: 0;
            background-image: url('img/2.jpg'); /* Adjust the path to your background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        #g{
            font-weight:bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form login-form">
                <form action="" method="POST" autocomplete="">
                    <h2 class="text-center" id="g">Login Form</h2>
                    <p class="text-center">Login with your email and password.</p>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required value="">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe" >
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>
                    <div class="link forget-pass text-left"><a href="forgot-password.php">Forgot password?</a></div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="login" value="Login">
                    </div>
                   
                    <div class="link login-link text-center">Not yet a member? <a href="signup-user.php">Signup now</a></div>
                    <!-- Option to resend verification email -->
                    <?php if(isset($errors['email']) && $errors['email'] === "Your email is not verified. Please verify your email first.") { ?>
                        <div class="text-center">
                            <p>Didn't receive the verification email? <a href="resendver.php?email=<?php echo $email; ?>" class="btn btn-link">Resend verification email</a></p>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
