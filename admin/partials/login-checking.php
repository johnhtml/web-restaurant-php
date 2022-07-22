<?php
//Check if the user is logged in
// This is the code to control the authorization level

if (!isset($_SESSION['user'])) {
    //The user is not logged in
    $_SESSION['no-login-message'] = "<span class='badge rounded-pill text-bg-danger'>Please login</span>";
    header('location:' . SITE_URL . 'admin/login.php');
}
?>
