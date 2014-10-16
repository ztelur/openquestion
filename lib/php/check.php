<?
require("sqllib.php");
/* check information for account email and name
*/
function checkname($username)
{	
	$sql=sprintf("SELECT 1 FROM user WHERE username='%s'",mysql_escape_string($username));
	$result=execsql($sql);
	if (mysql_num_rows($result)==1) {
		print "true";
	} else {
		print "false";
	}

}
function checkemail($email)
{
	$sql=sprintf("SELECT 1 FROM user WHERE email='%s'",mysql_escape_string($email));
	$result=execsql($sql);
	if (mysql_num_rows($result)==1) {
		print "true";
	} else {
		print "false";
	}
}
function checkaccount($username,$password)
{
	$sql=sprintf("SELECT 1 FROM user WHERE username='%s' AND password='%s'",mysql_escape_string($username),mysql_escape_string($password));
	$result=execsql($sql);
	if (mysql_num_rows($result)==1) {
		print "true";
	} else {
		print "false";
	}

}
/*
* check many thing to do it 
*/
function checkregister($username,$email,$password1,$password2) 
{
	//check username
	if ($password1==$password2) {
		$sql=sprintf("SELECT 1 FROM user WHERE username='%s'",mysql_escape_string($username));
		$result=execsql($sql);
		if (mysql_num_rows($result)>=1) {
			print "username";
		} else {
			$sql=sprintf("SELECT 1 FROM user WHERE email='%s'",mysql_escape_string($email));
			$result=execsql($sql);
			if (mysql_num_rows($result)>=1) {
				print "email";
			}else {  // insert into
				$sql=sprintf("INSERT INTO user (username,password,email) VALUES ('%s','%s','%s')",mysql_escape_string($username),
						mysql_escape_string($password1),mysql_escape_string($email));
				$result=execsql($sql);
				print "true";
			}
		}
	} else {
		print "password";
	}
}
?>