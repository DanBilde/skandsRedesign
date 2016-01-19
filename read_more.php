<!DOCTYPE HTML>
<html>
<head>
<meta charset="UTF-8">
<title>Show Products</title>
<link href="style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="skands.css" />
<script type="text/javascript" src="js/jquery/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/star_rating.js"></script>
<link rel="stylesheet" type="text/css" href="star.css"/>
	
<?php
include_once ('db_link.php'); 
	$output="";
	if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="SELECT * from products WHERE id='$id'";
	$result=mysql_query($sql);

	$product_row=mysql_fetch_assoc($result);//fetch the first row
		$product_name=$product_row['name'];
		$product_image=$product_row['label'];
		$description=$product_row['description']; 	
		$labelhtml="<img src=\"image/$product_image\" alt=\"$product_name\"/>";	
		
		$output .="<div class=\"labels\">";
		
		$output .="<div id=\"box_left\">";
		
		$output .="<p>  $labelhtml</p>";
		$output .="
		<div id=\"rating_cont\">		
		<div id=\"rating_btns\">
			<ul>
				<a href =\"?rating=0.5&id=$id\"><li>0.5</li></a>
				<a href =\"?rating=1.0&id=$id\"><li>1.0</li></a>
				<a href =\"?rating=1.5&id=$id\"><li>1.5</li></a>
				<a href =\"?rating=2.0&id=$id\"><li>2.0</li></a>
				<a href =\"?rating=2.5&id=$id\"><li>2.5</li></a>
				<a href =\"?rating=3.0&id=$id\"><li>3.0</li></a>
				<a href =\"?rating=3.5&id=$id\"><li>3.5</li></a>
				<a href =\"?rating=4.0&id=$id\"><li>4.0</li></a>
				<a href =\"?rating=4.5&id=$id\"><li>4.5</li></a>
				<a href =\"?rating=5.0&id=$id\"><li>5.0</li></a>
			</ul>
		</div>	
		
		<div id=\"rating_on\" >&nbsp;</div>
		<div id=\"rated\">
			<div id=\"rating\" style=\"height:17px; line-height:17px;\">not rated</div>
			<div> - &nbsp;</div>
			<div id=\"small_stars\">&nbsp;</div>
			<div id=\"rate_edit\">edit</div>
		</div>";
		$output .="</div>";

	if (isset($_GET['rating'])) {
	$NewRating=$_GET['rating'];
	$product_id=$_GET['id'];
	$sql="INSERT INTO ratings (id ,rating ,product_id) 
		VALUES ( NULL, '$NewRating' , '$product_id')";
		mysql_query($sql);
	}
	
//Select the average rating for the selected product from the "ratings" table.
	$sql="SELECT round(AVG(ratings.rating),1) AS rating , COUNT(*) as NumRatings
			FROM ratings
		WHERE product_id=$id";
	
	$result=mysql_query($sql);
	$row=mysql_fetch_assoc($result);
	$rating=$row['rating'];
	$NumRatings=$row['NumRatings'];
	$output .="Ratings: $NumRatings Average rating:$rating";
	$output .="
	<p><a href=\"products.php\"> Back to products </a></p>";
	
	$output .="</div>";
	$output .="<div id=\"box_right\">";
	$output .="<h1> $product_name</h1>";
	$output .="<h1> $description</h1>";
	$output .="</div>";
	
	
	
	
	$sql = "SELECT * from comment WHERE product_id=$id order by id DESC";
		
		$result=mysql_query($sql);
		
		
	if (isset($_POST['comment'])) {		
				$comment = $_POST['comment'];
				$id=$_POST['id'];
				$sql="INSERT INTO comment (id, comment, product_id)
				VALUES ('','$comment', $id)";
				
				if (mysql_query($sql, $db_link)) 
				{	
					$output .="<p>Your comment is saved</p>";
					$output .="<p><a href='products.php'> Back to products </a></p>";
					
				} else {
					echo mysql_error ($db_link); 
				}
	}else{
				$output .="
				<form action=\"\" method=\"post\">
				<fieldset>
					<legend> Your comment </legend>
					<input type=\"hidden\" name=\"id\" value=\"$id\">
					<textarea name=\"comment\" cols=\"90\" rows=\"3\"> </textarea>	
					<input type=\"submit\" name=\"submit\" value=\"submit\" \>
				</fieldset>
				</form>";
	}
	$output .="<div id=\"usercomment\"><h1> User comments: </h1>";
	while ($comment_row=mysql_fetch_assoc($result)){
		$one_comment=$comment_row['comment'];
		
		$output .="<p>$one_comment</p>";
		
		}
		$output .="</div>"; 
	
} 
		$output .="</div>";
		$output .="</div>";
	
?>
<meta name="keywords" content="<?php echo $id; ?>">
<meta name="description" content="<?php echo $rating; ?>">
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

</body>
</html>