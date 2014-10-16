<?
	/** log in home page **/
	// enable session
	session_start();

	//check username and password defense coding
if (isset($_POST["username"])&&isset($_POST["password"])) {
		// connect to the database
		if (($connection=mysql_connect('localhost','pma','082203'))===FALSE)
			die("Could connect to the database");
		if (mysql_select_db("test",$connection)===FALSE)
			die("Could select the database");
		//produce the sql language
		$sql=sprintf("SELECT * FROM user WHERE username='%s' AND password='%s'",
				mysql_escape_string($_POST["username"]),mysql_escape_string($_POST["password"]));
		//exe query
		print($sql);
		if ($result===FALSE)
			die("could not query database");
		if (mysql_num_rows($result)==1){
			$_SESSION["authenticated"]=TRUE;
		} else {
			$_SESSION["authenticated"]=FALSE;
		}
        }
        // for test user
     	
?>
<html>
<head>
	<title>Home</title>

</head>
<body>
	<h1>Home</h1>
	<h3>
		<? if ($_SESSION["authenticated"]) { ?>
		You are loged in.
		<? } else { ?>
		You not lgoed in 
		<? }          ?>
	<h3>
	<p>this is a task to pratice </p>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">file:</label>
        <input type="file" id="file" name="file"/>
        <input type="submit"  name="submit" value="Submit"/>
        <div id="inner_editor" class="inner_editor" g_editable="true" contenteditable="true">
        </div>
            <div id="editor">
      		Go ahead&hellip;
    	</div>
  	</div>
        </form>
  

</body>
</html>
