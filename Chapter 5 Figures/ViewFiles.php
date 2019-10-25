<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>View Files</title>

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
          <h1 id="header">View Files</h1><hr />
     </div>
     <?php 
     //This cod creates a web page that displays the contents of the "files" subdirectory:

          /*$Dir = "files"; 
          $DirOpen = opendir($Dir); 
          while ($CurFile = readdir($DirOpen)) { 
               if ((strcmp($CurFile, '.') != 0) && 
                    (strcmp($CurFile, '..') != 0)) 
               echo "<a href=\"files/" . $CurFile . "\">" . 
                    $CurFile . "</a><br />\n"; 
          } 
          closedir($DirOpen);*/

     //Modifying the previous script so it uses the scandir() function:

          /*$Dir = "files"; 
          $DirEntries = scandir($Dir); 
          foreach ($DirEntries as $Entry) { 
               if ((strcmp($Entry, '.') != 0) && 
                    (strcmp($Entry, '..') != 0)) 
                echo "<a href=\"files/" . $Entry . "\">" . 
                    $Entry . 
                    "</a><br />\n"; 
          }*/

          //Creating more detailed directory listing:

          $Dir = "files"; 
          $DirEntries = scandir($Dir); 
          echo "<table border='1' width='100%' >\n"; 
          echo "<tr><th colspan='4'>Directory listing for 
          <strong>" . htmlentities($Dir) . "</strong></th> 
          </tr>\n"; 
          echo "<tr>"; 
          echo "<th><strong><em>Name</em></strong></th>"; 
          echo "<th><strong><em>Owner ID</em></strong></th>"; 
          echo "<th><strong><em>Permissions</em></strong> 
          </th>"; 
          echo "<th><strong><em>Size</em></strong></th>"; 
          echo "</tr>\n"; 
          foreach ($DirEntries as $Entry) { 
               if ((strcmp($Entry, '.') != 0) && 
                         (strcmp($Entry, '..') != 0)) { 
                    $FullEntryName=$Dir . "/" . $Entry; 
                    echo "<tr><td>"; 
                    if (is_file($FullEntryName)) 
                         /*echo "<a href=\"$FullEntryName\">" .     THIS LINE OF CODE WILL BE REPLACED WITH THE BOTTOM CODE:
                              htmlentities($Entry). "</a>";*/
                          echo "<a href=\"FileDownloader.php?filename=$Entry\">" . htmlentities($Entry). "</a>\n";    
                    else 
                         echo htmlentities($Entry); 
                    echo "</td><td align='center'>" . 
                         fileowner($FullEntryName); 
                    if (is_file($FullEntryName)) { 
                    $perms = fileperms($FullEntryName);
                    $perms = decoct($perms % 01000); 
                    echo "</td><td align='center'> 
                         0$perms"; 
                    echo "</td><td align='right'>" . 
                         number_format(filesize($FullEntryName), 0) . 
                         " bytes"; 
                    } 
                    else 
                         echo "</td><td colspan='2' 
                              align='center'>&lt;DIR&gt;"; 
                    echo "</td></tr>\n"; 
               } 
          } 
          echo "</table>\n";

     ?>
</body>
</html>