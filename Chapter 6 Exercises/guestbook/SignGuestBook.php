<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Sign Guest Book</title>
</head>

<body>
<?php
	if(empty($_GET['guest_name']) || empty($_GET['email'])){
		echo "<p>You must enter your first and last name! Click your browser's back button to return to the Guest Book form.</p>";
	} else {
		$GuestName = addslashes($_GET['guest_name']);
		$EmailAddress =	addslashes($_GET['email']);
		$GuestBook = fopen( "guestbook.txt", "a");
		
		if (is_writable("guestbook.txt")) {
			if (fwrite($GuestBook, $GuestName . "," . $EmailAddress . "\n")){
				echo "<p>Thank you for signing our guest book!</p>";
			} else {
				echo "<p>Cannot add your name to the guest book.</p>";
			}
		} else{
			echo "<p>Cannot write to the file.</p>";
			fclose($GuestBook);
		}
	}
	
?>
</body>
</html>