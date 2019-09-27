<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Musical Scale</title>

<style type="text/css">
     .style1 {color: #000099;}
     #header {
          font-family: verdana;
          color: #228B22;
          text-transform: uppercase;
     }
</style>
</head>
<body>
     <div class="style1">
          <h1 id="header">Musical Scale</h1><hr />
          <?php 
            $MusicalScale = array("do", "re", "mi", "fa", "so", "la", "ti");
            $OutputString = "The notes of the musical scale are: ";
            foreach ($MusicalScale as  $CurrentNote)
                    $OutputString .= " " . $CurrentNote;
            echo "<p>$OutputString</p>";                    
          ?>
     </div>
</body>
</html>