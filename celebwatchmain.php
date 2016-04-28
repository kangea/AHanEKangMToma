<?php
include("include/dconn.php");
?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>CelebWatch</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://bootswatch.com/lumen/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script type = "text/javascript" src= "validate.js"></script>
	</head>

	<body>
		<div class="text-center">
			<h1>Welcome to CelebWatch!</h1><br>
			<div class="text-center">
				<form method="get">
					<input type="submit" class="btn btn-primary btn-lg" name="signup" value="Sign Up Here">
					<input type="submit" class="btn btn-primary btn-lg" name="login" value="Already a member? Login">
				</form>
			</div>
		</div>
		<br>
<?php
		// if the signup button is pressed show the signup form
			if (isset($_GET['signup'])){
				displaySignup();
			}
			if (isset($_POST['submitsignup'])){
				handleSignup();
			}
			if (isset($_GET['login'])){
				displayLogin();
			}
?>
	</body>

	<nav class="navbar navbar-default navbar-fixed-bottom">
		<p>&copy; 2016 Angela Han, Eunice Kang, Matthew Toma.</p>
	</nav>

<!-- FUNCTION TO DISPLAY SIGNUP FORM -->

<?php
	function displaySignup(){
?>
	<div class="container" id="signupform">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Sign-up Form</h3>
			</div>
			<div class="panel-body">
				<form method="post" name="signup" class="form-horizontal" onsubmit="return validate();">
					<fieldset>
						<div class="form-group" id="signupname">
							<label for="inputName" class="col-lg-2 control-label">Name</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="name" id="inputName" placeholder="Full Name">
							</div>
							<div class = "error" id = "nameerror"></div> 
						</div>
						<div class="form-group" id="signupemail">
							<label for="inputEmail" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="email" class="form-control" name="email" id="inputEmail" placeholder="youremail@domain.com">
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
					    		<input type="checkbox" name="agree" value="agreed"> I agree to the Terms and Conditions.
					    	</label>
					    </div>
					    <div class="error" id = "termerror"></div>
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
<?php
	}
?>
<!-- FUNCTION TO HANDLE THE SIGNUP FORM -->
<?php
	function handleSignup(){
		$dbc = connect_to_db("hanav");
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
				echo "<div class='container'>";
				echo "<div class='alert alert-dismissible alert-danger' role='alert'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Error!</strong> Already existing email.</div></div>";
				disconnect_from_db($dbc, $result);
			}
		}
		else{
		}
	}
?>

<!-- FUNCTION TO DISPLAY LOGIN FORM -->

<?php
	function displayLogin(){
?>
	<div class="container" id="loginform">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Log-in</h3>
			</div>
			<div class="panel-body">
				<form method="post" class="form-horizontal" action="include/login.php">
					<fieldset>
						<div class="form-group">
							<label for="loginEmail" class="col-lg-2 control-label">Email</label>
							<div class="col-lg-10">
								<input type="text" class="form-control" name="loginEmail" id="loginEmail" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
						    <label for="loginPassword" class="col-lg-2 control-label">Password</label>
						    <div class="col-lg-10">
						    <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Password">
						    </div>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-primary">Submit</button>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
	</div>

<?php
}
?>
</html>