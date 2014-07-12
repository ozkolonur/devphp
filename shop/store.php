<?php
session_start();

$email = $_SESSION['email'];

$search_category = $_POST["search_category"];
$search_brand = $_POST["search_brand"];
$search_price1 = $_POST["search_price1"];
$search_price2 = $_POST["search_price2"];

//echo "search_category =".$search_category;
//echo "search_brand =".$search_brand;
//echo "search_price1 =".$search_price1;
//echo "search_price2 =".$search_price2;
error_reporting(1);

include "lib.php";

db_connect();


if (!empty($search_category))
	$query="SELECT * FROM product WHERE category_id='".get_category_id($search_category)."'";
else if (!empty($search_brand))
	$query="SELECT * FROM product WHERE brand_id='".get_brand_id($search_brand)."'";
else if (!empty($search_price1) && !empty($search_price2))
	$query="SELECT * FROM product WHERE price >'".$search_price1."' AND price <'".$search_price2."'";
else
	$query="SELECT * FROM product";

echo $query;

$result=mysql_query($query);
echo "<h1>Store</h1>";
echo 		"<form action=\"store.php\" method=\"post\">"
			."<br>Category <input type=\"text\" name=\"search_category\">"
			."<input type=\"submit\" value=\"Search by Category\"></br>"
			."<br>Brand <input type=\"text\" name=\"search_brand\">"
			."<input type=\"submit\" value=\"Search by Brand\"></br>"
			."<br>Price range <input type=\"text\" name=\"search_price1\"><input type=\"text\" name=\"search_price2\">"
			."<input type=\"submit\" value=\"Search by Price Range\"></br>"
			."</form>";

echo "<table border=\"1\">";
echo "<tr><td>id</td><td>category</td><td>brand</td><td>name</td><td>description</td><td>price</td></tr>";

while($row = mysql_fetch_array($result)){
	echo "<tr>"
			."<td>".$row["id"]."</td>"
			."<td>".get_field("category","id",$row["category_id"],"name")."</td>"
			."<td>".get_field("brand","id",$row["brand_id"],"name")."</td>"
			."<td>".$row["name"]."</td>"
			."<td>".$row["description"]."</td>"
			."<td>".$row["price"]."</td>"
			."<td>"."<form action=\"add_to_basket.php\" method=\"post\">"
			."<input type=\"submit\" value=\"Add to Basket\">"
			."<input type=\"hidden\" name=\"product_id\" value=\"".$row["id"]."\">"
			."<input type=\"hidden\" name=\"email\" value=\"$email\">"
			."</form>"."</td>"
			."</tr>";
}

db_close();

echo "</table>" ;
echo "<FORM>";
echo "<INPUT TYPE=\"BUTTON\" VALUE=\"View Basket\" ONCLICK=\"window.location.href='basket.php'\">";
echo "<INPUT TYPE=\"BUTTON\" VALUE=\"Logout\" ONCLICK=\"window.location.href='index.php'\">";
echo "</FORM>";

?>
