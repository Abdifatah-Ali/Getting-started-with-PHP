<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Company Cars Table</title>
</head>

<style type="text/css">

    body {
        color: #000;
        background-color: #f0fff0;
		font-family: 'lato', sans-serif;
	}

	table th, table td { 
		padding: 5px; 
		text-align: center; 
	}

	th {
		background-color: #333;
		color: white;
		font-family: 'lato', sans-serif;
		font-size: 18px;
	}
	

   </style>

<body>
<?php

//make connection: 
$DBConnect = @mysql_connect("localhost", "root", ""); 

//Select my database:

mysql_select_db('vehicle_fleet'); 
$sql= "SELECT make, model FROM company_cars ORDER BY make, model";
$records = mysql_query($sql, $DBConnect);

////The following code returns the make and model fields from the company_cars table in the vehicle_fleet database and reverse sorts the results by the make field:

$sql= "SELECT make, model FROM company_cars ORDER BY make, model"; 
$records = @mysql_query($sql, $DBConnect); 
echo "<table width='20%' border='1'>\n"; 
echo "<tr><th>Make</th><th>Model</th></tr>\n"; 
while (($Row = mysql_fetch_row($records)) !== FALSE) { 
echo "<tr><td>{$Row[0]}</td>";    
echo "<td>{$Row[1]}</td></tr>\n"; 
} 
echo "</table>\n";

?>
</body>
</html>