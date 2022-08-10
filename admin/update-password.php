<!DOCTYPE html>

<?php
include_once("./partials/navbar.php");
?>

<div class="container">

    <h5>Change Password</h5>
    <br />

    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }
    ?>

    <form action="" method="post">

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="current_password">
                    Current password
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-control ml-2 mr-2" type="password" name="current_password" placeholder="Old password">
            </div>
        </div>

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="new_password">
                    New password
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-control ml-2 mr-2" type="password" name="new_password" placeholder="New password">
            </div>
        </div>

        <div class="row mt-2">
            <div class=" col-md-2">
                <label class="form-label" for="confirm_password">
                    Confirm password
                </label>
            </div>
            <div class=" col-md-8">
                <input class="form-control ml-2 mr-2" type="password" name="confirm_password" placeholder="Confirm password">
            </div>
        </div>


        <div class="d-flex justify-content-end mt-2">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            </input>

            <input type="submit" class="btn btn-outline-primary" name="submit" value="Update password">
            </input>
        </div>

    </form>

</div>

<?php

// check if the submit button was clicked
if (isset($_POST['submit'])) {
    //echo "clicked";

    //1. get the data from the form
    $id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //2. check wheter the user with the current id exist or not
    $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

    //execute the query
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if ($res == true) {
        //check if the data is available
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            //user exists and password can be changed
            //echo 'user found';

            //Check wheter the new password and the confirm one match
            if ($new_password === $confirm_password) {
                //Update the password
                $sql2 = "UPDATE tbl_admin SET
                password='$new_password'
                WHERE id=$id
                ";

                //execute the query
                $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

                //check if the query was executed
                if ($res2 == true) {
                    //password was changed                    
                    $_SESSION['change-password'] = "<span class='badge rounded-pill text-bg-info'>The password was changed</span>";
                    //redirect
                    header('location:' . SITE_URL . 'admin/manage-admin.php');
                } else {
                    //password was not changed
                    $_SESSION['change-password'] = "<span class='badge rounded-pill text-bg-danger'>Error: password was not changed</span>";
                    //redirect
                    header('location:' . SITE_URL . 'admin/manage-admin.php');
                }
            } else {
                // redirect to manage adming with error messages
                $_SESSION['pwd-do-not-match'] = "<span class='badge rounded-pill text-bg-danger'>Passwords do not match</span>";
                //redirect
                header('location:' . SITE_URL . 'admin/manage-admin.php');
            }
        } else {
            $_SESSION['user-not-found'] = "<span class='badge rounded-pill text-bg-danger'>Incorrect password</span>";
            //redirect
            header('location:' . SITE_URL . 'admin/manage-admin.php');
        }
    }

    //3. check whether the new password and confirm match or not

    //4. change the password if the requeriments were fulfilled

}

?>

<?php
include_once("./partials/footer.php");
?>
