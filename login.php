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
<meta charset="UTF-8">
<title>Login form</title>
<link type="text/css" rel="stylesheet" href="style.css" /> 
</head>

<body>
<div class="recipe">
<h3>Enter Adm section</h3>

<form method="post" action="process_login.php">
User Name:<input type="text" name="user" /><br />
Password:<input type="password" name="pw" /><br />
<input type="submit" value="Login" />
</form>

</div>

<div id="back">
	<a href="index.html">Back to frontpage</a>
</div> 

</body>
</html>