<?php


include "connection.php";


session_start();
$name = $_SESSION['name'];

if(isset($_FILES['photo']))
{
    $file = $_FILES['photo'];
    $fileName = $file['name'];
    $filePath = $file['tmp_name'];
    $fileErr = $file['error'];
    if($fileErr == 0)
    {
        $destPath = "upload/".$fileName;
        move_uploaded_file($filePath,$destPath);

        $insertData = " INSERT INTO `finalphoto`(`uname`,`photo`) VALUES ('$name','$destPath') ";

        $result = mysqli_query($con,$insertData);

    }
}

?>

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
                      <li><a href="discover.php" class="headerIcon"><i class="fa-solid fa-house" style="color: red;"></i> Home</a></li>

                    <li><a href="#" class="headerIcon"><i class="fa-solid fa-magnifying-glass" style="color: red;"></i> Search</a></li>

                    <li><a href="#" class="headerIcon"><i class='fab fa-spotify' style="color: red;"></i> Your Library</a></li>

                    <li><a href="#" class="headerIcon"><i class="fa-solid fa-music" style="color: red;"></i> Create Playlist</a></li>

                    <li><a href="#" class="headerIcon"><i class="fa-solid fa-heart" style="color: red;"></i> Linked Songs</a></li>

                    <li><a href="#" class="headerIcon"><i class="fa-solid fa-podcast" style="color: red;"></i> Your Episodes</a></li>
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
                ">&nbsp;  &nbsp;
              <?php
                   if(isset($_SESSION['name']))
                   {
                      echo $_SESSION['name'];
                   }
                   else
                   {
                      echo "Please Login";
                   }
              ?>
          </h1></a>
          </div>
        </div>


        <!-- PROFILE -->
            <div class="right_side">
                <div class="header" style="margin-top:20px;display: flex;margin-right: 30px;margin-top: 20px;justify-content: end;align-items: center;">
                    <div class="header_premium"><a href="#" class="premium" style="color: white;text-decoration: none;border: 1px solid red;padding: 6px;border-radius: 5px;margin: 15px;">Explore Premium</a></div>
                    <div class="header_premium"><a href="#" class="premium" style="color: white;text-decoration: none;border: 1px solid red;padding: 6px;border-radius: 5px;margin: 15px;">Visit Github</a></div>
                    <button class="mode dmode" style="margin: 0px 10px;padding: 5px 10px;border: none; background-color: black;color: white;font-size: 15px; border-radius: 5px;">Dark </button>
                    <button class="mode lmode" style="margin: 0px 10px;padding: 5px 10px;border: none; background-color: white;font-size: 15px;color: black;border-radius: 5px;">Light</button>
                  </div>
                  <div class="profile_container" style="margin-top:15px">
                    <div class="name_container">
                        <div class="photo">
                            
                        <?php
        
                            $uname = $_SESSION['name'];
                            $selectQuery = "SELECT `photo` FROM `finalphoto` where uname='$name'";
        
                            $result = mysqli_query($con,$selectQuery);
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
                            <h2 class="uname" style="font-size:50px;">
                                <?php
                                    if(isset($_SESSION['name']))
                                    {
                                        echo $_SESSION['name'];
                                    }
                                    else
                                    {
                                        echo "Please Login";
                                    }

                                ?>
                            </h2>
           
                <form action=""  method="post" enctype="multipart/form-data">
                    <input type="file" name="photo" id="photo"  style="padding:5px;background-color:#212121;border-none;margin-left:20px">
                    <br>
                    <br>
                    <input type="submit" style="padding:5px;background-color:#212121;border-none;margin-left:20px" value="Upload Photo" class="submit" name="snow">
                </form>
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

<script src="script.js"></script>

</body>
</html>