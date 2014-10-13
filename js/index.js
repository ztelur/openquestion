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
	xhr=onreadystatechange=handler(xhr);
	xhr.open("GET",url,true);
	xhr.send(null);
}
function checkName (name) {
	var url="lib/checkaccount.php?username="+name;
	check(url,checkNameHandler);
}
function checkRegisterName (name) {
	var url="lib/checkaccount.php?username="+name;
	check(url,checkRegisterNameHandler);
}
function checkEmail (email) {
	var url="lib/checkaccount.php?email="+email;
	check(url,checkEmail);	
}
function checkRegisterNameHandler (xhr) {
	var right=getXhrText(xhr)
	if (right==null) {

	}else {

	}
}
function checkNameHandler (argument) {
	var right=getXhrText(xhr)
	if (right==null) {

	}else {

	}
}
function checkemailhandler(xhr) {
	var right=getXhrText(xhr)
	if (right==null) {

	}else {
		if (right=="true") {
			//do something
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