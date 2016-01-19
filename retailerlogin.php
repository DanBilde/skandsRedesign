 <?php
 /* This is the login page. If the process_login page doesn't approve the information
 it will display an error explaining what is wrong. If the information is correct,
  you will be directed to the admin.php page. */
if(isset($_POST['user'])){
unset($_POST['user']);
unset($_POST['pw']);
}

if(isset($_GET['error'])){
$error=$_GET['error'];
if($error==1){
$output="
<p id='error'>***User or password not found. Try again.</p>";
}
else if($error==2){
$output="
<p id='error'>***Fill both the fields.</p>";
}

}else{
$output="";
}


$output.="<p>MD5(123)= ".MD5(123). " Encryption</p>";

?>






<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8"/>
<meta name="description" content="Bryggeriet Skands" />
<meta name="keywords" content="Skands, bryggeriet, beer, drinking" />
<title>Skands</title>
<link rel="stylesheet" href="skands.css" />
<link rel="stylesheet" href="style.css"/>
</head>

<body>
<div id="mainbox">
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
	
	
<form id="reform" method="post" action="process_login.php">
	<h3>Retailer Login</h3>
	User:<input type="text" name="user" /><br />
	Password:<input type="password" name="pw" /><br />
	<br>
	<input type="submit" value="Login" />
	<br>
	<a id="backbutton" href="index.html"> Back to homepage </a>
</form>

	

	
	</div> <!--end of wrapper-->
 </div>
</body>
</html>

