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
  <link rel="stylesheet" href="product.css" />
  <title> Product</title>
</head>

<body>




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
              <a href="unsubscribe.php?token=<?php echo $_GET["token"]; ?>" class="nav-link scroll-link"> Subscription</a>
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



  <!-- weekly blog -->
  <section class="section blog" id="blog">
    <div class="title-container">
      <div class="section-titles">
        <div class="section-title active">
          <h2 class="title"><span>-----------</span> PLEASE CHOOSE A CATAGORY! <span>-----------</span></h2>

          <h1 class="primary-title"> SNACK BOX FOR MONTHLY </h1>
        </div>
      </div>
    </div>

    <div class="blog-container container">
      <div class="glide" id="glide1">
        <div class="glide__track" data-glide-el="track">
          <ul class="glide__slides">
            <li class="glide__slide">
              <div class="blog-card">
                <div class="card-header">
                  <img src="./images/32.jpg" alt="">
                </div>
                <div class="card-footer">
                  <h3>price: 60 TAKA</h3>
                  <span>Details</span>
                  <p>Origin: Bangladesh<br> Manufacturer: Cocola food products Ltd.</p>

                </div>
              </div>
            </li>
            <li class="glide__slide">
              <div class="blog-card">
                <div class="card-header">
                  <img src="./images/2.jpeg" alt="">
                </div>
                <div class="card-footer">
                  <h3>Price:135 TAKA</h3>
                  <span>Details</span>
                  <p>Origin: Bangladesh<br>Manufacturer: Nestle Food Bangladesh Ltd.</p>

                </div>
              </div>
            </li>
            <li class="glide__slide">
              <div class="blog-card">
                <div class="card-header">
                  <img src="./images/7.jpeg" alt="">
                </div>
                <div class="card-footer">
                  <h3>Price: 80 TAKA</h3>
                  <span>Details</span>
                  <p>Origin: Bangladesh<br>Manufacturer: Bashundhara Bangladesh Ltd.</p>

                </div>
              </div>
            </li>
            <li class="glide__slide">
              <div class="blog-card">
                <div class="card-header">
                  <img src="./images/9.jpg" alt="">
                </div>
                <div class="card-footer">
                  <h3>Price: 36 TAKA</h3>
                  <span>Details</span>
                  <p>Origin: Bangladesh<br>Manufacturer: Unilever Bangladesh Limited.</p>

                </div>
              </div>
            </li>
            <li class="glide__slide">
              <div class="blog-card">
                <div class="card-header">
                  <img src="./images/8.jfif" alt="">
                </div>
                <div class="card-footer">
                  <h3>Price: 65 TAKA </h3>
                  <span>Details</span>
                  <p>Origin: Bangladesh<br>Manufacturer: Bashundhara Bangladesh Ltd.</p>

                </div>
              </div>
            </li>

          </ul>
          <a class="quiz" href="page1.php?token=<?php echo $_GET["token"]; ?>">SELECT PRODUCTS</a>

        </div>

        <!-- Arrows -->
        <div class="glide__arrows" data-glide-el="controls">
          <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-arrow-left"></i></button>
          <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-arrow-right"></i></button>
        </div>
      </div>
    </div>
  </section>




  <!-- Arrows -->
  <div class="glide__arrows" data-glide-el="controls">
    <button class="glide__arrow glide__arrow--left" data-glide-dir="<"><i class="fas fa-arrow-left"></i></button>
    <button class="glide__arrow glide__arrow--right" data-glide-dir=">"><i class="fas fa-arrow-right"></i></button>
  </div>
  </div>
  </div>
  </section>


  <!-- Footer -->
  <?php include('footer.php');
  ?>
  <!-- End Footer -->

  <!-- Glidejs Script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>

  <!-- Custom Script -->
  <script src="product.js"></script>



</body>

</html>