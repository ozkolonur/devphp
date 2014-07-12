<?php
error_reporting(1);

$product_id = $_POST["product_id"];
$email = $_POST["email"];
$name = $_POST["name"];
$description = $_POST["description"];
$price = $_POST["price"];
$category = $_POST["category"];
$brand = $_POST["brand"];
$status = $_POST["status"];
$update = $_POST["update"];
$delete = $_POST["delete"];
$add = $_POST["add"];
$category_id = $_POST["category_id"];
$brand_id = $_POST["brand_id"];

include "lib.php";

db_connect();
//echo $category;
$category_id = get_category_id($category);
$brand_id = get_brand_id($brand);

//echo $product_id;
//echo $email;
//echo $name;
//echo $description;
//echo $price;
//echo $category;
//echo $brand;
//echo $status;
//echo $update;
//echo $delete;
//echo "brand=".$brand_id;
//echo "category=".$category_id;

//$db_user="root";
//$db_password="";
//$db_database="shop";
//mysql_connect("localhost",$db_user,$db_password);
//mysql_select_db($db_database) or die( "Unable to select database");

//$query="SELECT * FROM basket WHERE email='".$email."' AND product_id='".$product_id."'";
//$result = mysql_query($query);
//$row = mysql_fetch_array($result);

if ($update=="Update")
	$query="UPDATE product SET brand_id='".$brand_id."', category_id='".$category_id."', name='".$name."', description='".$description."', price='".$price."', status='".$status."' WHERE id='".$product_id."'";
else if ($delete=="Delete")
	$query="DELETE FROM product WHERE id='".$product_id."'";
else if ($add == "Add")
	$query="INSERT INTO product (category_id, brand_id, name, description, price, status) VALUES ('$category_id', '$brand_id', '$name', '$description', '$price', '$status')";

	
//echo $query;	
mysql_query($query);
mysql_close();


header("Location: http://localhost/shop/admin.php");
?>

