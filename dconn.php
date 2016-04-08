<?php

function connect_to_db( $dbname ){
	// REMEMBER!!!
	// Change the host, login, and db information
	$dbc = @mysqli_connect( "localhost", "hanav", "hanav", $dbname ) or
			die( "Connect failed: ". mysqli_connect_error() );
	return $dbc;
}

function disconnect_from_db( $dbc, $result ){
	mysqli_free_result( $result );
	mysqli_close( $dbc );
}

function perform_query( $dbc, $query ){

	//echo "My query is >$query< <br />";
	$result = mysqli_query($dbc, $query) or
			die( "bad query".mysqli_error( $dbc ) );
	return $result;
}


	$dbc= connect_to_db( "tomama" );
	$join_name =  $_POST['name'];
	$join_email = $_POST['email'];
	$join_password = $_POST['password'];
	$join_securepw = sha1($join_password);
	$join_level = $_POST['level'];
	$query = "INSERT INTO `Club Assignment` VALUES ( '$join_name', '$join_email', '$join_securepw', now(), '$join_level' )";
	insert($dbc, $query);

?>

