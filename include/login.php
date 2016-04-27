<?php
include("dconn.php");

//if login info not entered or not in database go back to main
if (!isset($_POST['loginEmail'])) or !isset($_POST['loginPassword']) or (0==checklogin($_POST['loginEmail'],$_POST['loginPassword']))){
	header("Location: ../celebwatchmain.php");
}
else{
	setcookie('loginCookieUser', $_POST['loginEmail']);
	header("Location: ../memberpage.php"); //have to make this page
}

// checklogin sees if the information is in Users table
function checklogin($email, $pass){
	$dbc = connect_to_db("hanav");
	$securepass = sha1($pass);
	$query = "SELECT * FROM `Users` WHERE `Email`='$email' AND `Password`='$securepass';";
	$result = perform_query($dbc, $query);
	$match = mysqli_num_rows($result);
	disconnect_from_db($dbc);
	return ($match==1); // returns true if there is a match
}
?>