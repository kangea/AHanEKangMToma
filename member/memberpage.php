<?php
include("../include/dconn.php");
if (!isset($_COOKIE['loginCookieUser'])){
	header("Location: notloggedin.html");
}
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>CelebWatch | MemberPage</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://bootswatch.com/lumen/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</head>

<!-- NAVIGATION BAR -->
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="../celebwatchmain.php">CelebWatch</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li class="active"><a href="memberpage.php">MemberPage <span class="sr-only">(current)</span></a></li>
	        <li><a href="#">Browse</a></li>
	      </ul>
	      <form class="navbar-form navbar-left" role="search">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Search">
	        </div>
	        <button type="submit" class="btn btn-default">Submit</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="logout.php">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

	<!-- BODY -->
	<body>
		<div class="container">
			<!-- Header -->
			<h1>Welcome <?php memberName(); ?>!</h1>
			<br>
			<!-- Favorites Table -->
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Favorites</h3>
				</div>
				<div class="panel-body">
					<table class="table table-striped table-hover ">
					  <thead>
					    <tr>
					      <th>Name</th>
					      <th>Occupation</th>
					      <th>Birthday</th>
					      <th>Social Media</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td>1</td>
					      <td>Column content</td>
					      <td>Column content</td>
					      <td>Column content</td>
					    </tr>
					    <tr>
					      <td>2</td>
					      <td>Column content</td>
					      <td>Column content</td>
					      <td>Column content</td>
					    </tr>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</body>

<!-- BOTTOM NAVBAR -->
	<nav class="navbar navbar-default navbar-fixed-bottom">
		<div class="container-fluid">
			<ul class="navbar-form navbar-left">
				<p>&copy; 2016 Angela Han, Eunice Kang, Matthew Toma.</p>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			    <li><a href="admin.php">Admin</a></li>
			</ul>
		</div>
	</nav>

<?php
function memberName(){
	$dbc = connect_to_db("hanav");
	$email = $_COOKIE['loginCookieUser'];
	$query = "SELECT * FROM Users WHERE Email='$email';";
	$result = perform_query($dbc, $query);
	$obj = mysqli_fetch_object($result);
	disconnect_from_db($dbc, $result);
	echo ($obj->UserName);
}
?>
</html>