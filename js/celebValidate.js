	function validate() {
		var celebnameValid = validatecelebName();
		var occupValid = validateoccupation();
		var birthValid = validatebirthday();
		var wikiValid = validatewiki();
		var twitterValid = validatetwitter();
		var instaValid = validateinsta();
		if (celebnameValid && occupValid && birthValid && wikiValid && twitterValid && instaValid)
			//header("Location: http://")
			return true;
		return false;
	}
	
	function validatecelebName() {
		var pw = document.forms["newceleb"]["celebName"].value;
		if (pw.length < 1) {
			var errorrpt = document.getElementById("celebnameerror");
			errorrpt.innerHTML = "Please enter the celebrity name.";
			return false;
		}
		var errorrpt = document.getElementById("celebnameerror");
		errorrpt.innerHTML = "";
		return true;
	}
	
	function validateoccupation() {
		var pw = document.forms["newceleb"]["occupations"].value;
		if (pw.length < 1) {
			var errorrpt = document.getElementById("occuperror");
			errorrpt.innerHTML = "Please enter the celebrity name.";
			return false;
		}
		var errorrpt = document.getElementById("occuperror");
		errorrpt.innerHTML = "";
		return true;
	}
	
	function validatebirthday() {
		var pw = document.forms["newceleb"]["birthday"].value;
		if (pw.length < 1) {
			var errorrpt = document.getElementById("birtherror");
			errorrpt.innerHTML = "Please enter the celebrity name.";
			return false;
		}
		var errorrpt = document.getElementById("birtherror");
		errorrpt.innerHTML = "";
		return true;
	}
	
	function validatewiki() {
		var pw = document.forms["newceleb"]["wiki"].value;
		if (pw.length < 1) {
			var errorrpt = document.getElementById("wikierror");
			errorrpt.innerHTML = "Please enter the celebrity name.";
			return false;
		}
		var errorrpt = document.getElementById("wikierror");
		errorrpt.innerHTML = "";
		return true;
	}
	
	function validatecelebName() {
		var pw = document.forms["newceleb"]["twitter"].value;
		if (pw.length < 1) {
			var errorrpt = document.getElementById("twittererror");
			errorrpt.innerHTML = "Please enter the celebrity name.";
			return false;
		}
		var errorrpt = document.getElementById("twittererror");
		errorrpt.innerHTML = "";
		return true;
	}
	
	function validatecelebName() {
		var pw = document.forms["newceleb"]["insta"].value;
		if (pw.length < 1) {
			var errorrpt = document.getElementById("instaerror");
			errorrpt.innerHTML = "Please enter the celebrity name.";
			return false;
		}
		var errorrpt = document.getElementById("instaerror");
		errorrpt.innerHTML = "";
		return true;
	}

