<?php
//Include constants.php to get the SITE_URL
include('../config/constants.php');

//1. Destroy the Session
session_destroy();//also destroy the username


//2. Redirect
header('location:'.SITE_URL.'admin/login.php');
?>
