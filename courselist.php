<!DOCTYPE html>
<?php
if (file_exists('course.xml'))
  {
    $xml = simplexml_load_file('course.xml');

    echo 'dfdfdf';
  }

else
  {
  exit('Error.');
  }
?>
<html>
<head>
    <style>
        h1 { color:red;}
    </style>
	<title> class of software nju</title>



</head>
<body>
		<h1> The Course of NJU Software </h1>
    	
		<?php
			print ("<ul>");	
			foreach ($xml->course as $class) {
				print("<li>");          		
				print($class->name);
                print("</li>");
            }
			print ("</ul>")
           ?>
    </ul>
</body>
</html>