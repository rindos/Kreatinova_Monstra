<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();  
  }
  $email=$_SESSION['email'];
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
  <div class="obsah">
<div class="hlavicka">
    <div style="text-align: left;padding-top: 0%; padding-left: 1%;position: absolute;">
        <a href="index.php" style="text-decoration: none"><img src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%">
        <img src="grafika/loga/logo.png" alt="" width="4%" height="4%"></a>
      </div>
        <p style="text-align: center;font-size: 20px;font-family: 'psychofont';">!Tento web není oficiální web časopisu Logos Polytechnikos!</p>   
  </div>
  <form action="upload_avatar.php" method="post" enctype="multipart/form-data">
            <div class="obrazek_inzerat_nahledovy_box">
                              <img class="obrazek_nahledovy" src="avatar/<?php echo get_item($email, 'avatar'); ?>" alt="" /> 
                            </div>   
                            
            <div style="text-align: center;">
          Vyberte obrázek:   <input type="file" name="fileToUpload" id="fileToUpload"><br>
         <input class="tlacitko_login tlacitko_animace" style="width: 30%;" type="submit" value="Nahrát obrázek" name="submit">
    </div>
    </form>
</body>
</html>