/*
*
*
* add the listener on the index
* 
*/
var xhr=null;
function addCheckListener () {
    alert("dddd");
	var username=document.getElementById('username');
	username.addEventListener('blur',checkUsername,false);
	var username_r=document.getElementById('username_r');
	username_r.addEventListener('blur',checkRegisterName,false);
	var mail=document.getElementById('email');
	mail.addEventListener('blur',checkEmail);
	var pass2=document.getElementById('password2');
	pass2.addEventListener('blur',checkPasswordSame,false);
	var button=document.getElementById("submitbutton");
	button.addEventListener('click',checkaccount,false);
	var button=document.getElementById("submitbutton_r");
	button.addEventListener("click",checkRegister,false);
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
function checkRegister () {
	var name_r=document.getElementById("username_r").value;
	var email_r=document.getElementById("email").value;
	var password1=document.getElementById("password1").value;
	var password2=document.getElementById("password2").value;
	if (name_r!=null&&email_r!=null&&password1!=null&&password2!=null) {
		checkRegisterRemote(name_r,email_r,password1,password2);
	}

}
/*
* check two password if same when register
*/
function checkPasswordSame () {

	var pass1=document.getElementById("password1").value;
	var pass2=document.getElementById("password2").value;
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

	var email=document.getElementById("email").value;
	// index.php input type=email if brower not support html5
	if (email==null) {
		return;
	}
	checkEmailRemote(email);
}
function checkaccount () {
	// body...
	var username=document.getElementById("username").value;
	console.log(username);
	var password=document.getElementById("password").value;
	checkaccountRemote(username,password);
}
/*
* user ajax check the name user inputed if already exist or don;'t exist'
*/

function check (url,handler) {
	//thr is the head file xhr
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
	xhr.onreadystatechange=handler;
	xhr.open("GET",url,true);
	xhr.send(null);
}
function checkRegisterRemote (name,email,password1,password2) {
	var url="../../lib/checkaccount.php?username="+name+"&email="+email+"&password1="+password1+"&password2="+password2;
	check(url,checkRegisterHandler);
}
function checkNameRemote (name) {
	var url="../../lib/checkaccount.php?username="+name;
	check(url,checkNameHandler);
}
function checkRegisterNameRemote (name) {
	var url="../../lib/checkaccount.php?username="+name;
	check(url,checkRegisterNameHandler);
}
function checkEmailRemote (email) {
	var url="../../lib/checkaccount.php?email="+email;
	check(url,checkemailhandler);	
}
function checkaccountRemote (username,password) {
	var url="../../lib/checkaccount.php?username="+username+"&password="+password;

	check(url,checkaccountHandler);
}
function checkRegisterHandler () {
	var right=getXhrText(xhr);
	if (right==null) {

	} else {
		if (right=="true") {
			document.getElementById("registerform").submit();
            //$()
		}
		
	}
}
function checkaccountHandler () {
	// body...

	var right=getXhrText(xhr);

	if (right==null) {

	}else {
		if (right=="true") {   // could jump to the index.php
			console.log("post form");
			document.getElementById("logform").submit();
		}
		if (right=="false") {
			alert("password or account wrong");
			document.getElementById("logform").reset();
			console.log("wrong account information");
			getFocus("username");
		}
	}
}
function checkRegisterNameHandler () {
	var right=getXhrText(xhr);
	if (right==null) {

	}else {
		if (right=="true") {
			alert("name already exisit");
			myclear("username_r");
			getFocus("username_r");
		}
	}
}
function checkNameHandler () {
	var right=getXhrText(xhr)
	if (right==null) {
		console.log('right==null');		
	}else {
		if (right!="true") {
			alert("name don't exisit");
			myclear("username");
			getFocus("username");
		} 
		console.log('right!=true');
	}
}
function checkemailhandler() {
	var right=getXhrText(xhr)
	if (right==null) {

	}else {
		if (right=="true") {
			alert("email already exisit");
			myclear("email_r");
			getFocus("email_r");
		}
	}
}

function getXhrText(xhr) {
	if (xhrStatusIsRight(xhr)) {
		 return xhr.responseText;
	}
	///TODO: check the status !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	console.log("wrong ");
	console.log(xhr.responseText);
	// return xhr.responseText;

	return;
}
function xhrStatusIsRight (xhr) {
	if (xhr.readyState==4) {
		if (xhr.status==200){
			return true;
		}
	} 
	console.log(xhr.readyState);
	console.log(xhr.status);
	return false;
}
/*
* clear the text input value 
*/
function myclear (id) {
	document.getElementById(id).value=null;
}
/*
*  get focus 
*/
function getFocus(id) {
	document.getElementById(id).focus();
}

