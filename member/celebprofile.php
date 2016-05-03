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
		<title>CelebWatch | Celebrities</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://bootswatch.com/lumen/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- Twitter -->
		<script>window.twttr = (function(d, s, id) {
				  var js, fjs = d.getElementsByTagName(s)[0],
				    t = window.twttr || {};
				  if (d.getElementById(id)) return t;
				  js = d.createElement(s);
				  js.id = id;
				  js.src = "https://platform.twitter.com/widgets.js";
				  fjs.parentNode.insertBefore(js, fjs);
				 
				  t._e = [];
				  t.ready = function(f) {
				    t._e.push(f);
				  };
				 
				  return t;
				}(document, "script", "twitter-wjs"));</script>
	</head>

<!-- NAVIGATION BAR -->
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="../celebwatchmain.php">CelebWatch</a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <ul class="nav navbar-nav">
	        <li><a href="memberpage.php">MemberPage <span class="sr-only">(current)</span></a></li>
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
			<h1><?php displayCelebName(); ?></h1>
		</div>
		<br>

		<!-- Twitter -->
		<?php displayTwitter(); ?>

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

function displayCelebName(){
	$dbc = connect_to_db("hanav");
	$celebid = $_COOKIE['CelebID'];
	$query = "SELECT * FROM Celebrities WHERE ID='$celebid';";
	$result = perform_query($dbc, $query);
	$obj = mysqli_fetch_object($result);
	disconnect_from_db($dbc, $result);
	echo ($obj->CelebName);
}

function displayTwitter(){
	// Get CelebID
	$dbc = connect_to_db("hanav");
	$celebid = $_COOKIE['CelebID'];
	$query = "SELECT * FROM Celebrities WHERE ID='$celebid';";
	$result = perform_query($dbc, $query);
	$obj = mysqli_fetch_object($result);
	$twitter = ($obj->Twitter);
	$twitid = ($obj->TwitterID);
	$celebName = ($obj->CelebName);
	disconnect_from_db($dbc, $result);
	echo "<div class=\"container col-md-4\">
		<a class=\"twitter-timeline\" href=\"$twitter\" data-widget-id=\"$twitid\">Tweets by @$celebName</a>
		</div>";
}
?>
</html>