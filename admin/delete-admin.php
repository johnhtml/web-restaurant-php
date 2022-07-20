<!DOCTYPE html>

<?php
include('../config/constants.php');

//1. get the ID of Admin to be deleted
$id = $_GET['id'];

//2. Create SQL query to Delete Admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Execute the Query
$res = mysqli_query($conn, $sql);

//Check the query execution
if ($res == true) {
    # Query success
    //echo "Admin deleted";

    //Create Session Variable to display message
    $_SESSION['delete'] = "<span class='badge rounded-pill text-bg-info'>Admin deleted Successfully</span>";
    header('location:' . SITE_URL . 'admin/manage-admin.php');
} else {
    # Query success
    //echo "Failed to delete admin";

    $_SESSION['delete'] = "<span class='badge rounded-pill text-bg-danger'>Failed to delete admin. Please try again later</span>";
    header('location:' . SITE_URL . 'admin/manage-admin.php');
}

//3. Redirect to Manage Admin page with message, i.e. success or error


?>