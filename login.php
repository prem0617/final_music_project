<?php
        include "connection.php";
?>

     

<?php
        if(isset($_POST['snow']))
        {
            $uname=$_POST['uname'];
            $email=$_POST['email'];
            $password=$_POST['password'];

            $selectQuery = " SELECT  `uname`, `email`, `password` FROM `signup_photo` WHERE uname='$uname'  and email='$email' and password='$password'";


            $res = mysqli_query($check,$selectQuery);

            if($res)
            {
                $num=mysqli_num_rows($res);
                
                if($num>0)
                {
                    session_start();
                    $_SESSION['username']=$uname;
                    header('location:index.php');
                }
            }
        }

     ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="sign_up.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Bungee+Outline&family=Londrina+Outline&family=Protest+Strike&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>


    <!-- FORM -->

<?php
   
?>

    <div class="form_conatiner">
        <h1 class="header">Log in</h1>
        <form action="login.php" method="post">
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
            <input type="submit" value="Log-in" class="submit" name="snow">
        </form>
    </div>


     <!--  ----------INSERT DATA--------------  -->

    

</body>
</html>