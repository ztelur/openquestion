<?

if (isset($_GET["username"])&&isset($_GET["password"])) {
		// connect to the database
		if (($connection=mysql_connect('localhost','pma','082203'))===FALSE)
			die("Could connect to the database");
			
		if (mysql_select_db("test",$connection)===FALSE)
			die("Could select the database");
		
		//produce the sql language
		$sql=sprintf("SELECT * FROM user WHERE username='%s' AND password='%s'",
				mysql_escape_string($_GET["username"]),mysql_escape_string($_GET["password"]));
		//exe query
		$result=mysql_query($sql);
		
		if ($result===FALSE)
			die("could not query database");
		if (mysql_num_rows($result)==1){
			// $_SESSION["authenticated"]=TRUE;
			print "true";
		}
        }


?>