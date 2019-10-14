<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Scholarship Form</title>

<style type="text/css">
     .style1 {color: #228B22;}
     #header {
          font-family: verdana;
          color: #ec6810;
          text-transform: uppercase;
     }
</style>
</head>
<body>
     <div class="style1">
          <h1 id="header">Scholarship Form</h1><hr />
          <?php 
             /*if (isset($_POST['fName'], $_POST['lName'])){} This code is to solve "Undefined index"*/
             $firstName = $_POST['fName'];
             $lastName = $_POST['lName']; 
             echo "Thank you for filling out the scholarship form,
                  ".$firstName." ".$lastName . ".";      
          ?>
     </div>
</body>
</html>