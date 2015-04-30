	function validate(){
			var validPassword = validatePassword();
			var validGroup = validateGroup();
			if (validPassword && validateGroup)
				return true;
			return false;
	}

	function setmeup(){
		var subject = document.getElementById("subject");
		document.getElementById("subjecterror").style.color = "#ac771a";
		subject.onblur = validateSubject;   // when you lose focus
		subject.onfocus = cue("subjecterror");

		var message = document.getElementById("message");
		document.getElementById("messageerror").style.color = "#ac771a";
		message.onblur = validateMessage;   // when you lose focus
		message.onfocus = cue("messageerror");

		var password = document.getElementById("mailpassword");
		document.getElementById("passworderror").style.color = "#ac771a";
		password.onblur = validatePassword;   // when you lose focus
		password.onfocus = cue("passworderror");
	}

	function cue(errorid){
		var errorrpt =document.getElementById(errorid);
		errorrpt.innerHTML = "";
	}

	function validateSubject(){
		var subject= document.getElementById("subject").value ;

		if (subject.length < 1) {
			var errorrpt =document.getElementById("subjecterror");
			errorrpt.innerHTML = "No Subject!";
			return false;
		} 

		var errorrpt=document.getElementById("subjecterror");
		errorrpt.innerHTML = "";

		return true;
	}

	function validateMessage(){
		var message= document.getElementById("message").value ;

		if (message.length < 1) {
			var errorrpt =document.getElementById("messageerror");
			errorrpt.innerHTML = "No Message!";
			return false;
		} 

		var errorrpt=document.getElementById("messageerror");
		errorrpt.innerHTML = "";

		return true;
	}

	function validatePassword(){
		var password= document.getElementById("mailpassword").value ;
		
		if (password.length < 8) {
			var errorrpt=document.getElementById("passworderror");
			errorrpt.innerHTML = "Please enter the password";
			return false;
		} 
		var errorrpt=document.getElementById("passworderror");
		errorrpt.innerHTML = "";

		return true;
	}

	function validateGroup(){
		var Slytherin=document.forms["send"].Slytherin;
		var Hufflepuff=document.forms["send"].Hufflepuff;
		var Gryffindor=document.forms["send"].Gryffindor;
		var Ravenclaw=document.forms["send"].Ravenclaw;

		var houselist="";
		
		if (Slytherin.checked)
			houselist= Slytherin.value;

		if (Hufflepuff.checked)
			if (houselist)
				houselist += ", " + Hufflepuff.value;
			else
				houselist= Hufflepuff.value;
		
		if (Gryffindor.checked)
			if (houselist)
				houselist += ", " + Gryffindor.value;
			else
				houselist= Gryffindor.value;

		if (Ravenclaw.checked)
			if (houselist)
				houselist += ", " + Ravenclaw.value;
			else
				houselist= Ravenclaw.value;
			
		if (!houselist) {
			houselist = "None";
			var errorrpt=document.getElementById("grouperror");
			errorrpt.innerHTML = "Please select recipients";
			return false;
		}

		return true;
	}