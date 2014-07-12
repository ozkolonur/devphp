<?php
session_start();

$email = $_SESSION['email'];

error_reporting(1);

include "lib.php";

db_connect();

$query="SELECT * FROM product";
$result=mysql_query($query);
echo "<h1>Administration</h1>";
echo "<table border=\"1\">";
echo "<tr><td>id</td><td>category</td><td>brand</td><td>name</td><td>description</td><td>price</td><td>status</td></tr>";
while($row = mysql_fetch_array($result)){
	echo "<tr>"
			."<form action=\"admin_ops.php\" method=\"post\">"
			."<td>".$row["id"]."</td>"
			."<td>"."<input type=\"text\" name=\"category\" value=\"".get_field("category","id",$row["category_id"],"name")."\"></td>"
			."<td>"."<input type=\"text\" name=\"brand\" value=\"".get_field("brand","id",$row["brand_id"],"name")."\"></td>"
			."<td>"."<input type=\"text\" name=\"name\" value=\"".$row["name"]."\"></td>"
			."<td>"."<input type=\"text\" name=\"description\" value=\"".$row["description"]."\"></td>"
			."<td>"."<input type=\"text\" name=\"price\" value=\"".$row["price"]."\"></td>"
			."<td>"."<input type=\"text\" name=\"status\" value=\"".$row["status"]."\"></td>"
			."<td><input type=\"submit\" name=\"update\" value=\"Update\"></td>"
			."<td><input type=\"submit\" name=\"delete\" value=\"Delete\"></td>"
			."<td><input type=\"hidden\" name=\"product_id\" value=\"".$row["id"]."\"></td>"
			."<td><input type=\"hidden\" name=\"email\" value=\"$email\"></td>"
			."<td><input type=\"hidden\" name=\"category_id\" value=\"".$row["category_id"]."\"></td>"
			."<td><input type=\"hidden\" name=\"brand_id\" value=\"".$row["brand_id"]."\"></td>"
			."</form>"
		."</tr>";
}
	echo "<tr>"
			."<form action=\"admin_ops.php\" method=\"post\">"
			."<td>X</td>"
			."<td>"."<input type=\"text\" name=\"category\" value=\"\"></td>"
			."<td>"."<input type=\"text\" name=\"brand\" value=\"\"></td>"
			."<td>"."<input type=\"text\" name=\"name\" value=\"\"></td>"
			."<td>"."<input type=\"text\" name=\"description\" value=\"\"></td>"
			."<td>"."<input type=\"text\" name=\"price\" value=\"\"></td>"
			."<td>"."<input type=\"text\" name=\"status\" value=\"\"></td>"
			."<td><input type=\"submit\" name=\"add\" value=\"Add\"></td>"
			."<td><input type=\"hidden\" name=\"product_id\" value=\"\"></td>"
			."<td><input type=\"hidden\" name=\"email\" value=\"$email\"></td>"
			."<td><input type=\"hidden\" name=\"category_id\" value=\"\"></td>"
			."<td><input type=\"hidden\" name=\"brand_id\" value=\"\"></td>"
			."</form>"
		."</tr>";

db_close();

echo "</table>" ;
echo "<FORM>";
echo "<INPUT TYPE=\"BUTTON\" VALUE=\"Logout\" ONCLICK=\"window.location.href='index.php'\">";
echo "</FORM>";

?>
