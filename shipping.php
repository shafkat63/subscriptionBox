<?php
session_start();
include("connection.php");
include("functions.php");



if ($_SERVER['REQUEST_METHOD'] == "POST") {

	$total = 0;
	foreach ($_SESSION["shopping_cart"] as $keys => $values) {

		$itemname = $values["item_name"];
		$itemquatity = $values["item_quantity"];
		$itemprice = $values["item_price"];
		$itemsub = number_format($values["item_quantity"] * $values["item_price"], 2);


		$total = $total + ($values["item_quantity"] * $values["item_price"]);


		$itemtotal = number_format($total, 2);
	}

	$token = $_GET['token'];

	$address = $_POST['address'];
	$area = $_POST['area'];
	$district = $_POST['district'];
	$contact = $_POST['contact'];
	$payment = $_POST['op'];
	$bkashnumber = $_POST['bnum'];
	$transaction = $_POST['bti'];


	$order_query = "SELECT * FROM orders";
	$query = "insert into orders (user_id,address, area,district, contact) values ('$token','$address','$area','$district','$contact')";
	$orderresult = mysqli_query($con, $query);

	$orderquery = "SELECT * FROM orders where user_id='$token' ";
	$odresult = mysqli_query($con, $orderquery);

	if (mysqli_num_rows($odresult) > 0) {
		$userdata = mysqli_fetch_array($odresult);
		$ord_id = $userdata['o_id'];
	}
	$orderid = $ord_id;

	if (!empty($_SESSION["shopping_cart"])) {

		foreach ($_SESSION["shopping_cart"] as $keys => $values) {

			$od_query = "SELECT * FROM orderdetails";


			$product = $values["item_id"];
			$quantity = $values["item_quantity"];


			$odquery = "insert into orderdetails (p_id,o_id,quantity) values ('$product','$orderid','$quantity')";

			$odresult = mysqli_query($con, $odquery);
		}
	}


	$payment_query = "SELECT * FROM payment";
	$paymentquery = "insert into payment (o_id,user_id,pay_type,bkash_number,transaction_id) values ('$orderid','$token','$payment','$bkashnumber','$transaction')";
	$paymentresult = mysqli_query($con, $paymentquery);



	$mail_check_query = "SELECT * FROM users WHERE user_id='$token'";
	$mailresult = mysqli_query($con, $mail_check_query);
	$mailuser = mysqli_num_rows($mailresult);

	// if user exists
	if ($mailuser) {
		$data = mysqli_fetch_array($mailresult);
		$u = $data['first_name'];
		$email = $data['email'];
		$subscribe = $data['subscription'];
		$tok = $data['user_id'];

		// $subject = "SnackBox Order Confirmation";
		// $body = "Hello, $u. Thank You For Your Order
		// 	Please Check your order details
		// 	Your Subscription package: $subscribe TAKA.
		// 	Your Delivery address: $address, $area, $district.
		// 	Phone No: $contact.
		// 	Total Cost of your order: $itemtotal TAKA.
		// 	Your payment status: $payment.
		// 	Your TransectionID: $transaction.
			
		// 	We will delivery your product within 7 days.
			
		// 	Thank You for a member of SnackBox.
			
		// 	Note: Donot worry you can get your money back or get extra product if you order less then your subscription. 
			
		// 		";







		$sender_email = "From: snackbox499@gmail.com";

		mail($email, $subject, $body, $sender_email);
	}
	$query2 = "SELECT * FROM users where user_id= '$token' ";
	$result = mysqli_query($con, $query2);

	if ($result) {
		if ($result && mysqli_num_rows($result) > 0) {

			$user_data = mysqli_fetch_assoc($result);
			$token = $user_data['user_id'];
			header("Location: profile.php?token=$token");
			die;
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

	<!-- Glidejs StyleSheet -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" />

	<!-- Animate CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<!-- StyleSheet -->
	<link rel="stylesheet" href="shipping.css" />
	<title>Shipping page</title>
</head>

<body>

	<div class="adverts">
		<marquee behavior="alternet" direction="left"><span>Get Start your full month snacks only 500 taka</span></marquee>
	</div>

	<div class="advert">
		<form action="#">

			<a class="log" name="log" href="profile.php?token=<?php echo $_GET["token"]; ?>"><i class="far fa-user"> profile</i></a>

			<form action="#">

			</form>
		</form>
	</div>



	<!-- Header -->
	<?php include('header.php');
	?>

	<form method="post">
		<div>

			<?php
			if (isset($_GET['token'])) {
				$token = $_GET['token'];
				$query = "SELECT * FROM users where user_id= '$token'";
				$result = mysqli_query($con, $query);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_array($result)) {
			?>
						<div class="profile-header">
							<div class="profile-nav-info">
								<div class="address">
									<div type="text" class="user-name" name="first_name">Hello, <?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></div>
									<div type="text" class="user2-name" name="last_name">Your Subscription Package is <?php echo $row["subscription"]; ?> taka only. </div>

									<div class="address2">
										<div style="margin-top:2rem; margin-left:2rem"></div> Email: <div type="text" id="state" class="state" name="email"> <?php echo $row["email"]; ?></div>
									</div>
								</div>
							</div>
						</div>

						<div class="middle">

							<h2 class="h3">Delivery Location:</h2>

							Address: <input type="text" id="state" class="state" name="address" required>
							<div style="float:left; margin-right:5rem;"></div> Area: <input type="text" id="state" class="state" name="area" required>
							<div style="float:left"></div> District: <input type="text" id="state" class="state" name="district">
							<div style="margin-top:2rem; margin-right:2rem">Delivery contact:</div> <input type="text" id="state" class="state" name="contact" required>

						</div>

			<?php
					}
				}
			}
			?>


			<div class="table-responsive">
				<h2 class="h3">Item List</h2>
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>

					</tr>
					<?php
					if (!empty($_SESSION["shopping_cart"])) {
						$total = 0;
						foreach ($_SESSION["shopping_cart"] as $keys => $values) {
					?>
							<tr>
								<td><?php echo $values["item_name"]; ?></td>
								<td><?php echo $values["item_quantity"]; ?></td>
								<td> <?php echo $values["item_price"]; ?> TAKA</td>
								<td> <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?> TAKA</td>
							</tr>
						<?php

							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}

						?>
						<tr>
							<td colspan="3" align="right" style "color:red;">Total</td>
							<td align="right" style "color:red;"> <?php echo number_format($total, 2); ?> TAKA</td>


						</tr>
					<?php
					}
					?>
				</table>





			</div>
			<div class="middle">
				<h2 class="h3">Payment</h2>

				<input type="radio" name="op" value="cash on delivery" class="cod" required>Cash On Devlivery
				<input type="radio" name="op" id="op" value="online payment" required>Online Payment



			</div>
			<input type="submit" name="submit" class="submit" value="Confirm Order">
	</form>


	<!-- Footer -->
	<?php include('footer.php');
	?>
	<!-- End Footer -->



	<!-- Custom Script -->
	<script src="shipping.js"></script>


</body>

</html>