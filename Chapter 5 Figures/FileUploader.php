<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>File Uploader</title>

<style type="text/css">
     .style1 {
          color: #333;
          /* text-align: center; */
        }
     #header {
          font-family: verdana;
          color: lightblue;
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
          <h1 id="header">File Uploader</h1><hr />
     </div>
     <?php 
        $Dir = "files"; 
        if (isset($_POST['upload'])) { 
        if (isset($_FILES['new_file'])) {
        if (move_uploaded_file( 
        $_FILES['new_file']['tmp_name'], 
        $Dir . "/" . $_FILES['new_file'] 
        ['name']) == TRUE) { 
        chmod($Dir . "/" . $_FILES['new_file'] 
        ['name'], 0644); 
        echo "File \"" . 
        htmlentities($_FILES['new_file'] 
        ['name']) . 
        "\"successfully uploaded. 
        <br />\n"; 
        } 
        else 
        echo "There was an error 
        uploading \"" . 
        htmlentities($_FILES['new_file'] 
        ['name']) . 
        "\".<br />\n"; 
        } 
        }
     ?>
     <div class="style1">
     <form class="my-form" action="FileUploader.php" method="POST" enctype="multipart/form-data"> 
          <input type="hidden" name="MAX_FILE_SIZE" 
          value="25000" /><br /> 
          File to upload:<br /> 
          <input type="file" name="new_file" /><br />
          (25,000 byte limit) <br /> 
          <input class="button" type="submit" name="upload" value="Upload the File" /> <br /> 
     </form>
     </div>
</body>
</html>
