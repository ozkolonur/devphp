<?php
error_reporting(1);
$email = $_POST["email"];
$password = $_POST["password"];
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];

$db_user="root";
$db_password="";
$db_database="shop";
mysql_connect("localhost",$db_user,$db_password);
mysql_select_db($db_database) or die( "Unable to select database");
//echo "password=".$password;
$md5_password = md5($password);
//echo "md5_password=".$md5_password;
$query="INSERT INTO user (email, password, first_name, last_name) VALUES ('$email', '$password', '$first_name', '$last_name')";
mysql_query($query);
mysql_close();
?>
<h1>Thank you</h1>
<a href="index.php">Click Here To Sign In</a>
