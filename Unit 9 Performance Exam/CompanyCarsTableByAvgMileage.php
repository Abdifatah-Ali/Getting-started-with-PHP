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
$sql= "SELECT year, AVG(mileage) FROM company_cars GROUP BY year";
$records = mysql_query($sql, $DBConnect);

//The following code will return the average mileage for each model year:

$sql= "SELECT year, AVG(mileage) FROM company_cars GROUP BY year"; 
$records = @mysql_query($sql, $DBConnect); 
echo "<table width='20%' border='1'>\n"; 
echo "<tr><th>Year</th><th>Mileage</th></tr>\n"; 
while (($Row = mysql_fetch_row($records)) !== FALSE) {     
echo "<tr><td>{$Row[0]}</td>";    
echo "<td>{$Row[1]}</td></tr>\n";  
} 
echo "</table>\n";

?>
</body>
</html>