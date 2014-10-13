var xhr=null;
/*
 check the account information is right when log in 
*/
function checkaccount () {
	try {
		xhr=new XMLHttpRequest();
	} catch (e) {
		xhr=new ActiveXObject("Microsoft.XMLHTTP");
	}
	// handle the old browers
	if (xhr==null) {
		alert("Ajax not support by your browers");
		return ;
	}
	//construct the url
	var url="lib/checkaccount.php?username="+document.getElementById('username').value+"&password="+document.getElementById('password').value;
	// send the information
	xhr.onreadystatechange=handler;
	xhr.open("GET",url,true);
	xhr.send(null);
	
}
/*
*void
* 	handler()
*	handle the Ajax respone
*/ 
function handler () {
	// only handle the load request
	if (xhr.readyState==4) {
		if (xhr.status==200) {
			var right=xhr.responseText;
			var showmessage=null;
			alert(right);
			// document.getElementById("showmessage").innerHTML=showmessage;
			if (right=="true") {
				showmessage="yes";
			} else {
				showmessage="no";
			}
			document.getElementById("showmessage").innerHTML=showmessage;
		}
	}
}