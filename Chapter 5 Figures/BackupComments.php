<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Backup Comments</title>
</head>
<body>
     <?php 
      $Source = "comments"; 
      $Destination = "backups";
      if (! is_dir($Destination)) 
      echo "The backup directory \"$Destination\" does 
      not exist.\n"; 
      else { 
      if (is_dir($Source)) { 
            $TotalFiles = 0; 
            $FilesMoved = 0; 
            $DirEntries = scandir($Source); 
            foreach ($DirEntries as $Entry) { 
            if (($Entry!=".") && ($Entry!="..")) { 
            ++$TotalFiles; 
            if (copy("$Source/$Entry", "
            $Destination/$Entry")) 
            ++$FilesMoved; 
            else 
            echo "Could not move file \"" . 
            htmlentities($Entry) . "\".<br />\n"; 
            } 
            } 
            echo "<p>$FilesMoved of $TotalFiles 
            comments successfully backed up.</p>\n"; 
            } 
            else 
            echo "<p>The source directory \"" . 
            $Source . "\" does not exist!</p>\n";
      }
     ?> 
</body>
</html>