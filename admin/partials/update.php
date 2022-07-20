<div class="container">
    <h5>Update admin</h5>

    <br />

    <?php

    //1. Get the id of the selected user
    $id = $_GET['id'];

    //2. create a SQL query to get all the details
    $sql = "SELECT full_name, username FROM tbl_admin WHERE id = $id";

    //3. Execute the query
    $res = mysqli_query($conn, $sql);

    //4. Check whether the query is executed or not
    if ($res == true) {
        # is the data available
        $count = mysqli_num_rows($res);

        # Check if there is data
        if ($count == 1) {
            # Get the details
            //echo "admin available norrea";
            $row = mysqli_fetch_assoc($res);

            $full_name = $row['full_name'];
            $username = $row['username'];
        } else {
            #Redirect to manage-admin page
            header('location:' . SITE_URL . 'admin/manage-admin.php');
        }
    }

    ?>

    <form class="mt-4" action="" method="POST">

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="full_name">
                    Full name
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-control ml-2 mr-2" type="text" name="full_name" placeholder="Full name example" value="<?php echo $full_name; ?>">
            </div>
        </div>

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="username">
                    Username
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-control ml-2 mr-2" type="text" name="username" placeholder="Username example" value="<?php echo $username; ?>">
            </div>
        </div>

        <div class="d-flex justify-content-end mt-2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            </input>

            <input type="submit" class="btn btn-outline-primary" name="submit" value="Update admin">
            </input>
        </div>

    </form>

    </form>
</div>


<?php
//Check wheter the submit button was clicked

if (isset($_POST['submit'])) {
    //echo "button clicked";
    //Get the values from the form

    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //Create a SQL query to update
    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$username' 
    WHERE id = '$id'
    ";

    //Execute the query
    $res = mysqli_query($conn, $sql);

    //Check if the query was executed
    if ($res==true) {
        
        $_SESSION['update'] = "<span class='badge rounded-pill text-bg-info'>Admin Updated Successfully</span>";
        header('location:'.SITE_URL.'admin/manage-admin.php');

    } else {
        $_SESSION['update'] = "<span class='badge rounded-pill text-bg-danger'>Failed to update admin</span>";
        header('location:'.SITE_URL.'admin/manage-admin.php');
    }
}

?>