<?php
session_start();
include("connection.php");
include("functions.php");
if (!isset($_SESSION['admin_id'])) {
  $token = $_SESSION['admin_id'];
  header("location:index.php?token=$token");
}

include "./templates/top.php";

?>

<?php include "./templates/navbar.php"; ?>

<div class="container-fluid">
  <div class="row">

    <?php include "./templates/sidebar.php"; ?>

    <!-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> -->

    <h2>Other Admins</h2>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>contact</th>
            <th>date</th>
          </tr>
        </thead>
        <tbody id="admin_list">
          <?php
          $token = $_SESSION['admin_id'];
          $query = "SELECT * FROM users where user_id='$token' and usertype='admin'";
          $result = mysqli_query($con, $query);
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {

          ?>
              <tr>
                <td><?php echo $row["user_id"]; ?></td>
                <td><?php echo $row["first_name"]; ?> <?php echo $row["last_name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["contact"]; ?></td>
                <td><?php echo $row["date"]; ?></td>


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

<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/admin.js"></script>