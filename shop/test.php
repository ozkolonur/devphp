<?php
error_reporting(1);
session_start();

$email = $_POST["email"];
$password = $_POST["password"];

include "lib.php";

db_connect();

//$query="SELECT * FROM category";
echo "here";
echo "news=".get_category_id("newspaper");
echo "brand=".get_brand_id("bmw");
//$result=mysql_query($query);
//$row = mysql_fetch_array($result);
//var_dump($row);
mysql_close();

?>
<h1></>asdasdasd</h1>