	function validate(){
			var validEmail = validateEmail();
			if (validEmail)
				return true;
			return false;
	}

	function setmeup(){
		var email = document.getElementById("email");
		document.getElementById("emailerror").style.color = "#ac771a";
		email.onblur = validateEmail;   // when you lose focus
		email.onfocus = cue("emailerror");
	}

	function cue(errorid){
		var errorrpt =document.getElementById(errorid);
		errorrpt.innerHTML = "";
	}

	function validateEmail(){
		var email= document.getElementById("email").value ;

		if (email.length < 1) {
			var errorrpt =document.getElementById("emailerror");
			errorrpt.innerHTML = "Please enter your email";
			return false;
		} 

		var emailregex=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
		if (!emailregex.test(email)) {
			var errorrpt=document.getElementById("emailerror");
			errorrpt.innerHTML = "Invalid email address";
			return false;
		} 
		var errorrpt=document.getElementById("emailerror");
		errorrpt.innerHTML = "";

		return true;
	}
