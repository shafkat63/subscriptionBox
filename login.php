<?php

session_start();
include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['submit'])) {

    //something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];



    if (!empty($email)  && !empty($password) && !is_numeric($email)) {

      //read from database
      $query = "select * from users where email = '$email' and usertype='user' limit 1";
      $result = mysqli_query($con, $query);

      if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {

          $user_data = mysqli_fetch_assoc($result);

          if ($user_data['password'] === $password) {

            $_SESSION['user_id'] = $user_data['user_id'];
            $token = $user_data['user_id'];
            header("Location: subscription.php?token=$token");

            die;
          } else {
            $_SESSION['msg'] = "Incorrect Password!";
          }
        } else {
          $_SESSION['msg'] = "please enter valid email ";
        }
      } else {
        $_SESSION['msg'] = "Wrong Username or Password! ";
      }
    } else {

      $_SESSION['msg'] = "Wrong Username or Password!";
    }
  }


  if (isset($_POST['submit2'])) {

    //something was posted
    $adminemail = $_POST['adminemail'];
    $adminpassword = $_POST['adminpassword'];



    if (!empty($adminemail)  && !empty($adminpassword) && !is_numeric($adminemail)) {

      //read from database
      $query = "select * from users where email = '$adminemail' and usertype='admin' limit 1";
      $result = mysqli_query($con, $query);

      if ($result) {
        if ($result && mysqli_num_rows($result) > 0) {

          $user_data = mysqli_fetch_assoc($result);

          if ($user_data['password'] === $adminpassword) {

            $_SESSION['admin_id'] = $user_data['user_id'];
            $_SESSION['admin_name'] = $user_data['first_name'];
            $token = $_SESSION['admin_id'];

            header("Location: index.php?token=$token");

            die;
          } else {
            $_SESSION['msg2'] = "Incorrect Password!";
          }
        } else {
          $_SESSION['msg2'] = "please enter valid email ";
        }
      } else {
        $_SESSION['msg2'] = "Wrong Username or Password! ";
      }
    } else {

      $_SESSION['msg2'] = "Wrong Username or Password!";
    }
  }
}
session_destroy();
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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />

  <!-- Glidejs StyleSheet -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" />

  <!-- Animate CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <!-- StyleSheet -->
  <link rel="stylesheet" href="login.css" />
  <title>Log In</title>

</head>

<body>

  <div class="adverts">
    <marquee behavior="alternet" direction="left"><span>Get Start your full month snacks only 500 taka</span></marquee>
  </div>

  <div class="advert">

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


  <!--Main Login -->

  <div class="fullpage">
    <div class="wrapper">
      <div class="title-text">
        <div class="title login">
          User Login
        </div>
        <div class="title signup">
          Admin Login
        </div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">User</label>
          <label for="signup" class="slide signup">Admin</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
          <form method="post" class="login">

            <div class="error" style="color:red;font-weight:bold;">
              <?php if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
              }
              ?>
            </div>
            <div class="field">
              <input type="email" name="email" placeholder="Email Address" required>
            </div>

            <div class="field">
              <input type="password" name="password" id="password" placeholder="Password" required>
              <i class="bi bi-eye-slash" id="togglePassword"></i>
            </div>
            <div class="pass-link">
              <a href="forgetpassword.php">Forgot password?</a>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" name="submit" value="Login">
            </div>
            <div class="signup-link">
              Create an account? <a href="signup.php">Signup now</a>
            </div>
          </form>
          <form method="post" class="signup">
            <div class="error" style="color:red;font-weight:bold;">
              <?php if (isset($_SESSION['msg2'])) {
                echo $_SESSION['msg2'];
              }
              ?>
            </div>
            <div class="field">
              <input type="text" name="adminemail" placeholder="Email Address" required>
            </div>
            <div class="field">
              <input type="password" name="adminpassword" id="password" placeholder="Password" required>
              <i class="bi bi-eye-slash" id="togglePassword"></i>
            </div>
            <div class="pass-link">
              <a href="forgetpassword.php">Forgot password?</a>
              <div class="field btn">
                <div class="btn-layer"></div>
                <input type="submit" name="submit2" value="Login">
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>








  <!-- Footer -->
  <?php include('footer.php');
  ?>
  <!-- End Footer -->

  <!-- Custom Script -->
  <script src="login.js"></script>
  <script>
    //toggle password

    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      // toggle the eye / eye slash icon
      this.classList.toggle('bi-eye');
    });
  </script>

</body>

</html>