function validate() {
		var celebnameValid = validatecelebName();
		var descriptionValid = validateDescription();
		if (celebnameValid && descriptionValid)
			return true;
		return false;
	}
	
	function validatecelebName() {
		var name = document.forms["newrequest"]["celebName"].value;
		if (name.length < 1) {
			var errorrpt = document.getElementById("celebnameerror");
			errorrpt.innerHTML = "Please enter the celebrity name.";
			return false;
		}
		return true;
	}
	
	function validateDescription() {
		var name = document.forms["newrequest"]["description"].value;
		if (name.length < 1) {
			var errorrpt = document.getElementById("descriptionerror");
			errorrpt.innerHTML = "Please enter the description.";
			return false;
		}
		return true;
	}
	