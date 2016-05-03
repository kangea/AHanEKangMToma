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
		<!-- Youtube -->
		<script>
		function handleAPILoaded() {
  			$('#search-button').attr('disabled', false);
			}

		// Search for a specified string.
		function search() {
  			var q = $('#query').val();
  			var request = gapi.client.youtube.search.list({
    			q: q,
 		   part: 'snippet'
 			 });

			  request.execute(function(response) {
		    var str = JSON.stringify(response.result);
    	$('#search-container').html('<pre>' + str + '</pre>');
  			});
		}

		var OAUTH2_CLIENT_ID = '__YOUR_CLIENT_ID__';
		var OAUTH2_SCOPES = [
  	'https://www.googleapis.com/auth/youtube'
];

// Upon loading, the Google APIs JS client automatically invokes this callback.
googleApiClientReady = function() {
  gapi.auth.init(function() {
    window.setTimeout(checkAuth, 1);
  });
}

// Attempt the immediate OAuth 2.0 client flow as soon as the page loads.
// If the currently logged-in Google Account has previously authorized
// the client specified as the OAUTH2_CLIENT_ID, then the authorization
// succeeds with no user intervention. Otherwise, it fails and the
// user interface that prompts for authorization needs to display.
function checkAuth() {
  gapi.auth.authorize({
    client_id: OAUTH2_CLIENT_ID,
    scope: OAUTH2_SCOPES,
    immediate: true
  }, handleAuthResult);
}

// Handle the result of a gapi.auth.authorize() call.
function handleAuthResult(authResult) {
  if (authResult && !authResult.error) {
    // Authorization was successful. Hide authorization prompts and show
    // content that should be visible after authorization succeeds.
    $('.pre-auth').hide();
    $('.post-auth').show();
    loadAPIClientInterfaces();
  } else {
    // Make the #login-link clickable. Attempt a non-immediate OAuth 2.0
    // client flow. The current function is called when that flow completes.
    $('#login-link').click(function() {
      gapi.auth.authorize({
        client_id: OAUTH2_CLIENT_ID,
        scope: OAUTH2_SCOPES,
        immediate: false
        }, handleAuthResult);
    });
  }
}

// Load the client interfaces for the YouTube Analytics and Data APIs, which
// are required to use the Google APIs JS client. More info is available at
// http://code.google.com/p/google-api-javascript-client/wiki/GettingStarted#Loading_the_Client
function loadAPIClientInterfaces() {
  gapi.client.load('youtube', 'v3', function() {
    handleAPILoaded();
  });
}



		</script>

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

function displayYoutube(){
	//get CelebID
	$dbc = connect_to_db("hanav");
	$celebid = $_COOKIE['CelebID'];
	$query = "SELECT * FROM Celebrities WHERE ID='$celebid';";
	$result = perform_query($dbc, $query);
	$obj = mysqli_fetch_object($result);
	$youtube = ($obj->Youtube);
	$youid = ($obj->YoutubeID);
	$celebName = ($obj->CelebName);
	disconnect_from_db($dbc, $result);
	echo 
}
?>
</html>