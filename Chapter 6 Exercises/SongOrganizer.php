<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Song Organizer</title>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />

	<style type="text/css">
		body
		{
			font-family: Arial, sans-serif;
			background-color: #D4D1C5;
		}

		h1
		{
			font-family: verdana;
			color: #800000;
			font-size: 28px;
			text-transform: uppercase;
			text-align: center;
		}

		.container
		{
			margin: 0 auto;
			width: 730px;
		}

		table 
		{
			background-color: #E6E4DD;
			border: 1px solid black;
		}

		table, td
		{
			border:1px solid black;
			width: 100%;
		}

		input[type="text"]
		{
			padding: 3px;
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

		.action
		{
			padding-top: 5px;
			float: right;
			text-align: right;
			
		}

		.action a
		{
			margin-top: 5px;
		}

		/* .links {
			margin: 20px;
			text-decoration: none;
			padding: 20px;
			color: #333;
		} */

	</style>

</head>
<body>
	<div class="container">
		<h1>Song Organizer</h1>
		<?php
			// PART 1:  if there's an action to perform
			if (isset($_GET['action'])) 
			{
				// if the file exists and there's something in it
				if ((file_exists("SongOrganizer/songs.txt")) 
					&& (filesize("SongOrganizer/songs.txt") 
					!= 0)) {
					
					// create an array of strings from the file
					$SongArray = file("SongOrganizer/songs.txt");
					// check the action and do the right thing
					switch ($_GET['action']) 
					{
						case 'Remove Duplicates': 
							$SongArray = array_unique($SongArray);
							$SongArray = array_values($SongArray);
							break;
						case 'Sort Ascending': 
							sort($SongArray);
							break;
						case 'Shuffle': 
							shuffle($SongArray);
							break;
						/*case 'Delete Song': 
							if (isset($_GET['SongName'])) 
							{
								$Index = $_GET['SongName'];
								unset($SongArray[$Index]);                     
								$SongArray = array_values($SongArray);
							}
							break;*/
					} // end of the switch action
					
					// if there are still songs left after the action
					if (count($SongArray) > 0) {
						// create one big string and open the file
						$NewSongs = implode($SongArray);
						$SongStore = fopen("SongOrganizer/songs.txt", "wb");
						// if the file doesn't open
						if ($SongStore === false)
							echo "There was an error updating the song file\n";
						// otherwise write the string and close the file
						else 
						{
							fwrite($SongStore, $NewSongs);
							fclose($SongStore);
						}
					}
					// there were no songs left after the action so delete the file
					else
					{
						unlink("SongOrganizer/songs.txt");
					}
				} // end file exists
			}  // end there's an action
		
			// PART 2: if the user is trying to add a song to the list
			if (isset($_POST['submit'])) 
			{
				// get rid of the slashes if magic quotes is on 
				$SongToAdd = stripslashes($_POST['SongName']) . "\n";
				// create a string with the song name and then a newline character
				$ExistingSongs = array();
				// make sure that the song is not in the file before adding it
				// start by creating an array to hold the songs

				// if the file exists and there are records in it
				if ((file_exists("SongOrganizer/songs.txt")) && (filesize("SongOrganizer/songs.txt") > 0)) 
				{
					// read the file into the array of songs
					$ExistingSongs = file("SongOrganizer/songs.txt");
				}
				// if the song is already in the array display a message
				if (in_array($SongToAdd, $ExistingSongs)) 
				{
					echo "<p>The song you entered already exists!<br />\n";
					echo "Your song was not added to the list.</p>";
				}
				// append the song to the file because its not a duplicate
				else {
					// open the file
					$SongFile = fopen("SongOrganizer/songs.txt", "ab");
					// if there's a problem display a message
					if ($SongFile === false)
						echo "There was an error saving your message!\n";
					// otherwise write the string and close the file
					else 
					{
						fwrite($SongFile, $SongToAdd);
						fclose($SongFile);
						echo "Your song has been added to the list.\n";
					}
				}
			} // end adding a new song
		
			// PART 3:  whew!  All that is over.  Now display the songs
			// if there aren't any songs
			if ((!file_exists("SongOrganizer/songs.txt")) || (filesize("SongOrganizer/songs.txt") == 0))
				echo "<p>There are no songs in the list.</p>\n";
			// there are songs so ...
			else 
			{
				// read the file into an array of strings
				$SongArray = file("SongOrganizer/songs.txt");
				// write the opening table tag
				echo "<table width=\"100%\">\n";

						foreach ($SongArray as $Song) { 
							echo "<tr>\n"; 
							echo "<td>" . htmlentities($Song) . 
							"</td>"; 
							echo "</tr>\n"; 
							} 
							echo "</table>\n"; 
							}
		?>
		<div class="action">
		<p> 
			<a href="SongOrganizer.php?action=Sort%20Ascending"> 
			Sort Song List</a><br /> 
			<a href="SongOrganizer.php?action=Remove%20Duplicates"> 
			Remove Duplicate Songs</a><br /> 
			<a href="SongOrganizer.php?action=Shuffl e"> 
			Randomize Song list</a><br /> 
			</p>
		</div>
		
		<!-- the form is used to add a song to the list -->
		
		<form action="SongOrganizer.php" method="post">
			<p>Add a New Song</p>
			<p>Song Name: <input type="text" name="SongName" required /></p>
			<p><input class="button" type="submit" name="submit" value="Add Song to List" />
			<input class="button" type="reset" name="reset" value="Reset Song Name" /></p>
		</form>
	</div>
</body>
</html>

