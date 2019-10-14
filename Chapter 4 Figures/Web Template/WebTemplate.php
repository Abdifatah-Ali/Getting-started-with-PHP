<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Web Template</title>
</head>
<body>
     <?php include ("inc_header.html"); ?> 
     <div style = "width:20%; text-align:center; float:left">
     <?php include ("inc_buttonnav.html"); ?> 
     </div> 
     <!-- Start of Dynamic Content section --> 
     <?php 
           if (isset($_GET['content'])) { 
               switch ($_GET['content']) { 
                        case 'About Me': 
                                 include('inc_about.html'); 
                                 break; 
                         case 'Contact Me': 
                                  include('inc_contact.html'); 
                                 break; 
                         case 'Home': // A value of 'Home' means to 
                                                // display the default page 
                         default: 
                                   include('inc_home.html'); 
                                  break; 
              } 
        } 
         else // No button has been selected 
                  include('inc_home.html');
     ?> 
     <!-- End of Dynamic Content section --> 
     <?php include ("inc_footer.php"); ?>
</body>
</html>