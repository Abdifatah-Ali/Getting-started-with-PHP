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
$sql= "SELECT * FROM company_cars";
$records = mysql_query($sql, $DBConnect);

//This comment out code displays the contents of the fields in the fi rst row of the company_cars table in the vehicle_fleet database:


/*if ($records === FALSE) 
echo "<p>Unable to execute the query.</p>" 
. "<p>Error code " . mysql_error($DBConnect) 
. ": " . mysql_error($DBConnect) . "</p>"; 
else { 
$Row = mysql_fetch_row($records); 
echo "<p><strong>License</strong>: {$Row[0]}<br />"; 
echo "<strong>Year</strong>: {$Row[1]}<br />"; 
echo "<strong>Make</strong>: {$Row[2]}<br />"; 
echo "<strong>Model</strong>: {$Row[3]}<br />"; 
echo "<strong>Mileage</strong>: {$Row[4]}</p>"; 
}*/


//The following code shows a more complete example that uses a while statement to display all of the rows in the company_cars table to an HTML table.

$sql = "SELECT * FROM company_cars"; 
$records = @mysql_query($sql, $DBConnect); 
echo "<p><table width='50%' border='1'>\n"; 
echo "<tr><th>License</th><th>Year</th><th>Make</th> <th>Model</th><th>Mileage</th></tr>\n"; 
while (($Row = mysql_fetch_row($records)) !== FALSE) { 
echo "<tr><td>{$Row[0]}</td>"; 
echo "<td>{$Row[1]}</td>"; 
echo "<td>{$Row[2]}</td>"; 
echo "<td align='left'>{$Row[3]}</td>"; 
echo "<td align='center'>{$Row[4]}</td></tr>\n"; 
} 
echo "</table></p>\n";

?>

</body>
</html>