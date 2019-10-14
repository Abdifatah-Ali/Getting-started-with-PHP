<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Prime Number</title>

<style type="text/css">
     .style1 {
          color: #333;
          text-align: center;
         }
     .style2 {
          color: black;
          border: 1px solid #333;
          max-width: 300px;
          margin: 15px auto;
          padding: 60px 20px;
          background: #DCDCDC;
          border-radius: 8px;
          box-sizing: border-box;
     }
     #header {
          font-family: verdana;
          color: #6c13df;
          text-transform: uppercase;
          text-align: center;
     }

     .button {
          background-color: #333;
          color: #fff;
          padding: 10px 15px;
          border: none;
          margin: auto;
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
      p {
          color: #000;
          font-size: 1em;
		font-family: sans-serif;
		border-bottom: dotted 1px #333;
	   }        
</style>
</head>
<body>
<div class="style1">
     <h1 id="header">Prime Number</h1><hr />
     <div class="style2">
     <?php
          function prima($n){
               for($i=1;$i<=$n;$i++){  //numbers to be checked as prime
                    $counter = 0; 

               for($j=1;$j<=$i;$j++){ //all divisible factors
               if($i % $j==0){ 
                    $counter++;
                  }
               }

//prime requires 2 rules ( divisible by 1 and divisible by itself)
               if($counter==2){
                    print $i."<p>is Prime <br/></p>";
                  }
               }
          } 
     prima(999);  //find prime numbers from 1-999
     ?>
     </div>
     <a class="button" href="PrimeNumber.html">Try Again?</a>
</div>
</body>
</html>