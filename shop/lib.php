<?php 
function db_connect()
{
	$db_user="root";
	$db_password="";
	$db_database="shop";
	mysql_connect("localhost",$db_user,$db_password);
	mysql_select_db($db_database) or die( "Unable to select database");
}

function get_field($table, $pk_field, $pk, $field)
{
	$query = "SELECT * FROM ".$table." WHERE ".$pk_field."=".$pk;
	//echo $query;
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	//echo "x".$row["$field"]."x";
	return $row["$field"];
}

function set_field($table, $pk_field, $pk, $field, $value)
{
	$query = "UPDATE ".$table." SET ".$field."=".$value." WHERE ".$pk_field."=".$pk;
	//echo $query;
	$result = mysql_query($query);
	return TRUE;
}

function get_category_id($category_name)
{
	$query = "SELECT * FROM category";
	$retval = "";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
		if($row["name"] == $category_name)
			$retval = $row["id"];
	}
	if ($retval == "")
		mysql_query("INSERT INTO category (name, description) VALUES ('$category_name', '$category_name')");
	$query = "SELECT * FROM category";
	$retval = "";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
		if($row["name"] == $category_name)
			$retval = $row["id"];
	}
	return $retval;	
	
}
function get_brand_id($brand_name)
{
	$query = "SELECT * FROM brand";
	$retval = "";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
		if($row["name"] == $brand_name)
			$retval = $row["id"];
	}
	if ($retval == "")
		mysql_query("INSERT INTO brand (name) VALUES ('$brand_name')");

	$query = "SELECT * FROM brand";
	$retval = "";
	$result = mysql_query($query);
	while($row = mysql_fetch_array($result)){
		if($row["name"] == $brand_name)
			$retval = $row["id"];
	}
	return $retval;	
}

//function get_brand_id($category_name)
//{
//	$query = "SELECT * FROM brand";
//	$result = mysql_query($query);
//	while($row = mysql_fetch_array($result)){
//		if($row["name"] == $category_name)
//			return $row["id"];
//	}
//}

function save_shipment($email, $product_id, $count)
{
	$date = date(DATE_RFC822);
	$query="INSERT INTO shipment (email, product_id, count, date) 
				VALUES ('$email', '$product_id', '$count', '$date')";
//	echo $query;
	mysql_query($query);
}

function db_close()
{
	mysql_close();
}
?>