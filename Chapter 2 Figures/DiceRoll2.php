<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Dice Roll</title>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
</head>
<body>
<?php
$FaceNamesSingular = array("one", "two", "three", "four", "five", "six");
$FaceNamesPlural = array("ones", "twos", "threes", "fours", "fives", "sixes");

function CheckForDoubles($Die1, $Die2) {
     global $FaceNamesSingular;
     global $FaceNamesPlural;
     $ReturnValue = false;

     if ($Die1 == $Die2) {// Doubles
          echo "The roll was double ", $FaceNamesPlural[$Die1-1], ".<br />";
          $ReturnValue = true;
     }
     else { // Not Doubles
          echo "The roll was a ", $FaceNamesSingular[$Die1-1],
               " and a ", $FaceNamesSingular[$Die2-1], ".<br />";
          $ReturnValue = false;
     }

     return $ReturnValue;
}

function DisplayScoreText($Score, $Doubles) {
     if ($Doubles) {
          if ($Score == 2)
               echo "You rolled snake eyes!<br />";
          if ($Score == 12)
               echo "You rolled boxcars!<br />";
     }
     else {
          if ($Score == 3)
               echo "You rolled a loose deuce!<br />";
          if ($Score == 5)
               echo "You rolled a fever five!<br />";
          if ($Score == 7)
               echo "You rolled a natural!<br />";
          if ($Score == 9)
               echo "You rolled a nina!<br />";
          if ($Score == 11)
               echo "You rolled a yo!<br />";
     }
}

$Dice = array();
$Dice[0] = rand(1,6);
$Dice[1] = rand(1,6);
$Score = $Dice[0] + $Dice[1];
echo "<p>";
echo "The total score for the roll was $Score.<br />";
$Doubles = CheckForDoubles($Dice[0],$Dice[1]);
DisplayScoreText($Score, $Doubles);
echo "</p>";
?>
</body>
</html>

