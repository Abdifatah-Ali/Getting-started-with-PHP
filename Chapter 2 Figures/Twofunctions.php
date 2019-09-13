<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 STRICT//EN"
"http://www.w3.org/TR/xhtml/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html ; charset=iso-8859-1" />
<title>Two Functions</title>
</head>
<body>
<?php 
function displayMessage($FirstMessage) {
    echo "<p>$FirstMessage</p>";
}

function returnMessage() {
    return "<p>This message was returned from a function.</p>";
}

displayMessage("This message was displayed from a function.");
$ReturnValue = returnMessage();
echo $ReturnValue;
?>
</body>
</html>