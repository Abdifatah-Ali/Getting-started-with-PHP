<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Odd Numbers</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
   echo "<p>The odd numbers between 1 and 100 are: ";
   $i = 1;
   while ($i <= 100) {
      echo " $i";
      $i = $i + 2;
   }
   echo "</p>";
?>
</body>
</html>