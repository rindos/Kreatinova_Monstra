<?php
  session_start();
  require_once('funkce.php');
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
<div style="font-family: 'psychofont';text-align: center;position: relative; top: 1%">
        <p style="text-align: center;">!Tento web není oficiální web časopisu Logos Polytechnikos!</p>
      </div>
      <div style="text-align: center;padding-top: 2%">
      <img src="grafika/loga/logo.png" alt="Phuuuu" width="40%" height="40%" style="padding-left: 9%; padding-bottom: 2%">
      </div>
      <?php
        if (!isset($_SESSION['email'])) {
          vypis_tlacitka_neprihlasen();
        }
        else {
          vypis_tlacitka_prihlasen();
        }
      ?>
      
</body>
</html>