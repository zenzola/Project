	function validate(){
			var validFirstName = validateFirstName();
			var validLastName = validateLastName();
			var validEmail = validateEmail();
			var validHouse = validateHouse();
			var validPassword = validatePassword();
			var validPassword2 = validatePassword2();
			
			if (validFirstName && validLastName && validEmail && validHouse && validPassword && validPassword2)
				return true;
			
			return false;
	}

	function setmeup(){
		var firstname = document.getElementById("firstname");
		document.getElementById("firstnameerror").style.color = "#ac771a";
		firstname.onblur = validateFirstName;   // when you lose focus
		firstname.onfocus = cue("firstnameerror");

		var lastname = document.getElementById("lastname");
		document.getElementById("lastnameerror").style.color = "#ac771a";
		lastname.onblur = validateLastName;   // when you lose focus
		lastname.onfocus = cue("lastnameerror");

		var email = document.getElementById("email");
		document.getElementById("emailerror").style.color = "#ac771a";
		email.onblur = validateEmail;   // when you lose focus
		email.onfocus = cue("emailerror");

		var password = document.getElementById("password");
		document.getElementById("passworderror").style.color = "#ac771a";
		password.onblur = validatePassword;   // when you lose focus
		password.onfocus = cue("passworderror");

		var password2 = document.getElementById("password2");
		document.getElementById("password2error").style.color = "#ac771a";
		password2.onblur = validatePassword2;   // when you lose focus
		password2.onfocus = cue("password2error");

		var house = document.getElementById("house");
		document.getElementById("houseerror").style.color = "#ac771a";
		house.onblur = validateHouse;   // when you lose focus
		house.onfocus = cue("houseerror");
	}

	function cue(errorid){
		var errorrpt =document.getElementById(errorid);
		errorrpt.innerHTML = "";
	}

	function validateFirstName(){
		var firstname= document.forms["join"]["firstname"].value ;
		
		if (firstname.length < 1) {
			var errorrpt =document.getElementById("firstnameerror");
			errorrpt.innerHTML = "Please enter a name";
			return false;
		} 

		var tomatch = /^\w{2,}$/;
		if (!tomatch.test(firstname)) {
			var errorrpt =document.getElementById("firstnameerror");
			errorrpt.innerHTML = "Hey, you know, your name should be longer than that!";
			return false;
		}

		var errorrpt=document.getElementById("firstnameerror");
		errorrpt.innerHTML = "";

		return true;
	}

	function validateLastName(){
		var lastname= document.forms["join"]["lastname"].value ;
		
		if (lastname.length < 1) {
			var errorrpt =document.getElementById("lastnameerror");
			errorrpt.innerHTML = "Please enter a name";
			return false;
		} 

		var tomatch = /^\w{2,}$/;
		if (!tomatch.test(lastname)) {
			var errorrpt =document.getElementById("lastnameerror");
			errorrpt.innerHTML = "Hey, you know, your name should be longer than that!";
			return false;
		}

		var errorrpt=document.getElementById("lastnameerror");
		errorrpt.innerHTML = "";

		return true;
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

	function validatePassword(){
		var password= document.getElementById("password").value ;
		
		if (password.length < 8) {
			var errorrpt=document.getElementById("passworderror");
			errorrpt.innerHTML = "Please enter a password with at least 8 characters";
			return false;
		} 
		var errorrpt=document.getElementById("passworderror");
		errorrpt.innerHTML = "";

		return true;
	}

	function validatePassword2(){
		var password2= document.getElementById("password2").value ;
		
		if (password2.length < 8) {
			var errorrpt=document.getElementById("password2error");
			errorrpt.innerHTML = "Please confirm your password";
			return false;
		} 

		var password= document.getElementById("password").value ;
		if (password != password2) {
			var errorrpt=document.getElementById("password2error");
			errorrpt.innerHTML = "Passwords don't match!";
			return false;
		} 

		var errorrpt=document.getElementById("password2error");
		errorrpt.innerHTML = "";

		return true;
	}

	function validateHouse(){
		var house=  document.forms["join"].house ;
		var houselength = house.length;
				
		for (var i=0; i < houselength; i++){
			if (house[i].checked) {
				return true;
			}
		}
		var errorrpt=document.getElementById("houseerror");
		errorrpt.innerHTML = "Please select a house!";
		return false;
		
	}





