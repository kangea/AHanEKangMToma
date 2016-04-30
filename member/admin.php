<?php
include("../include/dconn.php");
if (isset($_COOKIE['loginCookieUser'])){
	$dbc = connect_to_db("hanav");
	$email = $_COOKIE['loginCookieUser'];
	$query = "SELECT * FROM Users WHERE Email='$email';";
	$result = perform_query($dbc, $query);
	$obj = mysqli_fetch_object($result);
	disconnect_from_db($dbc, $result);
	if ($obj->Admin == "no"){
		header("Location: celebwatchmain.php");
	}
}
else if (!isset($_COOKIE['loginCookieUser'])){
	// header("Location: celebwatchmain.php");
}
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
		<div class="page-header container-fluid">
			<h1>Hello, Admin</h1>
		</div>
		<!-- REQUESTS TABLE -->
		<div class="container col-md-6">
			<div class="panel panel-primary">
  				<div class="panel-heading">
    				<h3 class="panel-title">Requests</h3>
  				</div>
	  			<div class="panel-body">
	    			<table class="table table-striped table-hover ">
  						<thead>
						    <tr>
						      <th>#</th>
						      <th>Column heading</th>
						      <th>Column heading</th>
						      <th>Column heading</th>
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
		<!-- NEW CELEBRITY FORM -->
		<div class="container col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Insert New Celebrity</h3>
				</div>
				<div class="panel-body">
					<form method="post" name="newceleb" class="form-horizontal" onsubmit="return celebValidate();">
						<fieldset>
							<div class="form-group" id="celebname">
								<label for="celebName" class="col-lg-2 control-label">Celebrity Name</label>
								<div class="col-lg-10">
									<input type="text" class="form-control" name="name" id="inputName" placeholder="Full Name">
								</div>
								<div class="error" id = "celebnameerror"></div> 
							</div>
							<div class="form-group" id="signupemail">
								<label for="inputEmail" class="col-lg-2 control-label">Occupation</label>
								<div class="col-lg-10">
									<div class="radio">
										<label>
											<input type="radio" name="occupations" id="music" value="music">
											Music
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="occupations" id="filmtv" value="filmtv">
											Film/TV
										</label>
									</div>
								</div>
								<div class = "error" id = "emailerror"></div> 
							</div>
							<div class="form-group" id="signuppass">
						      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
						      <div class="col-lg-10">
						        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
						      </div>
						      <div class = "error" id = "pwerror"></div> 
						      <label for="verifyPassword" class="col-lg-2 control-label">Verify Password</label>
						      <div class="col-lg-10">
						        <input type="password" class="form-control" name="verifyp" id="verifyPassword" placeholder="Retype Password">
						      </div>
						      <div class = "error" id = "pwchkerror"></div> 
						    </div>
						    <div class="checkbox" id="termscond">
						    	<label>
						    		<input type="checkbox" name="agree" value="agreed" id="terms"> I agree to the Terms and Conditions.
						    	</label>
						    </div>
						    <div class="error" id = "termerror"></div>
						    <input type="hidden" name="admin" value="no">
						    <div class="form-group">
						    	<div class="col-lg-10 col-lg-offset-2">
							        <button class="btn btn-default" onclick="celebwatchmain.php">Cancel</button>
							        <button type="submit" class="btn btn-primary" name="submitsignup">Submit</button>
						    	</div>
						    </div>
						</fieldset>
					</form>
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
</html>