

<?php
    session_start();
    if(isset($_SESSION['otp']))
    {
        
    echo $_SESSION['otp'];
    }
    else
    {
        echo "asfc";
    }
?>