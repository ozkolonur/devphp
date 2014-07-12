<?php
error_reporting(1);
session_start();

$email = $_SESSION['email'];

include "lib.php";

db_connect();

$query="SELECT * FROM basket WHERE email=\"".$email."\"";
$result=mysql_query($query);
echo "<h1>Basket</h1>";
echo "<table border=\"1\">";
while($row = mysql_fetch_array($result)){
	echo "<tr>"
			."<td>".get_field("product","id",$row["product_id"],"name")."</td>"
			."<td>".get_field("product","id",$row["product_id"],"description")."</td>"
			."<td>".get_field("product","id",$row["product_id"],"price")."</td>"
			."<td>".$row["count"]."</td>"
			."</tr>";
}

db_close();
echo "</table>" ;
echo "<FORM>";
echo "<INPUT TYPE=\"BUTTON\" VALUE=\"Clear Basket\" ONCLICK=\"window.location.href='clear_basket.php'\">";
echo "<INPUT TYPE=\"BUTTON\" VALUE=\"Checkout\" ONCLICK=\"window.location.href='checkout.php'\">";
echo "<INPUT TYPE=\"BUTTON\" VALUE=\"Return to Store\" ONCLICK=\"window.location.href='store.php'\">";
echo "</FORM>";

?>
