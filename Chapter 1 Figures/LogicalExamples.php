<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html ; charset=iso-8859-1" />
<title>Logical Examples</title>
</head>
<body>
<?php 
$TrueValue = true;
$FalseValue = false;
$ReturnValue = ($TrueValue ? "true" : "false"); 
echo "<p>$ReturnValue<br />"; 
$ReturnValue = ($FalseValue ? "true" : "false"); 
echo "$ReturnValue<br />"; 
$ReturnValue = ($TrueValue || $FalseValue ? "true" : "false"); 
echo "$ReturnValue<br />"; 
$ReturnValue = ($TrueValue && $FalseValue ? "true" : "false"); 
echo "$ReturnValue<br />"; 
echo "</p>";
?>
</body>
</html>