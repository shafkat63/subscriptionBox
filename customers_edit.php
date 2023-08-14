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
                <h2>Customers</h2>
            </div>
        </div>

        <div class="modal-body">
            <?php
            if (isset($_POST['edit_btn'])) {
                $id = $_POST['edit_id'];

                $query = "SELECT * FROM users WHERE user_id= '$id' ";
                $query_run = mysqli_query($con, $query);


                foreach ($query_run as $row) {
            ?>
                    <form action="customers.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $row['user_id'] ?>" class="form-control" placeholder="<?php echo $row['user_id'] ?>">
                        </div>
                        <div class="form-group">
                            <label> first_name </label>
                            <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>" class="form-control" placeholder="<?php echo $row['first_name'] ?> <?php echo $row['first_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label> last_name </label>
                            <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>" class="form-control" placeholder="<?php echo $row['last_name'] ?> <?php echo $row['last_name'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?php echo $row['email'] ?>" class="form-control" placeholder="<?php echo $row['email'] ?>">
                        </div>

                        <div class="form-group">
                            <label>Mobile No</label>
                            <input type="text" name="contact" value="<?php echo $row['contact'] ?>" class="form-control" placeholder="<?php echo $row['contact'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="<?php echo $row['address'] ?>" class="form-control" placeholder="<?php echo $row['address'] ?>">
                        </div>
                        <div class="form-group">
                            <label>Area</label>
                            <input type="text" name="area" value="<?php echo $row['area'] ?>" class="form-control" placeholder="<?php echo $row['area'] ?>">
                        </div>
                        <div class="form-group">
                            <label>District</label>
                            <input type="text" name="district" value="<?php echo $row['district'] ?>" class="form-control" placeholder="<?php echo $row['district'] ?>">
                        </div>
                        <div class="modal-footer">

                            <a href="customers.php"><button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button></a>
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




<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>