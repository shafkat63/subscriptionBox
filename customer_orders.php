<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<?php include("connection.php");
include("functions.php");

if (isset($_POST['updatebtn'])) {
	$id = $_POST['id'];
	$address = $_POST['address'];
	$area = $_POST['area'];



	$query = "UPDATE orders SET o_id='$id',address='$address',area='$area' WHERE o_id='$id' ";
	$query_run = mysqli_query($con, $query);
}
if (isset($_POST['delete_btn'])) {
	$id = $_POST['delete_id'];

	$query = "DELETE FROM orders WHERE o_id='$id' ";
	$query_run = mysqli_query($con, $query);
}
?>
<div class="container-fluid">
	<div class="row">

		<?php include "./templates/sidebar.php"; ?>

		<div class="row">
			<div class="col-10">
				<h2>Customers Orders</h2>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-striped table-sm">
				<thead>
					<tr>

						<th>Order id</th>
						<th>Customer Name</th>
						<th>Shipping Address</th>
						<th>Shipping Area</th>
						<th>Subscribe package</th>
						<th>Order date</th>
						<th></th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="customer_order_list">
					<?php
					$token = $_SESSION['admin_id'];
					$query = "select o.o_id,u.first_name,u.last_name,o.address,o.area,u.subscription,o.time from orders o join users u on o.user_id=u.user_id";
					$result = mysqli_query($con, $query);
					if (mysqli_num_rows($result) > 0) {
						while ($row = mysqli_fetch_array($result)) {

					?>
							<tr>
								<td><?php echo $row["o_id"]; ?></td>
								<td><?php echo $row["first_name"]; ?></td>
								<td><?php echo $row["address"]; ?></td>
								<td><?php echo $row["area"]; ?></td>
								<td><?php echo $row["subscription"]; ?></td>
								<td><?php echo $row["time"]; ?></td>
								<td>
									<form action="customer_orders_edit.php" method="POST">
										<input type="hidden" name="edit_id" value="<?php echo $row['o_id']; ?>">
										<button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
									</form>
								</td>
								<td>
									<form action="customer_orders.php" method="post">
										<input type="hidden" name="delete_id" value="<?php echo $row['o_id']; ?>">
										<button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
									</form>
								</td>
							</tr>
					<?php
						}
					}
					?>
				</tbody>
			</table>
		</div>
		</main>
	</div>
</div>



<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>