<?php 

//start session
session_start();


define('SITEURL','http://localhost/hackathon/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','8895');
define('DB_NAME','hackathon');
$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());

?>