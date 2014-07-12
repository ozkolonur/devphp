<?php
error_reporting(1);
session_start();

$email = $_SESSION['email'];

$db_user="root";
$db_password="";
$db_database="shop";
mysql_connect("localhost",$db_user,$db_password);
mysql_select_db($db_database) or die( "Unable to select database");

$query="DELETE FROM basket WHERE email='".$email."'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
	
mysql_query($query);
mysql_close();


header("Location: http://localhost/shop/basket.php");
?>