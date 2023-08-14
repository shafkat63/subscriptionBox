<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "snackbox");

if (isset($_GET['token'])) {
  $token = $_GET['token'];
  if ($_SERVER['REQUEST_METHOD'] == "POST") {

    //something was posted
    $files = $_FILES['file'];
    $file_name = $files['name'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    $district = $_POST['district'];
    $contact = $_POST['contact'];
    $password = $_POST['password'];


    if (!empty($file_name)) {
      $query2 = "update users set  image='$file_name' where user_id= '$token' ";
      $iquery2 = mysqli_query($connect, $query2);
    }
    if (!empty($first_name)) {
      $query2 = "update users set  first_name='$first_name' where user_id= '$token' ";
      $iquery2 = mysqli_query($connect, $query2);
    }
    if (!empty($last_name)) {
      $query2 = "update users set  last_name='$last_name' where user_id= '$token' ";
      $iquery2 = mysqli_query($connect, $query2);
    }

    if (!empty($address)) {
      $query2 = "update users set  address='$address' where user_id= '$token' ";
      $iquery2 = mysqli_query($connect, $query2);
    }
    if (!empty($area)) {
      $query2 = "update users set  area='$area' where user_id= '$token' ";
      $iquery2 = mysqli_query($connect, $query2);
    }
    if (!empty($district)) {
      $query2 = "update users set  district='$district' where user_id= '$token' ";
      $iquery2 = mysqli_query($connect, $query2);
    }
    if (!empty($contact)) {
      $query2 = "update users set  contact='$contact' where user_id= '$token' ";
      $iquery2 = mysqli_query($connect, $query2);
    }
    if (!empty($password)) {

      $query2 = "update users set  password='$password' where user_id= '$token' ";
      $iquery2 = mysqli_query($connect, $query2);
    }

    $query = "SELECT * FROM users where user_id= '$token' ";
    $result = mysqli_query($connect, $query);

    if ($result) {
      if ($result && mysqli_num_rows($result) > 0) {

        $user_data = mysqli_fetch_assoc($result);
        $token = $user_data['user_id'];
        header("Location: profile.php?token=$token");
        die;
      }
    }
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
  <link rel="stylesheet" href="editprofile.css" />
  <title>User Profile</title>
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
  <?php include('header.php');
  ?>

  <div class="container">
    <?php
    if (isset($_GET['token'])) {
      $token = $_GET['token'];
      $query = "SELECT * FROM users where user_id= '$token'";
      $result = mysqli_query($connect, $query);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
    ?>
          <form method="POST" enctype="multipart/form-data">
            <div>
              <div class="profile-header">
                <div class="profile-img">
                  <img src="images/avatar.png" width="200">
                  <div>
                    <input type="file" name="file" style="padding-top:16rem;padding-left:3rem;">
                  </div>



                </div>
                <div class="profile-nav-info">
                  <div class="address">
                    <div style="margin-top:2rem; margin-right:4rem">Name:</div>
                    <input type="text" class="user-name" name="first_name" placeholder="<?php echo $row["first_name"]; ?>">
                    <input type="text" class="user2-name" name="last_name" placeholder="<?php echo $row["last_name"]; ?>">
                  </div>
                  <div class="address">
                    <div style="margin-top:2rem; margin-right:2rem">Location:</div> <input type="text" id="state" class="state" name="area" placeholder="<?php echo $row["area"]; ?>">

                    <input type="text" id="country" class="country" name="district" placeholder="<?php echo $row["district"]; ?>">
                  </div>
                </div>
              </div>

              <div class="main-bd">
                <div class="left-side">
                  <div class="profile-side">

                    <i class="fa fa-phone"></i><input type="text" name="contact" class="mobile-no" placeholder="<?php echo $row["contact"]; ?>">
                    <p class="user-mail"><i class="fa fa-envelope"></i> <?php echo $row["email"]; ?></p>
                    <i class="fa fa-key"></i> <input type="text" name="password" class="mobile-no" placeholder="Change Password">
                    <div class="user-bio">
                      <h3>Home Address</h3>
                      <p class="bio">
                        <i class="fa fa-home"></i><input type="text" name="address" class="mobile-no" placeholder="<?php echo $row["address"]; ?>">
                      </p>

                    </div>
                    <div class="profile-btn">
                      <a href="profile.php?token=<?php echo $_GET["token"]; ?>" class="chatbtn" id="chatBtn"> Back</a>
                      <input type="submit" class="createbtn" id="Create-post" value="Submit">
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </form>
    <?php
        }
      }
    }
    ?>
  </div>


  <!-- Footer -->
  <?php include('footer.php');
  ?>
  <!-- End Footer -->



  <!-- Custom Script -->
  <script src="editprofile.js"></script>

</body>

</html>