<?php
error_reporting(1);
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

include "lib.php";

db_connect();
//echo "password=".$password;
$md5_password = md5(password);
//echo "md5_password=".$md5_password; 
$query="SELECT * FROM user WHERE email = '$email' AND password = '$password'";
//echo $query;
$result=mysql_query($query);
$row = mysql_fetch_array($result);
//var_dump($row);
mysql_close();

$_SESSION['email'] = $email;

if($row === false) 
	header("Location: http://localhost/shop/");
else if ($row["is_admin"] == 1)
	header("Location: http://localhost/shop/admin.php");
else
	header("Location: http://localhost/shop/store.php");	
?>
