<?php 
session_start();

$email = $_SESSION['email'];

echo "<h1>Thank you</h1>";

include "lib.php";

db_connect();

$query="SELECT * FROM basket WHERE email=\"".$email."\"";
$result=mysql_query($query);

while($row = mysql_fetch_array($result)){
	$current_status = get_field("product","id", $row["product_id"], "status");
	$new_status = $current_status - $row["count"];
	if ($new_status < 0) die("Out of stock");
	set_field("product", "id", $row["product_id"], "status" ,$new_status);
	save_shipment($email, $row["product_id"], $row["count"]);	
}

$query="DELETE FROM basket WHERE email='".$email."'";
$result = mysql_query($query);



db_close();
session_destroy();
?>
<a href="index.php">Click Here To Log in Again</a>