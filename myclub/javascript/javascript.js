function alert(){
	alert("Invalid entry. Please try again!");
}

function setmeup(){
		var firstname = document.getElementById("firstname");
		firstname.onblur = validateFirstName();   // when you lose focus
	}


function validate(){
			var validFirstName = validateFirstName();
			var validLastName = validateLastName();
			var validPhone = validateEmail();
			var validPassword = validatePassword();
			var validPassword2 = validatePassword2();
			
			if (validFirstName && validLastName && validEmail && validPassword && validPassword2)
				return true;
			
			return false;
		}

function validateFirstName(){
	var firstname= document.forms["join"]["firstname"].value ;
	
	if (firstname.length < 1) {
		writetoelement("firstnameerror",
						"Please enter your name.",
						"red");
		return false;
	} 

	var tomatch = /^\w{2,}$/;
	if (!tomatch.test(nameent)) {
		writetoelement("firstnameerror",
					"Hey, you know, your name should be longer than that!",
					"red");
		return false;
	}
	writetoelement("firstnameerror","","red");

	return true;
}

	
function validateLastName(){
	var lastname= document.getElementById("lastname").value ;
	
	if (lastname.length < 1) {
		var errorrpt=document.getElementById("lastnameerror");
		errorrpt.innerHTML = "Please enter a name";
		return false;
	} 
	var errorrpt=document.getElementById("lastnameerror");
	errorrpt.innerHTML = "";

	return true;
}

function validateEmail(){
	var email= document.getElementById("email").value ;
	var emailregex=/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	
	if (!emailregex.test(email)) {
		var errorrpt=document.getElementById("emailerror");
		errorrpt.innerHTML = "Please enter your email";
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

function validatePassword(){
	var password2= document.getElementById("password2").value ;
	
	if (password2.length < 8) {
		var errorrpt=document.getElementById("password2error");
		errorrpt.innerHTML = "Please enter confirm your password";
		return false;
	} 
	var errorrpt=document.getElementById("password2error");
	errorrpt.innerHTML = "";

	return true;
}
