<?php
/*This checks if the login information is correct.*/
session_start();
		
if(isset($_POST['user']) and $_POST['user']!="" and isset($_POST['pw']) and $_POST['pw']!=""){
	$user=$_POST['user'];
	$pw=$_POST['pw'];
	
	include_once("includes/db_link.php");
	$sql="SELECT * FROM administrators where user='$user' and pw=MD5('$pw') LIMIT 1";
	$tmp_table=mysql_query($sql);

 if($r_row=mysql_fetch_assoc($tmp_table)){
		$r_user=$r_row['user'];
		$r_pw=$r_row['pw'];
		$r_name=$r_row['name'];
		$r_id=$r_row['id'];

		if($user==$r_user and md5($pw)==$r_pw) {
			$userinfo=array('name'=>$r_name , 'user'=>$r_user , 'id'=>$r_id) ;
			$_SESSION['usersession']=$userinfo;
			header("Location:admin_recipes.php"); //one row fetched and $user/$pw match the database values
		}
	}else{
		header("Location:login.php?error=1"); //no match in database
	}
}else{
	header("Location:login.php?error=2"); //fill in both fields 
}

?>