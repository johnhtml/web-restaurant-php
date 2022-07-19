<?php 
//Start session
session_start();


//Create constants to store Non-repeating variables
define('SITE_URL', 'http://localhost/restaurant/web-design-course-restaurant-master/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die('connection denied');

$db_select = mysqli_select_db($conn, DB_NAME) or die('Cannot select the db');
