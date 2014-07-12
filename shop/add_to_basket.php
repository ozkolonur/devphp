<?php
error_reporting(1);
$product_id = $_POST["product_id"];
$email = $_POST["email"];

$db_user="root";
$db_password="";
$db_database="shop";
mysql_connect("localhost",$db_user,$db_password);
mysql_select_db($db_database) or die( "Unable to select database");

$query="SELECT * FROM basket WHERE email='".$email."' AND product_id='".$product_id."'";
$result = mysql_query($query);
$row = mysql_fetch_array($result);

if ($row['count'] == 0)
	$query="INSERT INTO basket (email, product_id, count) VALUES ('$email', '$product_id', '1')";
else
	$query="UPDATE basket SET count='".($row['count']+1)."' WHERE email='".$email."' AND product_id='".$product_id."'";
	
mysql_query($query);
mysql_close();


header("Location: http://localhost/shop/store.php");
?>