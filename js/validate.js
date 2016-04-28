	function validate() {
		var nameValid = validateName();
		var emailValid = validateEmail();
		var pwValid = validatePw();
		var pwchkValid = validatePwchk();
		var termsValid = validateTerms();
		if (nameValid && emailValid && pwValid && pwchkValid && termsValid)
			//header("Location: http://")
			return true;
		return false;
	}
	
	
	function validateName() {
		var name = document.forms["signup"]["name"].value;
		if (name.length < 1) {
			var errorrpt = document.getElementById("nameerror");
			errorrpt.innerHTML = "Please enter your name";
			return false;
		}
		var errorrpt = document.getElementById("nameerror");
		errorrpt.innerHTML = "";
		return true;
	}
	
	function validateEmail() {
		var email = document.forms["signup"]["email"].value;
		var emailRegex = /^\S+@\S+\.\S+$/;
		if (email.length < 1) {
			var errorrpt = document.getElementById("emailerror");
			errorrpt.innerHTML = "Please enter your email";
			return false;
		}		
		if (!emailRegex.test(email))
		{
			var errorrpt = document.getElementById("emailerror");
			errorrpt.innerHTML = "Please enter a valid email";
			return false;
		}
		return true;
		
	}
	
	function validatePw() {
		var pw = document.forms["signup"]["password"].value;
		if (pw.length < 1) {
			var errorrpt = document.getElementById("pwerror");
			errorrpt.innerHTML = "Please enter your password.";
			return false;
		}
		var errorrpt = document.getElementById("pwerror");
		errorrpt.innerHTML = "";
		return true;
	}

	function validatePwchk() {
		var pwchk = document.forms["signup"]["verifyp"].value;
		if (pwchk.length < 1) {
			var errorrpt = document.getElementById("pwchkerror");
			errorrpt.innerHTML = "Please verify password.";
			return false;
		}
		var errorrpt = document.getElementById("pwchkerror");
		errorrpt.innerHTML = "";
		return true;
	}
	
		
	function validateTerms() {
		var terms = document.forms["signup"]["agree"].value;
		if (terms == null) { //what is the value of an unchecked checkbox?
			var errorrpt = document.getElementById("termerror");
			errorrpt.innerHTML = "Please agree to the Terms and Conditions";
			return false;
		}
		var errorrpt = document.getElementById("termerror");
		errorrpt.innerHTML = "";
		return true;
	}