<?php 

//Create constants to store Non-repeating variables
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'food-order');


$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die('connection denied');

$db_select = mysqli_select_db($conn, DB_NAME) or die('Cannot select the db');

echo 'constantes correctamente importadas'
?>
