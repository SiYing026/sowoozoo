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


        <!-- bookinghistory form section -->
        <section class="bookinghistory" id="bookinghistory">
            <div class="content">
                <h1 class="head1">My Booking</h1>
                <?php
                    ini_set('display_errors', 0);
                    error_reporting(E_ERROR | E_WARNING | E_PARSE); 

                    session_start();

                    $dbc=mysqli_connect("localhost","root","Siyingdb*123");
                    mysqli_select_db($dbc, "sowoozoo");

                    $identifier=$_SESSION['identifier'];

                    if(!empty($_SESSION['identifier'])){
                        $query="SELECT * FROM booking WHERE email='".$_SESSION["identifier"]."' ";
                        
                        if($r = mysqli_query($dbc, $query ) ) {
                            while ($row=mysqli_fetch_array($r)){
                                print "<h3>{$row['name']}</h3>"
                                . "<p><b>Package :</b> {$row['package']}<br>"
                                . "<b>Phone number :</b> {$row['phone']}<br>"
                                . "<b>Date :</b> {$row['date']}<br>"
                                . "<b>Time :</b> {$row['time']}<br>"
                                . "<b>Participants :</b> {$row['participants']}</p>
                                <hr>";
                            }
                        } else{
                                print'<p style="color:red;">Could not retrieve the data because :<br/>' .mysqli_error($dbc).
                                '.</p><p>the query being run was : '.$query.'</p>';
                        }
                        mysqli_close($dbc);
                    }
                    else{
                            echo"<p>Please <a href=\"signin.php\">Sign-in</a> first</p>";
                    }
                ?>


        </section>
        <!-- bookinghistory form section end -->

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
            
            //faqs
            const buttons = document.querySelectorAll('button');

            buttons.forEach( button =>{
                button.addEventListener('click',()=>{
                    const faq = button.nextElementSibling;
                    const icon = button.children[1];

                    faq.classList.toggle('show');
                    icon.classList.toggle('rotate');
                });
            } );
        </script>


    </body>
</html>
