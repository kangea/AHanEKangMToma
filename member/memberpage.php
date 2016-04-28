<?php
include("include/dconn.php");
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>CelebWatch|MemberPage</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://bootswatch.com/lumen/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>

	<body>
		<div class="container">

			<?php 
				print_r($_COOKIE);
				foreach ($_COOKIE as $key=>$value)
					echo "\$_COOKIE['$key'] = $value<br />";
				if (isset($_COOKIE['loginCookieUser'])){
					echo "<h1>";
					echo "Welcome ".$_COOKIE['loginCookieUser'];
					echo "</h1>";
				}
				else{
					echo "<h1>User not logged in.</h1>";
					echo "<a href=\"http://cscilab.bc.edu/~kangea/CelebWatch/celebwatchmain.php?login=Already+a+member%3F+Login\">Click Here to Login</a>";
				}

			?>
		</div>
	</body>
</html>