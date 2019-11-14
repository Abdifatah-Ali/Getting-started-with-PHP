<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Guest Book Posts</title>
</head>

<body>
<?php

	// Here we gonna connect to the database and replace host name to my MySQL server host name with my user and password:

	$DBConnect = @mysql_connect("localhost", "root", ""); 
	if ($DBConnect === FALSE) 
	echo "<p>Unable to connect to the database
	server.</p>" 
	. "<p>Error code " . mysql_errno() 
	. ": " . mysql_error() . "</p>";

	//Here we gonna connect to the guestbok database If the database does not exist, a message reports that the guest book does not contain any entries:

	else { $DBName = "guestbook"; 
		if (!@mysql_select_db($DBName, $DBConnect)) 
		echo "<p>There are no entries in the guest book!</p>";

	//Here we gonna add a code that salects all the records in the visitors table. If no records are returned, a message reports that the guest book does not contain any entries:

	else { $TableName = "visitors"; 
		$SQLstring = "SELECT * FROM $TableName"; 
		$QueryResult = @mysql_query($SQLstring, $DBConnect); 
		if (mysql_num_rows($QueryResult) == 0) 
		echo "<p>There are no entries in the guest book!</p>";
	
	//Here's a code that displays the records returned from the visitors table:
	
	else { echo "<p>The following visitors have 
		signed our guest book:</p>"; 
		echo "<table width='100%' border='1'>"; 
		echo "<tr><th>First Name</th><th>LastName</th></tr>"; 
		while (($Row = mysql_fetch_assoc($QueryResult)) !== FALSE) { 
		echo "<tr><td>{$Row['first_name']}</td>";   
		echo "<td>{$Row['last_name']}</ td></tr>"; 
		}

	// Finally, we gonna add a code that closes the database connection and the result pointer:

	} 
	mysql_free_result($QueryResult); 
	} mysql_close($DBConnect); 
}

?>
</body>
</html>