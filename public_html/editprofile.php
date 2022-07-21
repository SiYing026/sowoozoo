<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>SOWOOZOO - Helicopter Experience</title>
        <link rel="icon" type="images/x-icon" href="images/favicon.png" sizes="32x32">

        <!-- font  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <!-- swiper  -->
        <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
        <!-- css  -->
        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>
        <!-- header section -->
        <header class="header">

            <a href="index1.php" class="logo"><img src="images/favicon.png" alt="">&nbsp;SOWOOZOO</a>

            <nav class="navbar">
                <div id="nav_close" class="fa fa-times"></div>
                <a href="index1.php">Home</a>
                <a href="index1.php#about">About</a>
                <a href="index1.php#gallery">Gallery</a>
                <a href="index1.php#packages">Packages</a>
                <a href="index1.php#clients">Review</a>
                <a href="contactus.php">Contact</a>
                <a href="signin.php">Sign-in</a>
            </nav>

            <div class="icons">
                <div id="menu-btn" class="fas fa-bars"></div>
            </div>

        </header>
        <!-- End header section -->
            
        <!-- editprofile form section -->
        <section class="signin" id="signin">
            <div class="content">
                <h1 class="head1">Edit Profile</h1>
                        
                 <form action="editprofile.php" method="POST">
                    <?php
                    ini_set('display_errors', 0);
                    error_reporting(E_ERROR | E_WARNING | E_PARSE); 

                    session_start();
                    $identifier=$_SESSION['identifier'];

                    if(!empty($_SESSION['identifier'])){
                        
                        if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {

                        $username = $_POST['username'];
                        $firstname = $_POST['firstname'];
                        $lastname = $_POST['lastname'];
                        $password = $_POST['password'];

                        if (!is_numeric($_POST['username'])) {

                            if (isset($_POST['password'])) {

                                $number = preg_match('@[0-9]@', $password);
                                $uppercase = preg_match('@[A-Z]@', $password);
                                $lowercase = preg_match('@[a-z]@', $password);
                                $specialChars = preg_match('@[^\w]@', $password);

                                if (strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                                    echo "<p style='color:red; font-size: 1.5rem;'><strong>Password must be at least 8 characters and contain at least 
                                                                1 uppercase character, <br>1 lowercase character, 1 number and special character.</strong></p>";
                                    $problem = TRUE;
                                }
                            }
                        } else {
                            echo "<p style='color:red; font-size: 1.5rem;'><strong>The username are NOT numeric. Please enter again.</strong></p>";
                            $problem = TRUE;
                        }
                        
                        echo'<input type="submit" name="payment" value="Go to profile" class="btn" onClick="myFunction()"/>';
                            echo'<script>
                                function myFunction() {
                                    window.location.href="myaccount.php";
                                }
                            </script>';
                            
                    } else {
                        echo "<p style='color:red; font-size: 1.5rem;'><strong>Please fill in the blank.</strong></p>";
                        $problem = TRUE;
                    }
                    
                        echo'
                        <form action="editprofile.php" method="POST">
                            <div class="row">
                                <div class="column left">
                                    <input type="text" name="firstname" placeholder="Enter your firstname" class="text"><br>
                                </div>
                                <div class="column right">
                                    <input type="text" name="lastname" placeholder="Enter your lastname" class="text"><br>
                                </div>
                            </div>
                            <input type="text" name="username" placeholder="Enter username" class="text">
                            <input type="password" name="password" placeholder="Enter password" class="text">
                            <input type="submit" value="Save change" class="btn" name="edit" value="true"><br>
                            
                        </form>
                        ';
                    }
                    else{
                            echo"<p>Please <a href=\"signin.php\">Sign-in</a> first</p>";
                    }

                    if(isset($_POST['edit'])){
                        
                            ini_set('display_errors', 0);
                            error_reporting(E_ERROR | E_WARNING | E_PARSE); 
                            
                            $newUsername=$_POST['username'];
                            $newPassword=$_POST['password'];
                            $newFName=$_POST['firstname'];
                            $newLName=$_POST['lastname'];

                            $dbc=mysqli_connect("localhost","root","");
                            mysqli_select_db($dbc, "sowoozoo");

                            $query1="UPDATE user SET username ='$newUsername' WHERE email = '$identifier'";
                            $query2="UPDATE user SET password ='$newPassword' WHERE email = '$identifier'";
                            $query3="UPDATE user SET firstname ='$newFName' WHERE email = '$identifier'";
                            $query4="UPDATE user SET lastname ='$newLName' WHERE email = '$identifier'";

                            if(!empty($_POST['username'])){
                                    mysqli_query($dbc,$query1);
                                    echo"<br>Username updated<br>";
                            }


                            if(!empty($_POST['password'])){
                                    mysqli_query($dbc,$query2);
                                    echo"Password updated<br>";
                            }
                            
                            if(!empty($_POST['firstname'])){
                                    mysqli_query($dbc,$query3);
                                    echo"First name updated<br>";
                            }
                            
                            if(!empty($_POST['lastname'])){
                                    mysqli_query($dbc,$query4);
                                    echo"Last name updated<br>";
                            }
                            
                            if(empty($_SESSION['identifier'])){
                                    echo"Please log in first to edit your profile";
                            }
                    }
                ?>

                            
                 </form>       
            </div>
        </section>
        <!-- edit profile section starts  -->

        <!-- footer section starts  -->

        <section class="footer">

            <div class="box-container">

                <div class="box">
                    <h3>quick links</h3>
                    <a href="index1.php">Home</a>
                    <a href="index1.php#about">About</a>
                    <a href="index1.php#gallery">Gallery</a>
                    <a href="index1.php#packages">Packages</a>
                    <a href="index1.php#clients">Review</a>
                    <a href="contactus.php">Contact</a>
                </div>

                <div class="box">
                    <h3>extra links</h3>
                    <a href="myaccount.php">My Account</a>
                    <a href="mybooking.php">My Booking</a>
                    <a href="faqs.php">FAQs</a>
                    <a href="privacypolicy.php">Privacy Policy</a>
                    <a href="termandcondition.php">Terms and Conditions</a>
                </div>

                <div class="boxspecial">
                    <h3>contact info</h3>
                    <a href="#"><i class="fa fa-phone"></i>+123 5689 2568</a>
                    <a href="#"><i class="fa fa-envelope"></i>enquire@sowoozoo.com</a>
                    <a href="#"><i class="fas fa-map-marked-alt"></i>804, Jalan Kuantan, Titiwangsa, <br>53200 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</a>
                </div>

                <div class="box">
                    <h3>follow us</h3>
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i>Facebook</a>
                    <a href="https://twitter.com/login"><i class="fab fa-twitter"></i>Twitter</a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i>Instagram</a>
                    <a href="https://line.worksmobile.com/jp/en/blog/line-account-login/"><i class="fab fa-line"></i>Line</a>
                </div>

            </div>

        </section>

        <!-- footer section ends -->

        <script>
            let navbar = document.querySelector('.header .navbar');

            document.querySelector('#menu-btn').onclick = () => {
                navbar.classList.add('active');
            };

            document.querySelector('#nav_close').onclick = () => {
                navbar.classList.remove('active');
            };

            //send email
            if(window.history.replaceState){
              window.history.replaceState(null, null, window.location.href);
            }
        </script>

    </body>
</html>
