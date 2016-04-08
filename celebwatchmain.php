<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>CelebWatch</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="https://bootswatch.com/lumen/bootstrap.min.css">
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
<?php
			if (isset($_GET['signup'])){
				displaySignup();
			}
?>
	</body>

	<nav class="navbar navbar-default navbar-fixed-bottom">
		<p>&copy; 2016 Angela Han, Eunice Kang, Matthew Toma.</p>
	</nav

</html>

<?php
	function displaySignup(){
?>
		<form class="form-horizontal" action="dbconn.php">
			<fieldset>
				<legend>Sign-up Form</legend>
				<div class="form-group">
					<label for="inputName" class="col-lg-2 control-label">Name</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="name" id="inputName" placeholder="Full Name">
					</div>
				</div>
				<div class="form-group">
					<label for="inputEmail" class="col-lg-2 control-label">Email</label>
					<div class="col-lg-10">
						<input type="text" class="form-control" name="email" id="inputEmail" placeholder="Email">
					</div>
				</div>
				<div class="form-group">
			      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
			      <div class="col-lg-10">
			        <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password">
			      </div>
			      <label for="verifyPassword" class="col-lg-2 control-label">Verify Password</label>
			      <div class="col-lg-10">
			        <input type="password" class="form-control" id="verifyPassword" placeholder="Retype Password">
			      </div>
			    </div>
			    <div class="checkbox">
			    	<label>
			    		<input type="checkbox"> I agree to the Terms and Conditions.
			    	</label>
			    </div>
			    <div class="form-group">
			    	<div class="col-lg-10 col-lg-offset-2">
				        <button type="reset" class="btn btn-default">Cancel</button>
				        <button type="submit" class="btn btn-primary">Submit</button>
			    	</div>
			    </div>
			</fieldset>
		</form>
<?php
	}
?>