<!-- check infomation for the username email and account -->
<?
require("sqllib.php");
/*
*/
public function checkname($username)
{
	$sql=sprintf("SELECT 1 FROM user WHERE username='%s'",mysql_escape_string($username));
	$result=query($sql);
	if (mysql_num_rows(result)==1) {
		print "true";
	} else {
		print "false";
	}
}
public function checkmail($email)
{
	$sql=sprintf("SELECT 1 FROM user WHERE email='%s'",mysql_escape_string($email));
	$result=query($sql);
	if (mysql_num_rows(result)==1) {
		print "true";
	} else {
		print "false";
	}
}
public function checkaccount($username,$password)
{
	$sql=sprintf("SELECT 1 FROM user WHERE username='%s' AND password='%s'",
				mysql_escape_string(username),mysql_escape_string(password);
	$result=query($sql);
	if (mysql_num_rows(result)==1) {
		print "true";
	} else {
		print "false";
	}

}
?>