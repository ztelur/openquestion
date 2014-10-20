/*
*
*
* add the listener on the index
* 
*/
function addCheckListener () {
	var username=document.getElementById('username');
	username.addEventListener('blur',checkUsername,false);
	var username_r=document.getElementById('username_r');
	username_r.addEventListener('blur',checkRegisterName,false);
	var mail=document.getElementById('email_r');
	mail.addEventListener('blur',checkEmail);
	var pass2=document.getElementById('password_r2');
	pass2.addEventListener('blur',checkPasswordSame,false);
	var button=document.getElementById("submitbutton");
	//button.addEventListener('click',)
	
}

/*
* when it on blur call this function to check the username for two step 
* 	1 local check if contain the wrong char
*	2 Ajax to check if the name already exisit
*/
function checkUsername () {
	// body...
	var name=document.getElementById("username").value;
	if (name==null) {
		return;
	}
	if (name.match("^[a-zA-Z_]*$")=='') {  // username must be char and _ not other
		//do something
		alert("username is incorrect by input number or chinese");   //wrong
	} else if (name.length<3||name.length>9) {
		//do something
		alert("name length should in 3 ~9");
	} else {    // is right can check use Ajax

		checkNameRemote(name);
	}



}
/*
* check two password if same when register
*/
function checkPasswordSame () {

	var pass1=document.getElementById("password_r").value;
	var pass2=document.getElementById("password_r2").value;
	if (pass1!=pass2) {
		alert("two password must be the same");
	}
}
/*
*   like checkname just when register
*/
function checkRegisterName () {
	
	var name=document.getElementById("username_r").value;
	if (name==null) {
		return;
	}
	if (name.match("^[a-zA-Z_]*$")=='') {  // username must be char and _ not other
		//do something
		alert("username is incorrect by input number or chinese");
	} else if (name.length<3||name.length>9) {
		//do something
		alert("name length should in 3 ~9");
	} else {    // is right can check use Ajax
		console.log("call function");
		checkRegisterNameRemote(name);
	}	
}
/*
* check email 
*/
function checkEmail () {

	var email=document.getElementById("email_r").value;
	// index.html input type=email if brower not support html5 
	if (email==null) {
		return;
	}
	checkEmailRemote(email);
}
function checkaccount () {
	// body...

}
/*
* user ajax check the name user inputed if already exist or don;'t exist'
*/

function check (url,handler) {
	var xhr=null;
	try {
		xhr=new XMLHttpRequest();
	} catch (e) {
		xhr= new ActiveXObject("Microsoft.XMLHTTP");
	}
	if (xhr==null) {
		alert("the brower don't support Ajax");
		return;
	}
	// construct the url
	xhr.onreadystatechange=handler(xhr);
	xhr.open("GET",url,true);
	xhr.send(null);
}
function checkNameRemote (name) {
	var url="lib/checkaccount.php?username="+name;
	check(url,checkNameHandler);
}
function checkRegisterRemoteNameRemote (name) {
	var url="lib/checkaccount.php?username="+name;
	check(url,checkRegisterNameHandler);
}
function checkEmailRemote (email) {
	var url="lib/checkaccount.php?email="+email;
	check(url,checkEmail);	
}
function checkaccountRemote (usename,password) {
	var url="lib/checkaccount.php?username="+username+"&password="+password;
	checka(url,checkaccountHandler);
}
function checkaccountHandler (xhr) {
	// body...
	var right=getXhrText(xhr);
	if (right==null) {

	}else {
		if (right=="true") {   // could jump to the home.php
			document.getElementById("logform").submit();
		}
	}
}
function checkRegisterNameHandler (xhr) {
	var right=getXhrText(xhr);
	if (right==null) {

	}else {
		if (right=="true") {
			alert("name already exisit");
		}
	}
}
function checkNameHandler (xhr) {
	var right=getXhrText(xhr)
	if (right==null) {
		console.log('right==null');		
	}else {
		if (right!="true") {
			alert("name don't exisit");
		} 
		console.log('right!=true');
	}
}
function checkemailhandler(xhr) {
	var right=getXhrText(xhr)
	if (right==null) {

	}else {
		if (right=="true") {
			alert("email already exisit");
		}
	}
}

function getXhrText(xhr) {
	if (xhrStatusIsRight(xhr)) {
		 return xhr.responseText;
	}
	return;
}
function xhrStatusIsRight (xhr) {
	if (xhr.readyState==4) {
		if (xhr.status==200){
			return true;
		}
	} 
	return false;
}

