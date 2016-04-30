
function validatelogIn() {
		var emailValid = validateloginEmail();
		var pwValid = validateloginPw();
		if (emailValid && pwValid)
			//header("Location: .../memberpage.php")
			return true;
		return false;
	}
	
function validateloginEmail() {
	var email = document.forms["login"]["loginEmail"].value;
	var emailRegex = /^\S+@\S+\.\S+$/;
		if (email == null || email == "") {
			var errorrpt = document.getElementById("loginemailerror");
			errorrpt.innerHTML = "Please fill out your email.";
			return false;
			}
		if ( !emailRegex.test(email.value) ) {
			errorpt.innerHTML = "This email does not have an account!";
			return false;
			}
		}
		return true;
		
	}
	
function validateloginPw () {
	var pw = document.forms["login"]["loginPassword"].value;
		if (pw == null || pw == "") {
			var errorrpt = document.getElementById("loginpwerror");
				errorrpt.innerHTML = "Please fill out your password.";
			return false;
		if ()
			alert("The password does not match the email provided.")
			return false;
		}

		return true;
	}
/*
function validatelogIn() {
        var email = document.forms["login"]["loginEmail"].value;
        var pw = document.forms["login"]["loginPassword"].value;
        var loginemail = ""; 
        var password = "";
        if ((email == loginemail) && (pw == password)) {
            return true;
        }
        else {
            var errorrpt = document.getElementById("loginpwerror");
				errorrpt.innerHTML ="Login was unsuccessful, please check your email and password";
            return false;
        }
  }
*/