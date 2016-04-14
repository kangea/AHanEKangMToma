<?php

function connect_to_db( $dbname ){
	// REMEMBER!!!
	// Change the host, login, and db information
	$dbc = @mysqli_connect( "localhost", "hanav", "hanav", $dbname ) or
			die( "Connect failed: ". mysqli_connect_error() );
	return $dbc;
}

function disconnect_from_db( $dbc, $result ){
	if (gettype($result)==="object") mysqli_free_result( $result );
	mysqli_close( $dbc );
}

function perform_query( $dbc, $query ){

	//echo "My query is >$query< <br />";
	$result = mysqli_query($dbc, $query) or
			die( "bad query".mysqli_error( $dbc ) );
	return $result;
}

// Get the variables from the signup form
	$dbc= connect_to_db( "hanav" );
	$join_name =  $_POST['name'];
	$join_email = $_POST['email'];
	$join_password = $_POST['password'];
	$join_verifypass = $_POST['verifyp'];

	if ($join_password == $join_verifypass){
		$emailcheck = "SELECT `Email` FROM `Users` WHERE `Email`='$join_email';";
		$result = perform_query($dbc, $emailcheck);
		if ($result->num_rows == 0){
			$join_securepw = sha1($join_password);
			$query = "INSERT INTO `Users` VALUES ( '$join_name', '$join_securepw', '$join_email')";
			$adding = perform_query($dbc, $query);
			disconnect_from_db($dbc, $adding);
		}
		else{
			// want to make the errors appear in alert boxes
			echo "<script language='javascript'>";
			echo "alert('Error. Already existing email.')";
			echo "</script>";
			disconnect_from_db($dbc, $result);
		}
	}
	else{
		echo "<script language='javascript'>";
		echo "alert('Error. Passwords do not match.')";
		echo "</script>";
	}

?>