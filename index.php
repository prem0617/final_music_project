<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Website</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="Images/logorem.png">
  </head>
  <body>
    <section id="home" class="main">
      <div class="hero">
        <div class="navbar">
          <img src="Images/logorem.png" class="logo">
          
          
         <div class="flexHeader">

          <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#about">ABOUT</a></li>
      
            <li><a href="signup-user.php" class="signup">SIGN UP</a></li>
            <li><a href="login-user.php" class="explore">LOG IN</a></li>
          </ul>
          
         </div>
        </div>
        <?php
        session_start();
        // session_destroy();
    if(isset($_SESSION['name']))
    { ?>
          <h1 style="color: white ;font-size:50px; text-align:center"
            ><?php
        
        echo "Welcome ".$_SESSION['name'];
    ?></h1
          ><?php
    }
    else
    {
      echo "Please Login";
    }
?>
        <div class="content">
          <div class="left">
            <h1 class="headerFont">THE <br> RYTHM<br> ROVER</h1>
          </div>
          
          
          
        </div>
        <div class="dm">
               <button>
                <h2>
                 <a href="discover.php">DISCOVER MUSIC</a>
                 </h2>
                </button>
            </div>
    </div>
    </section>

    <section class="about-section" id="about">
        <section class="about-section">
    <div class="container">
        <h2 style="font-size: 60px; font-weight: bolder; text-align: center;">About Us</h2>
        <p>Your Music Streaming Service is more than just a platform for listening to music; it's a community of passionate music lovers coming together to explore, share, and celebrate their love for music. Our team is comprised of dedicated individuals who are deeply committed to providing you with the ultimate music streaming experience.</p><br>
        <p>With an extensive library of millions of songs spanning all genres and eras, we aim to cater to every musical taste and preference. Whether you're into pop, rock, hip-hop, jazz, classical, or something in between, you'll find exactly what you're looking for on Your Music Streaming Service.</p><br>
        <p>But we're not just about quantity; we're also about quality. We partner with top record labels, artists, and producers to ensure that you're always getting the best possible audio experience. From crystal-clear sound to high-definition music videos, we're committed to delivering content that sounds and looks amazing.</p><br>
        
        
    </div>

</section>
  </section>
  <footer>
    
    <section>
        
        <div>
            <span class="getFlex">Get connected with us :</span>
        </div>
    </section>
    
    <section class="footerCenter">
        <div>
            <div class="row">
                <!-- Grid column -->
                <div>
                    <!-- Content -->
                    <h6>RYTHM ROVER</h6>
                    <hr>
                    <p>A dedicated community and music streaming platform of passionate music lovers coming together to explore</p>
                </div>
         
                <div >
                    <br>
                    <h6 style="font-size: 30px;">Useful links</h6>
                    
                    <button style="padding: 5px;background-color: transparent; border: 1px solid white; margin: 5px;"><a style="text-decoration: none; color: white;" href="#!" class="text-white">Your Account</a></button>
                    <button style="padding: 5px;background-color: transparent; border: 1px solid white; margin: 5px;"><a style="text-decoration: none; color: white;" href="#!" class="text-white">Buy Premium</a></button>
                    <button style="padding: 5px;background-color: transparent; border: 1px solid white; margin: 5px;"><a style="text-decoration: none; color: white;" href="#home" class="text-white">Home Page</a></button>
                    <button style="padding: 5px;background-color: transparent; border: 1px solid white; margin: 5px;"><a style="text-decoration: none; color: white;" href="#!" class="text-white">Help</a></button>
                </div>
                <br><br>
                <div >
                    <h3>Contact</h3>
                    <br>
                    <hr>
                    <br>
                    <p><i class="fas fa-envelope mr-3"></i> 22it420@bvmengineering.ac.in <br> 22it415@bvmengineering.ac.in</p>
                    <br>
                    <p><i class="fas fa-home mr-3"></i> VallabhVidyanagar Anand- 388120 <br> <br> Gujarat</p>
                </div>
            </div>
        </div>
    </section>
  
    </div>

</footer>

    
    <script>

    </script>


</body>
</html>