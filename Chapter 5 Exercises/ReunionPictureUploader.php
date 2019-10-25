<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Picture Uploader</title>
<link rel="stylesheet" type="text/css" href="style.css"> 
<meta http-equiv="Content-Type"
	content="text/html; charset=iso-8859-1" />		 
</head>

<style>
	p {
	text-align: center;
	color: #001f3f;
	font-family: Helvetica, sans-serif;
}
</style>
	
<body>
<div class="main">
	<h1>Class Reunion Picture Uploader</h1><hr>
	<p>Welcome to the Class of 2021 reunion page. You can submit a picture below or view the pictures of other people have submitted on our <a class="S-page"href="ShowPictures.php">Show pictures page!</a></p>
	<form action="ReunionPictureUploader.php" method="post" enctype="multipart/form-data">
		<fieldset>
			<legend>Reunion Picture Uploader</legend>
			<p class="message">Use the form below to upload your High School reunion picture.</p>
			<label for="name">Your name:</label>
			<input type="text" id="name" name="name" placeholder="e.g. Abdifatah Ali" required=""><br>
			<label for="description">Description:</label>
			<textarea name="description" id="description" cols="50" rows="5" placeholder="Enter a brief description of the photo to display as a caption" required=""></textarea><br>
			<label for="image">
				Upload your image:<br>
				<small>Files must be under 1MB</small>
			</label>
			<input type="hidden" id="filesize" name="MAX_FILE_SIZE" value="1000000">
			<input type="file" name="image" id="image" required=""><br>
			<div class="buttons">
				<input type="reset" value="Reset" name="reset">
				<input type="submit" value="Submit" name="submit">
			</div>
		</fieldset>
	</form>
</div>

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
	echo "<p>Select an image to upload.</p>\n";
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
	echo "\n";
	
	}
	if(isset($_FILES['image']))
	{
	if(move_uploaded_file($_FILES['image']['tmp_name'],$Dir . "/" . $_FILES['image']['name'])==TRUE)
	echo "<p>This  \"".htmlentities($_FILES['image']['name'])." \" file/image has been <strong>successfully uploaded</strong>.</p>\n";
	else {
	echo "There was an error in uploading \"".htmlentities($_FILES['image']['name'])."\".\n";
	}
	}
?>

</body>
</html>