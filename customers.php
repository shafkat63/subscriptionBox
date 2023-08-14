<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<?php include("connection.php");
include("functions.php");

if (isset($_POST['updatebtn'])) {

  $id = $_POST['id'];
  $Fname = $_POST['first_name'];
  $Lname = $_POST['last_name'];
  $email = $_POST['email'];
  //$password = md5($_POST['password']);
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $area = $_POST['area'];
  $district = $_POST['district'];

  if (!empty($Fname)) {
    $query = "UPDATE users SET user_id='$id',first_name='$Fname' WHERE user_id='$id' ";
    $query_run = mysqli_query($con, $query);
  }


  if (!empty($Lname)) {
    $query = "UPDATE users SET user_id='$id',last_name='$Lname' WHERE user_id='$id' ";
    $query_run = mysqli_query($con, $query);
  }



  if (!empty($email)) {
    $query = "UPDATE users SET user_id='$id', email='$email' WHERE user_id='$id' ";
    $query_run = mysqli_query($con, $query);
  }

  if (!empty($contact)) {
    $query = "UPDATE users SET user_id='$id',contact='$contact' WHERE user_id='$id' ";
    $query_run = mysqli_query($con, $query);
  }
  if (!empty($address)) {
    $query = "UPDATE users SET user_id='$id',address='$address' WHERE user_id='$id' ";
    $query_run = mysqli_query($con, $query);
  }
  if (!empty($area)) {
    $query = "UPDATE users SET user_id='$id',area='$area' WHERE user_id='$id' ";
    $query_run = mysqli_query($con, $query);
  }
  if (!empty($district)) {
    $query = "UPDATE users SET user_id='$id', district='$district' WHERE user_id='$id' ";
    $query_run = mysqli_query($con, $query);
  }
}
if (isset($_POST['delete_btn'])) {
  $id = $_POST['delete_id'];

  $query = "DELETE FROM users WHERE user_id='$id' ";
  $query_run = mysqli_query($con, $query);
}
?>
<div class="container-fluid">
  <div class="row">

    <?php include "./templates/sidebar.php"; ?>

    <div class="row">
      <div class="col-10">
        <h2>Customers</h2>
      </div>
    </div>

    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Image</th>
            <th>Email</th>
            <th>Password</th>
            <th>Mobile No</th>
            <th>Address</th>
            <th>Area</th>
            <th>District</th>
            <th>Subscription</th>
            <th>Date</th>
            <th></th>
            <th>Action</th>
          </tr>

        </thead>
        <tbody id="customer_list">
          <?php

          $query = "SELECT * FROM users where usertype='user'";
          $result = mysqli_query($con, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

          ?>
              <tr>
                <td><?php echo $row["user_id"]; ?></td>
                <td><?php echo $row["first_name"]; ?></td>
                <td><img src="images/<?php echo $row["image"]; ?>" width="100"></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["password"]; ?></td>
                <td><?php echo $row["contact"]; ?></td>
                <td><?php echo $row["address"]; ?></td>
                <td><?php echo $row["area"]; ?></td>
                <td><?php echo $row["district"]; ?></td>
                <td><?php echo $row["subscription"]; ?></td>
                <td><?php echo $row["date"]; ?></td>
                <td>
                  <form action="customers_edit.php" method="POST">
                    <input type="hidden" name="edit_id" value="<?php echo $row['user_id']; ?>">
                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                  </form>
                </td>
                <td>
                  <form action="customers.php" method="post">
                    <input type="hidden" name="delete_id" value="<?php echo $row['user_id']; ?>">
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