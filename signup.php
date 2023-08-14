<?php
session_start();
global $error;

include("connection.php");
include("functions.php");


if ($_SERVER['REQUEST_METHOD'] == "POST") {


  //something was posted
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $area = $_POST['area'];
  $district = $_POST['district'];
  $contact = $_POST['contact'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $files = $_FILES['file'];
  $file_name = $files['name'];



  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
  $result = mysqli_query($con, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($password === $password2) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) == true) {
      // if user exists
      if ($user['email'] == $email) {
        $error = "!!! This Email Address already Have an Account !!!";
      } else {

        if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($address) && !empty($area) && !empty($contact) && !empty($password) && !is_numeric($first_name) && !is_numeric($last_name) && !is_numeric($email)) {
          //save to database
          $query = "insert into users (usertype,first_name, last_name, email, address, area,district, contact, password,image) values ('user','$first_name','$last_name','$email','$address','$area','$district','$contact','$password','$file_name')";

          mysqli_query($con, $query);

          $_SESSION['msg'] = "Account Created Successfully";
          header("Location: login.php");
          die;
        } else {
          $error = "!!! Please Enter Some Valid Information !!!";
        }
      }
    } else {
      $error = "!!! Invalide Email !!!";
    }
  } else {
    $error = "!!! Password Doesnot Matched !!!";
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
  <link rel="stylesheet" href="signup.css" />
  <title>Sign Up</title>

</head>

<body>

  <div class="adverts">
    <marquee behavior="alternet" direction="left"><span>Get Start your full month snacks only 500 taka</span></marquee>
  </div>

  <div class="advert">
    <form action="#">

      <a class="log" href="login.php"><i class="far fa-user"> LogIn</i></a>


      <form action="#">
        <a class="cart" href="#"></a>
      </form>
    </form>
  </div>



  <!-- Header -->
  <?php include('header.php');
  ?>


  <!--Main Registration Form -->

  <div class="regfullpage">
    <div class="regwrapper">
      <div class="regtitle-text">
        <div class="regtitle login">
          Registration Form
        </div>
      </div>
      <div class="regform-inner">
        <form method="post" class="signup" enctype="multipart/form-data">
          <div class="regfield" style="color:red;font-weight:bold;">
            <?php echo $error; ?>
          </div>
          <div class="regfield">
            <input type="text" name="first_name" placeholder="First Name" required>
          </div>
          <div class="regfield">
            <input type="text" name="last_name" placeholder="Last Name" required>
          </div>
          <div class="regfield">
            <input type="text" name="email" placeholder="Email Address" required>
          </div>
          <div class="regfield">
            <input type="text" name="address" placeholder="Home Address" required>
          </div>
          <div class="regfield">
            <input type="text" name="area" placeholder="Area" required>
          </div>
          <div class="regfield">
            <input type="text" name="district" placeholder="District" required>
          </div>
          <div class="regfield">
            <input type="number" name="contact" placeholder="Contact No" required>
          </div>
          <div class="regfield">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <i class="bi bi-eye-slash" id="togglePassword"></i>

          </div>
          <div class="regfield">
            <input type="password" name="password2" id="password2" placeholder="Confirm Password" required>
            <i class="bi bi-eye-slash" id="togglePassword2"></i>
          </div>
          <div class="regfield">
            <input type="file" name="file" required>
          </div>


          <div class="regfield btn">
            <div class="regbtn-layer"></div>
            <input type="submit" value="Signup">
          </div>
          <div class="reglogin-link">
            Have an account? <a href="login.php"> Log In --></a>
          </div>

        </form>

      </div>

    </div>
  </div>








  <!-- Footer -->
  <?php include('footer.php');
  ?>
  <!-- End Footer -->

  <!-- Custom Script -->
  <script src="signup.js"></script>


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
    const togglePassword2 = document.querySelector('#togglePassword2');
    const password2 = document.querySelector('#password2');

    togglePassword2.addEventListener('click', function(e) {
      // toggle the type attribute
      const type = password2.getAttribute('type') === 'password' ? 'text' : 'password';
      password2.setAttribute('type', type);
      // toggle the eye / eye slash icon
      this.classList.toggle('bi-eye');
    });
  </script>

</body>

</html>