<?
function execsql($sql)
{
	if (($connection=mysql_connect('localhost','pma','082203'))===FALSE)
		die("Could connect to the database");

	if (mysql_select_db("test",$connection)===FALSE)
		die("Could select the database");
	$result=mysql_query($sql);


	if ($result===FALSE)
		// print($sql);
		printf("could not query database %s",$sql);
	return $result;
}


?>