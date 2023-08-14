<?php
session_start();
include("connection.php");
include("functions.php");



if (isset($_GET["action"])) {


	if ($_GET["action"] == "delete") {
		foreach ($_SESSION["shopping_cart"] as $keys => $values) {
			if ($values["item_id"] == $_GET["p_id"]) {
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="cart.php?token=<?php echo $_GET["token"]; ?>"</script>';
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

	<!-- Glidejs StyleSheet -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css" />

	<!-- Animate CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
	<!-- StyleSheet -->
	<link rel="stylesheet" href="cart.css" />
	<title>cart</title>
</head>

<body>

	<div class="adverts">
		<marquee behavior="alternet" direction="left"><span>Get Start your full month snacks only 500 taka</span></marquee>
	</div>

	<div class="advert">
		<form action="#">

			<a class="log" name="log" href="profile.php?token=<?php echo $_GET["token"]; ?>"><i class="far fa-user" style="color: white;"> profile</i></a>

			<form action="#">
				<a class="cart" href="cart.php?token=<?php echo $_GET["token"]; ?>"><i class="fas fa-shopping-cart" style="color: white;"></i>
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


	<!-- main cart -->

	<!-- monthly Cart Items -->
	<div class="container-md weeklycart-info">

		<h2>Order Details</h2>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tr>
					<th width="40%">Item Name</th>
					<th width="10%">Quantity</th>
					<th width="20%">Price</th>
					<th width="15%">Total</th>
					<th width="5%">Action</th>
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
							<td><a href="cart.php?token=<?php echo $_GET["token"]; ?>& action=delete&p_id=<?php echo $values["item_id"]; ?> "><span class="text-danger">Remove</span></a></td>
						</tr>
					<?php
						$total = $total + ($values["item_quantity"] * $values["item_price"]);
					}

					if ($total > 500) {
						echo '<script>alert("Already Exceeded Subscription Amount.Please Remove Items")</script>';

					?>
						<tr>
							<td colspan="3" align="right" style "color:red;">Total</td>
							<td align="right" style "color:red;"> <?php echo number_format($total, 2); ?> TAKA</td>
							<td></td>

						</tr>

					<?php
					} else {
					?>

						<tr>
							<td colspan="3" align="right">Total</td>
							<td align="right"> <?php echo number_format($total, 2); ?> TAKA</td>

							<td></td>
						</tr>
						<tr>
							<th width="40%"><button><a href="page1.php?token=<?php echo $_GET["token"]; ?>" class="checkout btn">Continue Shopping</a></button></th>
							<th width="10%"></th>
							<th width="20%"></th>
							<th width="15%"><button> <a href="shipping.php?token=<?php echo $_GET["token"]; ?>& action=add&p_id=<?php echo $values["item_id"]; ?>" class="checkout btn">Proceed To Checkout</a></button></th>
							<th width="5%"></th>
						</tr>



				<?php
					}
				}
				?>


			</table>





		</div>
	</div>



	<!-- Footer -->
	<?php include('footer.php');
	?>
	<!-- End Footer -->



	<!-- Custom Script -->
	<script src="cart.js"></script>


</body>

</html>