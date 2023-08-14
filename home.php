<?php

session_start();

include("connection.php");
include("functions.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

  <!-- Glidejs StyleSheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" />

  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <!-- StyleSheet -->
  <link rel="stylesheet" href="home.css" />
  <title>Snack Box</title>
</head>

<body>

  <div class="adverts">
    <marquee behavior="alternet" direction="left"><span>Get Start your full month snacks only 500 taka</span></marquee>
  </div>

  <div class="advert">
    <form action="#">

      <a class="log" href="login.php"><i class="far fa-user"> LogIn</i></a>


      <form action="#">
        <a class="cart" href=""><i class=""></i>

        </a>
      </form>
    </form>
  </div>



  <!-- Header -->
  <header id="home" class="header">
    <nav class="navigation">
      <div class="nav-center container">
        <a href="home.php" class="logo">
          <h1>SN<span>ACK</span>BOX</h1>
        </a>

        <div class="nav-menu">
          <div class="nav-top">
            <div class="close">
              <i class="fas fa-times"></i>
            </div>
          </div>

          <ul class="nav-list">
            <li class="nav-item">
              <a href="login.php" class="nav-link scroll-link">Join now</a>
            </li>

            <li class="nav-item">
              <a href="#Feature Brands" class="nav-link scroll-link">Feature Brands</a>
            </li>

            <li class="nav-item">
              <a href="#Reffer & earn" class="nav-link scroll-link">Reffer & earn</a>
            </li>

            <li class="nav-item">
              <a href="#Terms and Conditions" class="nav-link scroll-link">Terms and Conditions</a>
            </li>

            <li class="nav-item">
              <a href="#Questions and review" class="nav-link scroll-link">Questions and review</a>
            </li>
          </ul>
        </div>

        <div class="hamburger">
          <i class="fas fa-bars"></i>
        </div>
      </div>
    </nav>
  </header>

  <!--Main -->

  <!--Subscription promotion-->

  <div class="sub-box">
    <img src="./images/banar_1.jpg" alt="">
    <div class="product">
      <span>Free Shipping in Dhaka | No samples</span>
      <h2>GET YOUR FIRST BOX ONLY <br>500 TAKA | 1000 TAKA | 1000++ TAKA</h2>
      <span>Include 20-30 different types of snacks products you can get every month</span>
      <a href="login.php"><b>Subscribe now</b></a>
    </div>
  </div>

  <!-- How to get -->
  <section class="section category">
    <h2 class="title">Here's How To Get It!!!</h2>
    <div class="category-center container">

      <div class="category-box">


        <div class="content">
          <h3>1. Personalize your profile</h2>
        </div>
        <img src="./images/cat1.jpeg" alt="">

      </div>
      <div class="category-box">

        <div class="content">
          <h3>2. Activate your subscription</h2>


        </div>
        <img src="./images/cat2.jfif" alt="">
      </div>

      <div class="category-box">

        <div class="content">
          <h3>3. Receive your snacks products</h2>

        </div>
        <img src="./images/cat3.jpeg" alt="">

      </div>


    </div>
    <div class="subscribe">
      <form action="#">
        <a href="login.php">Subscribe</a>
      </form>
    </div>
  </section>




  <!--join footer section-->

  <div class="joinpeople" >
    <h1 style="color: white;">Join 1,000 people already enjoying Sn<span>ack</span>Box</h1>

    <form action="#">
      <a href="login.php">Join Now</a>
    </form>
  </div>




  <!-- Footer --> 
  <?php include('footer.php');
  ?>

  <!-- End Footer -->



  <!-- Custom Script -->
  <script src="home.js"></script>


</body>

</html>