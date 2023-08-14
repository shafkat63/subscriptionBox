<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<?php
include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  if (isset($_POST['submit'])) {

    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];
    $files = $_FILES['file'];
    $product_image = $files['name'];



    $query = "insert into product (name,catagory, details, price, image) values ('$product_name','$category_id','$product_desc','$product_price','$product_image')";

    $result = mysqli_query($con, $query);
  }
  if (isset($_POST['updatebtn'])) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $catagory = $_POST['catagory'];
    $details = $_POST['details'];


    $query = "UPDATE product SET p_id='$id',name='$name', price='$price',catagory='$catagory',
    details='$details' WHERE p_id='$id' ";
    $query_run = mysqli_query($con, $query);
  }
  if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];

    $query = "DELETE FROM product WHERE p_id='$id' ";
    $query_run = mysqli_query($con, $query);
  }
}




?>
<div class="container-fluid">
  <div class="row">

    <?php include "./templates/sidebar.php"; ?>

    <div class="row">
      <div class="col-10">
        <h2>Product List</h2>
      </div>
      <div class="col-2">
        <a href="#" data-toggle="modal" data-target="#add_product_modal" class="btn btn-primary btn-sm">Add Product</a>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Category</th>
            <th>Description</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="product_list">
          <?php
          $token = $_SESSION['admin_id'];
          $query = "SELECT * FROM product";
          $result = mysqli_query($con, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

          ?>
              <tr>
                <td><?php echo $row["p_id"]; ?></td>
                <td><?php echo $row["name"]; ?></td>
                <td><img src="images/<?php echo $row["image"]; ?>" width="100"></td>
                <td><?php echo $row["price"]; ?></td>
                <td><?php echo $row["catagory"]; ?></td>
                <td><?php echo $row["details"]; ?></td>
                <td>
                  <form action="products_edit.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $row['p_id']; ?>">
                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                  </form>
                </td>
                <td>
                  <form action="products.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['p_id']; ?>">
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



<!-- Add Product Modal start -->
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

        <div class="row">
          <form id="add-product-form" method="post" enctype="multipart/form-data">
            <div class="col-12">
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name" required>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Category Name</label>
                <select class="form-control category_list" name="category_id" required>
                  <option value="">Select Catagory</option>
                  <option value="monthly box">monthly box</option>
                  <option value="box1">box1</option>
                  <option value="box2">box2</option>
                  <option value="box3">box3</option>
                  <option value="box4">box4</option>
                  <option value="box5">box5</option>

                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="product_desc" placeholder="Enter product desc" required></textarea>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Product Price</label>
                <input type="number" name="product_price" class="form-control" placeholder="Enter Product Price" required>
              </div>
            </div>

            <div class="col-12">
              <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="file" class="form-control" required>
              </div>
            </div>
            <div class="col-12">
              <input type="submit" name="submit" class="btn btn-primary add-product" value="Add Product">
            </div>
          </form>
        </div>


      </div>
    </div>
  </div>
</div>
<!-- Add Product Modal end -->

<!-- Edit Product Modal start -->
<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-product-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="e_product_name" class="form-control" placeholder="Enter Product Name">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Brand Name</label>
                <select class="form-control brand_list" name="e_brand_id">
                  <option value="">Select Brand</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Category Name</label>
                <select class="form-control category_list" name="e_category_id">
                  <option value="">Select Category</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Description</label>
                <textarea class="form-control" name="e_product_desc" placeholder="Enter product desc"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Qty</label>
                <input type="number" name="e_product_qty" class="form-control" placeholder="Enter Product Quantity">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Price</label>
                <input type="number" name="e_product_price" class="form-control" placeholder="Enter Product Price">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
                <input type="text" name="e_product_keywords" class="form-control" placeholder="Enter Product Keywords">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                <input type="file" name="e_product_image" class="form-control">
                <img src="../product_images/1.0x0.jpg" class="img-fluid" width="50">
              </div>
            </div>
            <input type="hidden" name="pid">
            <input type="hidden" name="edit_product" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary submit-edit-product">Add Product</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Product Modal end -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/products.js"></script>