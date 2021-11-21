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
    <link rel="shortcut icon" href="grafika/loga/logo.png" type="image/png">
    <link rel="stylesheet" href="style.css">
</head>

<body>
      <div style="text-align: center;padding-top: 0%">
        <img src="grafika/loga/logo.png" alt="" width="5%" height="5%">
        <img src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%">
        <img src="grafika/loga/logo.png" alt="" width="5%" height="5%">
      </div>
      <div style="text-align: center;padding-top: 0%">
        <img src="grafika/karty/karta_autor.png" alt="" width="35%" height="35%" style="text-align:center">
      </div>

      <?php
        $role=get_item(($_SESSION['email']),'role');
        if ($role=='autor') {
          
          vypis_profil_autor();
        }
        else if ($role=='recenzent') {
          vypis_profil_recenzent();
        }
        else if ($role=='redaktor') {
          vypis_profil_redaktor();
        }
      ?>
      <footer>
        <p>Kreatinek hoho<br>
        <a href="mailto:kreatinek@gmail.com">kreatinek@gmail.com</a></p>
        <p style="text-align: center;">!Tento web není oficiální web časopisu Logos Polytechnikos!</p>
      </footer>
</body>
</html>