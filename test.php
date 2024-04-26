<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Discover Music</title>
    <link rel="stylesheet" href="discover_threedots.css">
    <link rel="stylesheet" href="profile.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>  

      <div class="grid_container">
        <div class="header_container">
          <div class="navbar">
              <div class="header-right">
                  <div class="hamburger">
                      <div></div>
                      <div></div>
                      <div></div>
                  </div>
              </div>
              <div class="header-left">
                  <nav class="home">
                      <ul>
                          <li><a href="#"><i class="fa-solid fa-house"></i> Home</a></li>
                          <li><a href="#"><i class="fa-solid fa-magnifying-glass"></i> Search</a></li>
                          <li><a href="#"><i class='fab fa-spotify'></i> Your Library</a></li>
                          
                          <li><a href="#"><i class="fa-solid fa-music"></i> Create Playlist</a></li>
                          <li><a href="#"><i class="fa-solid fa-heart"></i> Linked Songs</a></li>
                          <li><a href="#"><i class="fa-solid fa-podcast"></i> Your Episodes</a></li>
                      </ul>
                  </nav>
                  
              </div>
          </div>
          <div class="profile_container">
            <a href="profile.php"><h2 class="user" style="
                position: fixed;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 200px;
                color: white;
                left: 10px;
                bottom: 10px;
                "><i class="fa-solid fa-user"></i>&nbsp;  &nbsp;
              <!-- <?php
                   session_start();
                   if(isset($_SESSION['username']))
                   {
                      echo $_SESSION['username'];
                   }
                   else
                   {
                      echo "Please Login";
                   }
              ?> -->
          </h1></a>
          </div>
        </div>


        <!-- PROFILE -->
            <div class="right_side">
                <div class="header">
                    <div class="header_premium"><a href="#" class="premium">Explore Premium</a></div>
                    <div class="header_premium"><a href="#" class="premium">Visit Github</a></div>
                    <button class="mode dmode">Dark </button>
                    <button class="mode lmode">Light</button>
                  </div>
                  <div class="profile_container">
                    <div class="name_container">
                        <div class="photo">
                        <?php
        
                            include "connection.php";
                            $uname = $_SESSION['username'];
                            $selectQuery = "SELECT `photo` FROM `signup_photo` where uname='$uname' ";
        
                            $result = mysqli_query($check,$selectQuery);
                            $display = mysqli_fetch_array($result);
        
                            if($result)
                            {
                                ?>
                                <img src="<?php echo $display['photo'];?>" alt="" height="200px" width="200px"style="border-radius:200px">
                                <?php
                                }
                                else
                                {
                                   echo "Not Done";
                                }
        
                            ?>
                        </div>
                        <div class="name">
                            <h4 class="pro">Profile</h4>
                            <h1 class="uname">
                                <?php
                                    if(isset($_SESSION['username']))
                                    {
                                        echo $_SESSION['username'];
                                    }
                                    else
                                    {
                                        echo "SD";
                                    }
                                ?>
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        
        </div>
<script>
  hamburger = document.querySelector(".hamburger");
  nav = document.querySelector("nav");
  hamburger.onclick = function() {
      nav.classList.toggle("active");
  }
</script>


</body>
</html>