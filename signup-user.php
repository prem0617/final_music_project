<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup Form</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="style.css">
    <style>

    /* Custom CSS */
    .form-group a {
            display: flex;
            align-items: center;
        }
        .form-group a i {
            margin-right: 10px; /* Adjust this value as needed */
        }
        #p {
            color: black;
            text-align: center;
            padding: 5px;
        }
        body {
            margin: 0;
            padding: 0;
            background-image: url('img/2.jpg'); /* Adjust the path to your background image */
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
        .container {
            
            z-index: 1; /* Place it above the background image */
        }
        #g{
            font-weight:bold;
        }
       
    </style>
</head>
<body>
    
    <div class="container" >
        <div class="row">
            <div class="col-md-4 offset-md-4 form" >
                <form action="signup-user.php" method="POST" autocomplete="" >
                    <h2 class="text-center" id="g">Signup Form</h2>
                    <p class="text-center">It's quick and easy.</p>
                    <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo $name ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirm password" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" type="submit" name="signup" value="Signup">
                    </div>

                    <p id="p">OR</p>

                    <div class="form-group">
                      <a href="auth/google" class="btn btn-danger"><i class="fab fa-google"></i> Signup with Google</a>
    <!-- Replace 'auth/google' with the actual route to handle Google OAuth -->
                  </div>
                  <div class="form-group">
    <a href="auth/facebook" class="btn btn-primary"><i class="fab fa-facebook-f"></i> Signup with Facebook</a>
    <!-- Replace 'auth/facebook' with the actual route to handle Facebook OAuth -->
                  </div>



                    <div class="link login-link text-center">Already a member? <a href="login-user.php">Login here</a></div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>