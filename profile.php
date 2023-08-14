 <?php
  session_start();
  $connect = mysqli_connect("localhost", "root", "", "snackbox");

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
   <link rel="stylesheet" href="profile.css" />
   <title>User Profile</title>
 </head>

 <body>

   <div class="adverts">
     <marquee behavior="alternet" direction="left"><span>Get Start your full month snacks only 500 taka</span></marquee>
   </div>

   <div class="advert">
     <form action="#">

       <a class="log" href="logout.php"><i class="far fa-user" style="color: Red;"> LogOut</i></a>



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
           <div class="profile-header">
             <div class="profile-img">
               <img src="images/<?php echo $row["image"]; ?>" width="200">
             </div>
             <div class="profile-nav-info">
               <h3 class="user-name"><?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></h3>
               <div class="address">
                 <p id="state" class="state"><?php echo $row["area"]; ?>,</p>
                 <span id="country" class="country"><?php echo $row["district"]; ?>.</span>
               </div>
             </div>
           </div>

           <div class="main-bd">
             <div class="left-side">
               <div class="profile-side">
                 <p class="mobile-no"><i class="fa fa-phone"></i> <?php echo $row["contact"]; ?></p>
                 <p class="user-mail"><i class="fa fa-envelope"></i> <?php echo $row["email"]; ?></p>
                 <div class="user-bio">
                   <h3>Home Address</h3>
                   <p class="bio">
                     <?php echo $row["address"]; ?>
                   </p>
                 </div>
                 <div class="profile-btn">
                   <a href="#"> <button class="chatbtn" id="chatBtn"><i class="fa fa-history"></i> Order History</button></a>
                   <a href="editprofile.php?token=<?php echo $_GET["token"]; ?>"><button class="createbtn" id="Create-post"><i class="fa fa-plus"></i> Edit Profile</button></a>
                 </div>
               </div>

             </div>
           </div>
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
   <script src="profile.js"></script>

 </body>

 </html>