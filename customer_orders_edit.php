<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<?php include("connection.php");
include("functions.php");
?>
<div class="container-fluid">
	<div class="row">

		<?php include "./templates/sidebar.php"; ?>

		<div class="row">
			<div class="col-10">
				<h2>Customers Orders</h2>
			</div>
		</div>

		<div class="modal-body">
			<?php
			if (isset($_POST['edit_btn'])) {
				$id = $_POST['edit_id'];

				$query = "select o.o_id,u.first_name,u.last_name,o.address,o.area,u.subscription,o.time from orders o join users u on o.user_id=u.user_id where o.o_id='$id'";
				$query_run = mysqli_query($con, $query);


				foreach ($query_run as $row) {
			?>
					<form action="customer_orders.php" method="POST">
						<div class="form-group">
							<input type="hidden" name="id" value="<?php echo $row['o_id'] ?>" class="form-control" placeholder="<?php echo $row['o_id'] ?>">
						</div>


						<div class="form-group">
							<label>Shipping Address</label>
							<input type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control" placeholder="<?php echo $row['address'] ?>">
						</div>
						<div class="form-group">
							<label>Shipping Area</label>
							<input type="text" name="area" value="<?php echo $row['area'] ?>" class="form-control" placeholder="<?php echo $row['area'] ?>">
						</div>

						<div class="modal-footer">

							<a href="customer_orders.php"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button></a>
							<button type="submit" name="updatebtn" class="btn btn-primary">Update</button>

						</div>

					</form>
		</div>
<?php
				}
			}
?>
	</div>
	</main>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="add-product-form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-12">
							<div class="form-group">
								<label>Product Name</label>
								<input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Brand Name</label>
								<select class="form-control brand_list" name="brand_id">
									<option value="">Select Brand</option>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Category Name</label>
								<select class="form-control category_list" name="category_id">
									<option value="">Select Category</option>
								</select>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Product Description</label>
								<textarea class="form-control" name="product_desc" placeholder="Enter product desc"></textarea>
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Product Price</label>
								<input type="number" name="product_price" class="form-control" placeholder="Enter Product Price">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
								<input type="text" name="product_keywords" class="form-control" placeholder="Enter Product Keywords">
							</div>
						</div>
						<div class="col-12">
							<div class="form-group">
								<label>Product Image <small>(format: jpg, jpeg, png)</small></label>
								<input type="file" name="product_image" class="form-control">
							</div>
						</div>
						<input type="hidden" name="add_product" value="1">
						<div class="col-12">
							<button type="button" class="btn btn-primary add-product">Add Product</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>