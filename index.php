<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Aliens Abducted Me - Report an Abduction</title>
	<style>
		.error={color:#FF00000;}
	</style>
</head>
<body>
<? 
	// define the variable and set to empty values
	$nameErr=$mailErr=$websitErr="";
	$name=$mail=$websit=$commit=$gender="";
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
		echo 'jump into';
		if (empty($_POST['name'])) {
			$nameErr="name is required";
		} else {
			echo 'into name';
			$name=test_input($_POST['name']);
			//check if name only contain the letters 
			if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
				echo 'into nameErr';
				$nameErr="only letters and white space allowed";
			}
		}
		if (empty($_POST['mail'])) {
			$mailErr="E-mail is required";

		} else {
			$mail=test_input($_POST['mail']);
			//check the mail address 
			if (!filter_var($mail,FILTER_VALIDATE_EMAIL)) {
				$mailErr="Invalid email format";
			}
		}
		if (empty($_POST['webist'])) {
			$webist="";
		} else {
			$webist=test_input($_POST['websit']);
			//check if websit address is valid
			$regx="/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i";
			if (!preg_match($regx,$webist)) {
				$websitErr="Invalid URL";
			}
		}
		if (empty($_POST['commit'])) {
			$commit="";
			
		} else {
			$commit=test_input($_POST['commit']);
		}
		if (empty($_POST['gender'])) {
			$gender="";
		} else {
			$gender=test_input($_POST['gender']);
		}
	}
	function test_input($data) {
		$data=trim($data);
		$data=stripslashes($data);
		$data=htmlspecialchars($data);
		return $data;	
	}
?>
	<h1> PHP Form Validation Example </h1>
	<p> required field </p>
	<form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	Name:<input type='text' name='name'/><span class='error'>*<? echo $nameErr;?></span>
	<br><br>
	E-mail:<input type='text' name='mail'/><span class='error'>*<? echo $mailErr;?></span>
	<br><br>
	websit:<input type='text' name='websit'/><span class='error'>*<? echo $websitErr;?></span>
	<br><br>
	commit:<textarea type='text' rows='5' cols='30' name='commit'></textarea>
	<br><br>
	Gender:<input type='radio' name='gender' value='Female'/>
	<input type='radio' name='gender' value='Male'/><span class='error'>*<?echo $genderErr;?></span>
	<br><br>
	<input type='submit' name='submit'/>
	
	</form>
	<form action='courselist.php' method='post'>
		<input type='submit' name='submit'/>
	</form>
	
	<h2> Your Input: </h2>
<?
	echo $name;
	echo "<br>";
	echo $mail;
	echo "<br>";
	echo $webist;
	echo "<br>";
	echo $commit;
	echo "<br>";
	echo $gender;

	echo 'ddddd';

?>
