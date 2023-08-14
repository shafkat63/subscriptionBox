
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
  <link rel="stylesheet" href="forgetpassword.css" />
  <title>Forget Password</title>
  
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

  
  <!--Main forget password Form -->
  
  <div class="regfullpage">
      <div class="regwrapper">
         <div class="regtitle-text">
            <div class="regtitle login">
               Forgot Password
            </div>
         </div>
		 <div class="reglogin-link">
                     <h3><br><br>Please Enter Your Email</h3>
                  </div>
            <div class="regform-inner">
               <form method="post" class="signup">
			   <div class="regfield" style="color:red;font-weight:bold;">
                     <?php if(isset($_SESSION['msg2'])){
						 echo $_SESSION['msg2'];
						 }?>
                  </div>
			  
                  <div class="regfield">
                     <input type="text" name="email" placeholder="Email Address" required>
                  </div>
           
                  <div class="regfield btn">
                     <div class="regbtn-layer"></div>
                     <input type="submit" value="Send Email">
                  </div>
                  
               </form>
              
            </div>
         
      </div>
	  </div>
	  </div>
	
	
	
	
	
  
  
  
    <!-- Footer -->
    <?php include('footer.php');
  ?>
  <!-- End Footer -->
  
   <!-- Custom Script -->
  <script src="forgetpassword.js"></script>
  
  </body>
  </html>