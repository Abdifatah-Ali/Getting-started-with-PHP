<?php 
     $Dir = "files"; 
     if (isset($_GET['filename'])) { 
     $FileToGet = $Dir . "/" . stripslashes 
     ($_GET['filename']);
     if (is_readable($FileToGet)) { 
     }
     else { 
     $ErrorMsg = "Cannot read \"$FileToGet\""; 
     $ShowErrorPage = TRUE; 
     } 
     }
     else { 
     $ErrorMsg = "No filename specified"; 
     $ShowErrorPage = TRUE; 
     }
     // $ShowErrorPage = TRUE;
     // $ErrorMsg = '';
     if ($ShowErrorPage) {
          header("Content-Description: File Transfer"); 
          header("Content-Type: application/force-download"); header("Content-Disposition: attachment; 
          filename=\"" . $_GET['filename'] . "\""); 
          header("Content-Transfer-Encoding: base64"); 
          header("Content-Length: " . filesize($FileToGet)); 
          readfile($FileToGet); 
          $ShowErrorPage = FALSE;
      
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 
     Strict//EN" 
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
     <html xmlns="http://www.w3.org/1999/xhtml"> 
     <head> 
     <title>File Download Error</title> 
     <meta http-equiv="content-type" content="text/html; 
     charset=iso-8859-1" /> 
     </head> 
     <body> 
     <p>There was an error downloading "<?php echo htmlentities($_GET['filename']); ?>"</p> 
     <p><?php echo htmlentities($ErrorMsg); ?></p> 
     </body> 
</html> 
     <?php 
     } 
     ?>
