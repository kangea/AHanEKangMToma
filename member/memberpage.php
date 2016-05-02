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
	        <li><a href="celebrities.php">Browse</a></li>
	      </ul>
	      <form method="get" name="search" class="navbar-form navbar-left" role="search" action="celebrities.php">
	        <div class="form-group">
	          <input type="text" class="form-control" name="searchedterm" placeholder="Search A Celeb!">
	        </div>
	        <button type="submit" name="searchsubmit" class="btn btn-default">Submit</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="logout.php">Logout</a></li>
	      </ul>
	    </div>
	  </div>
	</nav>

<!-- BODY -->
	<body>
			<!-- Header -->
		<div class="page-header container-fluid">
			<h1>Welcome <?php memberName(); ?>!</h1>
		</div>
		<br>

			<!-- Favorites Table -->
			<?php
				displayFaves();
				if (isset($_GET['deletebutton'])){
					deleteFave();
				}
			?>

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

function displayFaves(){
	$dbc = connect_to_db("hanav");
	$query = "SELECT * FROM `Celebrities` JOIN `MyCelebs` ON `Celebrities`.`ID`=`MyCelebs`.`CelebID` JOIN `Users` ON `Users`.`ID` = `MyCelebs`.`UserID`";
	$result = perform_query($dbc, $query);
	$rowsFound = mysqli_num_rows($result);
	echo "<div class=\"container col-md-6\">
			<div class=\"panel panel-primary\">
				<div class=\"panel-heading\">
					<h3 class=\"panel-title\">Favorites</h3>
				</div>
				<div class=\"panel-body\">
					<table class=\"table table-striped table-hover\">
					  <thead>
					    <tr>
					      <th>Name</th>
					      <th>Occupation</th>
					      <th>Birthday</th>
					      <th>Social Media</th>
					      <th>Delete?</th>
					    </tr>
					  </thead>
					  <tbody>";
	while (@extract(mysqli_fetch_array($result, MYSQLI_ASSOC))) {
		echo "<tr>
				<form method='get' name='favecelebs' onsubmit='setTimeout(function () { window.location.reload(); }, 10)'>
				<td>$CelebName</td>
			    <td>$Occupation</td>
			    <td>$Birthday</td>
			    <td>
			    	<ul>
			    		<li><a href='$Wikipedia'>$Wikipedia</a></li>
			    		<li><a href='$Twitter'>$Twitter</a></li>
			    		<li><a href='$Instagram'>$Instagram</a></li>
			    	</ul>
			    </td>
			    <td>
			    	<input type='hidden' name='celebid' value=$CelebID>
			    	<button type='submit' name='deletebutton' class='btn btn-primary btn-xs'>Yes</button>
			    </td>
			    </form>
			  </tr>";
	}
	echo "</table></div></div></div>";
}

function deleteFave(){
	$dbc = connect_to_db("hanav");
	$CelebID = $_GET['celebid'];
	$UserEmail = $_COOKIE['loginCookieUser'];
	$userquery = "SELECT * FROM Users WHERE Email='$UserEmail';";
	$userresult = perform_query($dbc, $userquery);
	$obj = mysqli_fetch_object($userresult);
	$UserID = ($obj->ID);
	$deletequery = "DELETE FROM MyCelebs WHERE CelebID='$CelebID' AND UserID='$UserID';";
	$deletefave = perform_query($dbc, $deletequery);
	disconnect_from_db($dbc, $deletefave);
}
?>
</html>