<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Visitor Comments</title>

<style type="text/css">
     .style1 {
          color: #333;
          text-align: center;
        }
     #header {
          font-family: verdana;
          color: #228B22;
          text-transform: uppercase;
          text-align: center;
        }
     .button {
          background-color: #333;
          color: #fff;
          padding: 10px 15px;
          border: none;
          margin-top: 10px;
        }
     .button:hover {
          background-color: red;
          color: white;
        } 
     .my-form {
          margin-top: 50px;
        }
</style>
</head>
<body>
     <div class="style1">
          <?php 
               $Dir = "comments"; 
               if (is_dir($Dir)) { 
               if (isset($_POST['save'])) { 
               if (empty($_POST['name'])) 
               $SaveString = "Unknown Visitor\n"; 
               else 
               $SaveString = stripslashes 
               ($_POST['name']) . "\n"; 
               $SaveString .= stripslashes 
               ($_POST['email']) . "\n"; 
               $SaveString .= date('r') . "\n"; 
               $SaveString .= stripslashes 
               ($_POST['comment']); 
               $CurrentTime = microtime(); 
               $TimeArray = explode(" ", $CurrentTime); 
               $TimeStamp = (float)$TimeArray[1] + (float)$TimeArray[0];

               /* File name is " Comment.seconds. microseconds.txt" */

               $SaveFileName = "$Dir/Comment.$TimeStamp. txt"; 
               
               /*if (file_put_contents($SaveFileName, 
               $SaveString)>0) 
               echo "File \"" . htmlentities 
               ($SaveFileName) .                                 This code will be replaced with the bottom code and will do the same functionality:
               "\" successfully saved.<br />\n"; 
               else 
               echo "There was an error writing \"" . 
               htmlentities($SaveFileName) . 
               "\".<br />\n";*/ 

               $fp = fopen($SaveFileName,"wb"); 
               if ($fp === FALSE) { 
               echo "There was an error creating \"" . 
               htmlentities($SaveFileName) . "\".<br />\n"; 
               } 
               else { 
               /*if (fwrite($fp, $SaveString)>0) 
               echo "Successfully wrote to file \"" . 
               htmlentities($SaveFileName) . "\".<br />\n";                THIS CODE HAS BEEN MODIFIED WITH "FLOCK() STATEMENT" CODE AS BELOW, AND ITS GONNA DO THE SAME FUNCTIONALITY:
               else 
               echo "There was an error writing to fi le \"" . htmlentities($SaveFileName) . "\".<br />\n"; 
               fclose($fp); 
               }*/

               $fp = fopen($SaveFileName,"wb"); 
               if ($fp === FALSE) { 
               echo "There was an error creating \"" . 
               htmlentities($SaveFileName) . "\".<br/>\n"; 
               } 
               else { 
               if (flock($fp, LOCK_EX)){ 
               if (fwrite($fp, $SaveString)>0) 
               echo "Successfully wrote to file \"" . 
               htmlentities( $SaveFileName) . "\".<br />\n"; 
               else 
               echo "There was an error writing to file \"" . 
               htmlentities( $SaveFileName) . "\".<br />\n"; 
               flock($fp, LOCK_UN); 
               } 
               else { 
               echo "There was an " . "error locking fi le \"" . 
               htmlentities( $SaveFileName) . " for writing\"." . "<br />\n"; 
               } 
               fclose($fp); 
               } 
               } 
               }
               } 
          ?>

          <h1 id="header">Visitor Comments</h1><hr />
          <form class="my-form" action="VisitorComments.php" method="POST"> 
          Your Name: <input type="text" name="name" /><br /> 
          Your Email: <input type="text" name="email" /><br /> 
          <textarea name="comment" rows="6" cols="100">
          </textarea><br /> 
          <input class="button" type="submit" name="save" value="Submit Your Comment" /><br /> 
          </form>
     </div>
</body>
</html>