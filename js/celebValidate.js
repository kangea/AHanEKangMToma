	function validate() {
		var celebnameValid = validatecelebName();
		var occupValid = validateoccupation();
		var birthValid = validatebirthday();
		var wikiValid = validatewiki();
		var twitterValid = validatetwitter();
		var instaValid = validateinsta();
		if (celebnameValid && occupValid && birthValid && wikiValid && twitterValid && instaValid)
			return true;
		return false;
	}
	
	function validatecelebName() {
		var name = document.forms["newceleb"]["celebName"].value;
		if (name.length < 1) {
			var errorrpt = document.getElementById("celebnameerror");
			errorrpt.innerHTML = "Please enter the celebrity name.";
			return false;
		}
		return true;
	}
	
	function validateoccupation() {
		var occupations = document.forms["newceleb"].occupations;
		var length = occupations.length;
		var errorrpt = document.getElementById("occuperror");
		for (var i=0;i<length;i++){
			if (occupations[i].checked){
				return true;
			}
		}
		errorrpt.innerHTML = "Please enter the occupation.";
		return false;
	}
	
	function validatebirthday() {
		var birthday = document.forms["newceleb"]["birthday"].value;
		if (birthday.length < 1) {
			var errorrpt = document.getElementById("birtherror");
			errorrpt.innerHTML = "Please enter the birthday.";
			return false;
		}
		return true;
	}
	
	function validatewiki() {
		var wiki = document.forms["newceleb"]["wiki"].value;
		if (wiki.length < 1) {
			var errorrpt = document.getElementById("wikierror");
			errorrpt.innerHTML = "Please enter the Wikipedia page.";
			return false;
		}
		return true;
	}
	
	function validatetwitter() {
		var twitter = document.forms["newceleb"]["twitter"].value;
		if (twitter.length < 1) {
			var errorrpt = document.getElementById("twittererror");
			errorrpt.innerHTML = "Please enter the Twitter page.";
			return false;
		}
		return true;
	}
	
	function validatetwitterID() {
		var twitter = document.forms["newceleb"]["twitterID"].value;
		if (twitter.length < 1) {
			var errorrpt = document.getElementById("twitterIDerror");
			errorrpt.innerHTML = "Please enter the Twitter page.";
			return false;
		}
		return true;
	}
	
	function validateinsta() {
		var insta = document.forms["newceleb"]["insta"].value;
		if (insta.length < 1) {
			var errorrpt = document.getElementById("instaerror");
			errorrpt.innerHTML = "Please enter the Instagram page.";
			return false;
		}
		return true;
	}

