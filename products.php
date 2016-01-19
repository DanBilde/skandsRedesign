<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title> Products </title>
<link href="style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="skands.css" />


<?php
include_once ('db_link.php');

	$output="";
	$sql="SELECT id , name , image , substr(description,1,100) as description from products";
	$result=mysql_query($sql);
	while($products=mysql_fetch_assoc($result))
	{
		$id=$products['id'];
		$product_name=$products['name'];
		$product_image=$products['image'];
		$description=$products['description']. "...";
		$imghtml="<img src=\"image/$product_image\" alt=\"$product_name\"/>";
		
		$output .="<div class=\"products\">";
		$output .="<h1> $product_name</h1>";
		$output .="<p> $imghtml</p>";
		$output .="<h1> $description</h1>";
		$output .="<h1><a href=\"read_more.php?id=$id\"> Read More </a> <h1>";
		$output .="</div>";
	}
	
?>
</head>
<body>

	<div id="wrapper">
	
<div id="mininav">
	
		<a href="index.html">Home</a>
		<a href="contact.html">Contact</a>
		<a href="retailerlogin.php">Retailer</a>
		<a href="#">Admin Login</a>
	
</div>
		<div id="logo">
		<a href="index.html"><img src="images/logo.png" alt="logo"/></a>
	</div>
<nav>
	<a href="products.php">Products</a>
	<a href="beer&food.php">Beer & Food</a>
	<a href="drink.html">Drinking Tips</a>
	<a href="findretailer.html">Find Your Retailer</a>	
</nav>
		<div id="menu"><img src="images/menu.png" alt="#"/></div>

<?php
echo $output;
?>
</div>
</body>
</html>