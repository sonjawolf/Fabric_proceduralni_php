//Slider

function slider(){
	var trenutna=$("#homeGallery .show");
	var sledeca=trenutna.next().length?trenutna.next() : trenutna.parent().children(":first");
	trenutna.fadeOut("slow").removeClass("show");
	sledeca.fadeIn("slow").addClass("show");
	setTimeout(slider,5000);
}



//Check JavaScript
function checkName(){

var surname=document.getElementById("surname").value;
var regSurname=/^[A-Z]{1}[a-z]{2,10}\s[A-Z]{1}[a-z]{2,10}$/;

if(!regSurname.test(surname)){
	document.getElementById("surname").style.border="2px solid #e60000";
	return false;
	}
else{
		document.getElementById("surname").style.border="2px solid #00ccff"; 
		return true;
	}
}


function checkEmail(){
var email=document.getElementById("mail").value;
var regEmail=/^[a-z]{3,19}\.[a-z]{3,19}@faabric\.com$/;

if(!regEmail.test(email)){
	document.getElementById("mail").style.border="2px solid #e60000";
	return false;
	}
	else{
		document.getElementById("mail").style.border="2px solid #00ccff"; 
		return true;
	}
}


function checkPhone(){
var phone=document.getElementById("telephone").value;
var regPhone=/^06[0-9]{1}-[0-9]{4}-[0-9]{3}$/;

if(!regPhone.test(phone)){
	document.getElementById("telephone").style.border="2px solid #e60000";
	return false;
	}
	else{
		document.getElementById("telephone").style.border="2px solid #00ccff"; 
		return true;
	}
}


function checkMess(){
var mess=document.getElementById("mess").value;

if(mess.length==0){
	document.getElementById("mess").style.border="2px solid #e60000";
	return false;
	}
else
		document.getElementById("mess").style.border="2px solid #00ccff"; 
		return true;
	}	
	
function checkPass(){
	var pass1=document.getElementById("password1").value;
	var pass2=document.getElementById("password2").value;
	
	
	if(pass1!=pass2){
		document.getElementById("password1").style.border="2px solid #e60000";
		document.getElementById("password2").style.border="2px solid #e60000";
	return false;
	}
	else{
			document.getElementById("password1").style.border="2px solid #00ccff";
			document.getElementById("password2").style.border="2px solid #00ccff"; 
		return true;
		
	
	}
	}

function focuser(){
	document.getElementById("username").focus();
}
