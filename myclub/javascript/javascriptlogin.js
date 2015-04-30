function alert(message){
	alert(message);
}

function validate(){
		var validUserName = validateUserName();
		var validPassword = validatePassword();
		
		if (validUserName && validPassword)
			return true;
		
		return false;
}

function setmeup(){
		var color = "#eb9d4f";

		var username = document.getElementById("username");
		document.getElementById("usernameerror").style.color = color;
		username.onblur = validateUserName();   // when you lose focus
		username.onfocus = cue("usernameerror");

		var password = document.getElementById("password");
		document.getElementById("passworderror").style.color = color;
		password.onblur = validatePassword();
		password.onfocus = cue("passworderror");

}

function cue(errorid){
		var errorrpt =document.getElementById(errorid);
		errorrpt.innerHTML = "";
}

	
function validateUserName(){
	var username= document.getElementById("username").value ;
	
	if (username.length < 1) {
		var errorrpt=document.getElementById("usernameerror");
		errorrpt.innerHTML = "Please enter your username";
		return false;
	} 
	var errorrpt=document.getElementById("usernameerror");
	errorrpt.innerHTML = "";

	return true;
}

function validatePassword(){
	var password= document.getElementById("password").value ;
	
	if (password.length < 1) {
		var errorrpt=document.getElementById("passworderror");
		errorrpt.innerHTML = "Please enter your password";
		return false;
	} 

	var errorrpt=document.getElementById("passworderror");
	errorrpt.innerHTML = "";

	return true;
}
