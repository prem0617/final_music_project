
 <!--  ----------INSERT DATA--------------  -->

 <?php
        include "connection.php";

        ?>

     <?php

        if(isset($_FILES['photo']))
        {
            $insert=0;
            $name=$_POST['fname'];
            $uname=$_POST['uname'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            $cpassword=$_POST['cpassword'];
            $file = $_FILES['photo'];

            $fileName = $file['name'];
            $filePath = $file['tmp_name'];
            $fileErr = $file['error'];


            if($password != $cpassword)
            {
                $fileErr=1;
                ?>
                    <script>
                        alert("Password and confirm password are not same")
                    </script>
                <?php
            }

            if (!preg_match ("/^[a-zA-z]*$/", $name) ) 
            {  
                
                $fileErr=1;
                ?>
                <script>
                    alert("Only character are allowed in name")
                </script>
            <?php
            }

            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
            if (!preg_match ($pattern, $email) ){  
                
                $fileErr=1;
                ?>
                <script>
                    alert("Invalid Email")
                </script>
            <?php  
            }  

            if($fileErr == 0)
            {
                $destPath = "upload/".$fileName;
                move_uploaded_file($filePath,$destPath);

                $insertData = " INSERT INTO `signup_photo`(`fname`, `uname`, `email`, `password`, `confirm password`, `photo`) VALUES ('$name','$uname','$email','$password','$cpassword','$destPath') ";

                $result = mysqli_query($check,$insertData);
                if($result)
            {
                $insert=1;
                header('location:login.php');
            }
            }

            

        }
     ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="sign_up.css">


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Outline&family=Londrina+Outline&family=Protest+Strike&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>

<?php
     
?>
    <!-- FORM VALIDATION -->
    <!-- FORM -->

    <div class="form_conatiner">
        <h1 class="header">Signup</h1>
        <form action="sign_up.php" method="post" enctype="multipart/form-data">
            <label for="fname"></label>
            <input type="text" id="fname" name="fname" placeholder="First Name" autocomplete="off">
                <br>
                <br>
            <label for="uname"></label>
            <input type="text" id="uname" name="uname" placeholder="Username" autocomplete="off">
                <br>
                <br>
            <label for="email"></label>
            <input type="text" id="email" name="email" placeholder="Email" autocomplete="off">
                <br>
                <br>
            <label for="password"></label>
            <input type="password" id="password" name="password" placeholder="Password" autocomplete="off">
                <br>
                <br>
            <label for="cpassword"></label>
            <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" autocomplete="off">
                <br>
                <br>
            <input type="file" name="photo" id="photo">
                <br>
                <br>
            <input type="submit" value="Sign-up" class="submit" name="snow">
        </form>
    </div>


    
</body>
</html>