
function validatelogIn() {
		var emailValid = validateloginEmail();
		var pwValid = validateloginPw();
		if (emailValid && pwValid)
			//header("Location: .../memberpage.php")
			return true;
		return false;
	}
	
function validateloginEmail() {
	var email = document.forms["loginform"]["loginEmail"].value;
		if (email.length<1) {
			var errorrpt = document.getElementById("loginemailerror");
			errorrpt.innerHTML = "Please fill out your email.";
			return false;
			}
		return true;
		
	}
	
function validateloginPw () {
	var pw = document.forms["loginform"]["loginPassword"].value;
		if (pw.length<1) {
			var errorrpt = document.getElementById("loginpwerror");
				errorrpt.innerHTML = "Please fill out your password.";
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

