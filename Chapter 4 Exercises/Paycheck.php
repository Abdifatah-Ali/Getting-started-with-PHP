<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type"
	content="text/html; charset=iso-8859-1" />
<title>Paycheck Results</title>
<style type="text/css">
     .style1 {
          color: #333;
          text-align: center;
         }
     #header {
          font-family: verdana;
          color: #008000;
          font-size: 28px;
          text-transform: uppercase;
          text-align: center;
		 }
	 .button {
          background-color: #333;
          color: #fff;
          padding: 10px 15px;
          border: none;
          margin-top: 10px;
          border-radius: 5px;
		  font-size: 0.9em;
		  text-decoration: none;
		  font-size: 1em;
		  font-family: sans-serif;
        }
     .button:hover {
          background-color: red;
          color: white;
		}
	  p {
          color: #000;
          font-size: 1em;
		  font-family: sans-serif;
		  list-style: square;
		  border-bottom: dotted 1px #333;
	   }
	  .style2 {
		  margin-top: 50px;
          border: 1px solid #333;
          max-width: 300px;
          margin: 15px auto;
          padding: 60px 20px;
          background: #DCDCDC;
          border-radius: 8px;
          box-sizing: border-box;
	  } 
</style>		 
</head>
<body>
	<div class="style1">
		<h1 id="header">Employee's Weekly Gross Salary</h1><hr />
		<div class="style2">
			<?php
				$hours = (int) $_POST["hours"];
				$wages = (int) $_POST["wage"];

				$overtime = max($hours - 40, 0);
				$pay = $overtime * $wages * 1.5;
				$pay += ($hours - $overtime) * $wages;

				echo "<p>Hours Worked: " . $hours . " hrs<br></p>";
				echo "<p>Pay rate (per hour): $" . number_format($wages, 2) . "<br></p>";
				echo "<p>Overtime Hours: " . $overtime . " hrs<br></p>";
				echo "<p>Your Paycheck is: $" . number_format($pay, 2) . "<br></p>";
			?>
		</div>	
		<a class="button" href="Paycheck.html">Calculate another paycheck</a>
	</div>
</body>
</html>