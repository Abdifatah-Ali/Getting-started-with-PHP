<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Number Form</title>

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
     <?php
          $DisplayForm = TRUE;
          $Number ="";

          if(isset($_POST['Submit'])){
          $Number = $_POST['Number'];
          if (is_numeric($Number))
          $DisplayForm = FALSE;
          else
          {
          echo "<p>You need to enter a numeric value.</p>\n";
               $DisplayForm = TRUE;
          }
          }

          if ($DisplayForm) {
     ?>     
     <div class="style1">
          <h1 id="header">Number Form</h1><hr />
          <form class="my-form" name="NumberForm" action="NumberForm.php" 
               method="post">
               <p>Enter a number: <input type="text" name="Number" 
               value="" /></p>
               <p><input class="button" type="reset" value="Clear Form" />&nbsp; 
               &nbsp;<input class="button" type="submit" name="Submit" value="Send Form" /></p>
          </form>
     </div>
     <?php }
          else {
               echo "<p>Thank you for entering a number</p>";
               echo "<p>Your number, $Number, squared is ". ($Number*$Number).".</p>\n ";
               echo "<p><a href=\"Numberform.php\">Try again?</a></p>\n";
          }
      ?>
</body>
</html>