<?php
session_start();
require_once ('dbh.php');

$email = $_POST['mailuid'];
$password = $_POST['pwd'];
$error ="Invalid username or password!";

$sql = "SELECT * from `employee` WHERE email = '$email' AND password = '$password'";
$sqlid = "SELECT id from `employee` WHERE email = '$email' AND password = '$password'";

$result = mysqli_query($conn, $sql);
$id = mysqli_query($conn , $sqlid);

$empid = "";
if(mysqli_num_rows($result) == 1){
	
	$employee = mysqli_fetch_array($id);
	$empid = ($employee['id']);
	
     $_SESSION["email"] = $email;
	//echo ("logged in");
	//echo ("$empid");
	
	header("Location: ..//eloginwel.php?id=$empid");
}

else{
// 	echo ("<SCRIPT LANGUAGE='JavaScript'>
//     window.alert('Invalid Email or Password')
//     window.location.href='javascript:history.go(-1)';
//     </SCRIPT>");

      $_SESSION["error"] = $error; 
        header("Location: ..//elogin.php");
      //  echo '<h3>Invalid username or password</h3>';


 //echo "Invalid Username and Password";
}
?>