<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Formatted Text</title>

<style type="text/css">
     .style1 {color: #228B22;}
     #header {
          font-family: verdana;
          color: #00275c;
          text-transform: uppercase;
     }
</style>
</head>
<body>
     <div class="style1">
          <h1 id="header">Formatted Text</h1><hr />
          <?php 
               $DisplayValue=9.876;
               echo "<pre>\n";
               echo "Unformatted text line 1. ";
               echo "Unformatted text line 2. ";
               echo "$DisplayValue = $DisplayValue";
               echo "</pre>\n";
               echo "<pre>\n";
               echo "Formatted text line 1. \r\n";
               echo "\tFormatted text line 2. \r\n";
               echo "\$DisplayValue = $DisplayValue";
               echo "</pre>\n";
          ?>
     </div>
</body>
</html>