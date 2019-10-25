<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Show Pictures</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<style>
	p {
  text-align: center;
  color: #001f3f;
  font-family: verdana, sans-serif;
}
</style>

<body>
<h1>Show Pictures</h1><hr>
	
<?php
    $Dir=".";
    if(isset($_POST['upload']))
    {
      if (empty($_POST['name'] || empty($_POST['description'])))
      echo "Enter your name and description for the image. Refresh your page to upload page.\n";

    }
    else if (!isset($_FILES['image']))
    {
      echo "<p>Your picture has been <strong>successfully uploaded</strong>, go to your project directory to see the image.</p>\n";
    }
    else {
    $Name = addslashes($_POST['name']);
    $Description = addslashes($_POST['description']);
    $FileName = $Dir . "/" . $_FILES['image']['name'];
    

    if (is_writeable("imagefile.txt"))
    {
      if (fwrite($Name . "|" .
      $Caption . "|" . $FileName . "\n"))
      echo "The uploading is successful. Thank you for uploading the picture!\n";
      else
      echo "Cannot upload your picture to our site.\n";
    }
    else
    echo "Cannot write to the file.\n";
    
    }
    if(isset($_FILES['image']))
    {
    if(move_uploaded_file($_FILES['image']['tmp_name'],$Dir . "/" . $_FILES['image']['name'])==TRUE)
    echo "File \"".htmlentities($_FILES['image']['name']). "\"The image is successfully uploaded.\n";
    else {
    echo "There was an error in uploading \"".htmlentities($_FILES['image']['name'])."\".\n";
    }
    }
?>
</body>
</html>