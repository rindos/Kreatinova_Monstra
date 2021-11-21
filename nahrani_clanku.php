<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();  
  }
?>

<!DOCTYPE html>
<html>
<head lang="cs">
    <meta charset="UTF-8">
    <title>Kreatinek</title>
    <link rel="shortcut icon" href="profil.png" type="image/png">
    <link rel="stylesheet" href="style.css">
</head>

<body>

      <div style="text-align: center;padding-top: 2%">
        <img src="grafika/loga/logo.png" alt="Phuuuu" width="10%" height="10%" style="padding-left: 6%"><br>
        <img src="grafika/formulare/nahraniclanku.png" alt="Phuuuu" width="40%" height="40%" style="padding-left: 6%">
        <div class="tlacitko">
          <a href="odeslanicko"><div id="img_odeslat" class="img_tlacitka"></div></a>
        </div>
      </div>
      
      <div class="kontak">
                
      </div>

    <form action = "pdf_upload.php" method = "POST" enctype="multipart/form-data"/>
        <input type = "file" name = "fileupload"/></br>  
        <input type = "submit" name = "t_upload" value = "upload"/></br> </br>
    </form>
</body>
</html>