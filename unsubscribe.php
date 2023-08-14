<?php

session_start();

include("connection.php");
include("functions.php");

if (isset($_POST['submit'])) {
  if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $query = "SELECT * FROM users where user_id= '$token' ";
    $query2 = "update users set subscription = '0' where user_id= '$token'";
    $result2 = mysqli_query($con, $query2);
    $result = mysqli_query($con, $query);
    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {

        $user_data = mysqli_fetch_assoc($result);
        $token = $user_data['user_id'];
        header("Location: subscription.php?token=$token");

        die;
      }
    }
  }
}

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script type="text/javascript">
    function unsub() {
      var ans = confirm("Are You sure You want to unsubscribe !!");
      if (ans == true) {
        return true;
      } else {
        return false;
      }
      return false;
    }
  </script>
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
  <link rel="stylesheet" href="subscription.css" />
  <title>Subsciption</title>
</head>


<body>
  <div class="adverts">
    <marquee behavior="alternet" direction="left"><span>Get Start your full month snacks only 500 taka</span></marquee>
  </div>

  <div class="advert">
    <form action="#">

      <a class="log" name="log" href="profile.php?token=<?php echo $_GET["token"]; ?>"><i class="far fa-user"> profile</i></a>


      <form action="#">
        <a class="cart" href="#"></a>
      </form>
    </form>
  </div>



  <!-- Header -->
  <?php include('header.php');
  ?>

  <!--Main -->

  <!-- Subscription -->

  <section class="subscription category">

    <h2 class="title"><span>JOIN NOW -----------</span> PLEASE CHOOSE A PLAN ! <span>---------- CHECKOUT</span><br><span> CANCEL ANYTIME AND AUTO RENEW</span></h2>


    <h3 class="heading"> COMPLETE YOUR PERSONALIZATION INFORMATION AND GET YOUR FIRST BOX NOW!!!</H3>
    <div class="category-center ">

      <form method="post" class="subscribe">
        <div class="subscriptionbox">
          <div class="content">
            <h2>MONTHLY SUBSCRIPTION</h2>
            <span><b>---------</b></span>
            <h3> ONLY 500 TAKA</h3>
            <h4><br class="brack">GET YOUR 1ST SNACK BOX <br class="brack">ONLY 500 TAKA</h4>
            <p><br class="brack">10-15 DIFFERENT TYPES OF SNACKS ITEMS <br class="brack"><br> COME WITH SUPER CUTE PACKING<br><br class="brack"> FREE SHIPPING FOR DHAKA</p>

            <input class="input" type="submit" name="submit" onclick="return unsub();" value="UNSUBSCRIBE NOW">
          </div>
        </div>
      </form>


      <form method="post" class="subscribe2">
        <div class="subscriptionbox">
          <div class="content">
            <h2>MONTHLY SUBSCRIPTION</h2>
            <span><b>---------</b></span>
            <h3> ONLY 1000 TAKA</h3>
            <h4><br class="brack">GET YOUR 1ST SNACK BOX <br class="brack">ONLY 1000 TAKA</h4>
            <p><br class="brack">20-25 DIFFERENT TYPES OF SNACKS ITEMS <br><br class="brack"> COME WITH SUPER CUTE PACKING<br><br class="brack"> FREE SHIPPING FOR DHAKA</p>
            <input type="submit2" name="submit" value="SUBSCRIBE NOW">
          </div>
        </div>
      </form>

      <div class="subscriptionbox">
        <div class="content">
          <h2>MONTHLY SUBSCRIPTION</h2>
          <span><b>---------</b></span>
          <h3> ONLY 1000++ TAKA</h3>
          <h4><br class="brack">WANT MORE THEN GET YOUR BOX<br class="brack"> ONLY 1000++ TAKA</h4>
          <p><br class="brack">30++ DIFFERENT TYPES OF SNACKS ITEMS <br><br class="brack"> COME WITH SUPER CUTE PACKING<br><br class="brack"> FREE SHIPPING FOR DHAKA</p>
          <input type="submit2" name="submit" value="SUBSCRIBE NOW">
        </div>
      </div>

    </div>
  </section>


  <!-- Footer -->
  <?php include('footer.php');
  ?>
  <!-- End Footer -->


  <!-- Custom Script -->
  <script src="subscription.js"></script>
</body>

</html>