<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sign Guest Book</title>
</head>

<body>
<?php
	if(empty($_POST['first_name']) || empty($_POST['last_name'])) 
		echo "<p>You must enter your first and last name! Click your browser's back button to return to the Guest Book form.</p>";

		// Here we gonna connect to the database and replace host name to my MySQL server host name with my user and password:

		else { 
			$DBConnect = @mysql_connect("localhost", "root", ""); 
		   if ($DBConnect === FALSE) 
		   echo "<p>Unable to connect to the database
		  server.</p>" 
		  . "<p>Error code " . mysql_errno() 
		  . ": " . mysql_error() . "</p>";

			//Here we gonna create database named guestbook if it doesn't already exist:

		  else { 
			$DBName = "guestbook"; 
			if (!@mysql_select_db($DBName, $DBConnect)) { 
			$SQLstring = "CREATE DATABASE $DBName"; 
			$QueryResult = @mysql_query($SQLstring, $DBConnect); 
			if ($QueryResult === FALSE) 
			echo "<p>Unable to execute the
			query.</p>" 
			. "<p>Error code " . mysql_errno($DBConnect) 
			. ": " . mysql_error($DBConnect)
			. "</p>";
			else echo "<p>You are the first visitor!</p>"; 
			}
			mysql_select_db($DBName, $DBConnect);

			//Creating table named COUNT if it doesn't already exist:

			$TableName = "visitors"; 
			$SQLstring = "SHOW TABLES LIKE '$TableName'"; 
			$QueryResult = @mysql_query($SQLstring, $DBConnect); 
			if (mysql_num_rows($QueryResult) == 0) { 
			$SQLstring = "CREATE TABLE $TableName 
			(countID SMALLINT 
			NOT NULL AUTO_INCREMENT PRIMARY KEY, 
			last_name VARCHAR(40), 
			first_name VARCHAR(40))"; 
			$QueryResult = @mysql_query($SQLstring, $DBConnect);
			if ($QueryResult === FALSE) 
			echo "<p>Unable to create the table.</p>" 
			. "<p>Error code " . mysql_errno($DBConnect) 
			. ": " . mysql_error($DBConnect) . "</p>";

			//mysql_query() statements add the visitor to the database
			
			$LastName = stripslashes($_POST['last_name']); 
			$FirstName = stripslashes($_POST['first_name']); 
			$SQLstring = "INSERT INTO $TableName 
			VALUES(NULL, '$LastName', '$FirstName')"; 
			$QueryResult = @mysql_query($SQLstring, $DBConnect); 
			if ($QueryResult === FALSE) 
			echo "<p>Unable to execute the
			query.</p>" 
			. "<p>Error code " . mysql_errno($DBConnect) 
			. ": " . mysql_errno($DBConnect) . "</p>"; 
			else 
			echo "<h1>Thank you for signing
					our guest book!</h1>"; 
			} 
			mysql_close($DBConnect); 	
		}
	}
?>
</body>
</html>