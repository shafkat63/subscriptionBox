<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "snackbox");

if (isset($_POST["add_to_cart"])) {

  if (isset($_SESSION["shopping_cart"])) {
    $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
    if (!in_array($_GET["p_id"], $item_array_id)) {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array(
        'item_id'      =>  $_GET["p_id"],
        'item_name'      =>  $_POST["hidden_name"],
        'item_price'    =>  $_POST["hidden_price"],
        'item_details'    =>  $_POST["hidden_details"],
        'item_quantity'    =>  $_POST["quantity"]
      );
      $_SESSION["shopping_cart"][$count] = $item_array;
    } else {
      echo '<script>alert("Item Already Added")</script>';
    }
  } else {
    $item_array = array(
      'item_id'      =>  $_GET["p_id"],
      'item_name'      =>  $_POST["hidden_name"],
      'item_price'    =>  $_POST["hidden_price"],
      'item_details'    =>  $_POST["hidden_details"],
      'item_quantity'    =>  $_POST["quantity"]
    );
    $_SESSION["shopping_cart"][0] = $item_array;
  }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon" />

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700;900&display=swap" rel="stylesheet" />

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

  <!-- Glidejs StyleSheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" />

  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <!-- StyleSheet -->
  <link rel="stylesheet" href="page2.css" />
  <title>Page 2</title>
</head>

<body>

  <div class="adverts">
    <marquee behavior="alternet" direction="left"><span>Get Start your full month snacks only 500 taka</span></marquee>
  </div>

  <div class="advert">
    <form action="#">

      <a class="log" name="log" href="profile.php?token=<?php echo $_GET["token"]; ?>"><i class="far fa-user"> profile</i></a>


      <form action="#">
        <a class="cart" href="cart.php?token=<?php echo $_GET["token"]; ?>"><i class="fas fa-shopping-cart"></i>
          <?php
          if (isset($_SESSION['shopping_cart'])) {
            $count = count($_SESSION['shopping_cart']);
            echo "$count";
          } else {
            echo "0";
          }
          ?>
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

  <div class="weekheader">

    <h1>SNACK BOX PERSONALIZATION SURVEY</h1>
  </div>

  <div class="weekheader-2">

    <h2> PLEASE SELECT YOUR FAVOURITE SNACKS FOR MONTH</h2>

    <form action="" Method="POST" class="search-box-container">
      <input type="text" name="search" class="search-box" placeholder="search here...">
      <label><button type="text" name="searchSubmit" class="fas fa-search"></button></label>
    </form>

  </div>


  <?php
  $query = "SELECT * FROM product where catagory='monthly box' ORDER BY p_id ASC limit 12,9";
  $result = mysqli_query($connect, $query);
  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
  ?>


      <!-- All Products -->
      <section class="section all-products" id="products">




        <div class="week2product">

          <div class="col-md-4">
            <form method="post" action="page2.php?token=<?php echo $_GET["token"]; ?>& action= add&p_id=<?php echo $row["p_id"]; ?>">
              <div class="week2product-header">
                <img src="images/<?php echo $row["image"]; ?>">
              </div>
              <div class="week2product-footer">
                <h3><?php echo $row["name"]; ?> </h3>
                </a>

                <h4 class="week2price"><?php echo $row["price"]; ?>TAKA</h4>
                <p class="week2details">Details: <?php echo $row["details"]; ?> </p>
                <input type="number" min="1" max="1000" name="quantity" value="1" class="inbox" />

                <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

                <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                <input type="hidden" name="hidden_details" value="<?php echo $row["details"]; ?>" />

                <input style=" margin:.5rem;" type="submit" name="add_to_cart" class="week2btn" value="Add to Cart" />
              </div>
            </form>

          </div>

        </div>



      </section>
  <?php
    }
  }
  ?>



  <section class="pagination">
    <div class=" container">
      <button><a href="page1.php?token=<?php echo $_GET["token"]; ?>">1</a></button>
      <button><a href="page2.php?token=<?php echo $_GET["token"]; ?>">2</a></button>
      <button><a href="page3.php?token=<?php echo $_GET["token"]; ?>">3</a></button>
      <button><a href="page4.php?token=<?php echo $_GET["token"]; ?>">4</a></button>
      <button><a href="page3.php?token=<?php echo $_GET["token"]; ?>"><i class='bx bx-right-arrow-alt'></i></a></button>
    </div>
  </section>









  <!-- Footer -->
  <?php include('footer.php');
  ?>
  <!-- End Footer -->



  <!-- Custom Script -->
  <script src="page2.js"></script>


</body>

</html>