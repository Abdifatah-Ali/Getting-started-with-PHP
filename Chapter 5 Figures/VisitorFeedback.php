<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Visitor Feedback</title>
</head>
<body>
     <h1>Visitor Feedback</h1><hr/>
     <?php
          $Dir = "comments"; 
          if (is_dir($Dir)) { 
          $CommentFiles = scandir($Dir); 
          foreach ($CommentFiles as $FileName) { 
          if (($FileName != ".") && ($FileName != 
          "..")) { 
          echo "$FileName<br />"; 

          /*echo "<pre>\n"; $Comment = file_get_contents 
          ($Dir . "/" . $FileName); 
          echo $Comment;                                    //This code will be replaced with the bottom code:
          echo "</pre>\n";                                     
          echo "<hr />\n";*/
          
          /*$Comment = file($Dir . "/" . $FileName);*/ //This code will be replaced with the fopen() statement as shown below:
          
          $fp = fopen($Dir . "/" . $FileName, "rb"); //Starts here: 
          if ($fp === FALSE) 
          echo "There was an error reading file \"" . 
          $FileName . "\".<br />\n"; 
          else { //Ends here     

          /*echo "From: " . htmlentities($Comment[0]) . "<br />\n";
          echo "Email Address: " . htmlentities($Comment[1]) . 
          "<br />\n"; 
          echo "Date: " . htmlentities($Comment[2]) . "<br />\n"; $CommentLines = count($Comment);  THIS COD WILL BE REPLACED fgets() statement.
          echo "Comment:<br />\n"; 
          for ($i = 3; $i < $CommentLines; ++$i) { 
          echo htmlentities($Comment[$i]) . "<br />\n"; 
          }*/ 

          echo "From <strong>$FileName</strong><br />"; //Starts here:
          $From = fgets($fp); 
          echo "From: " . htmlentities($From) . "<br />\n"; 
          $Email = fgets($fp); echo "Email Address: " . 
          htmlentities($Email) . "<br />\n"; 
          $Date = fgets($fp); 
          echo "Date: " . htmlentities($Date) . "<br />\n"; 
          echo "Comment:<br />\n"; $Comment = ""; 
          while (!feof($fp)) { $Comment .= fgets($fp); 
          } 
          echo htmlentities($Comment) . "<br />\n"; 
          echo "<hr />\n";
     }
          fclose($fp); //Ends here
          }
     } 
}
      ?>
</body>
</html>