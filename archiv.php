<?php
  session_start();
  require_once('funkce.php');
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

      <div class="hlavicka">
    <div style="text-align: left;padding-top: 0%; padding-left: 1%">
        <a href="http://90.181.15.248"><img src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%">
        <img src="grafika/loga/logo.png" alt="" width="4%" height="4%"></a>
      </div>
      <div>
                    <table class="styled-table">
                        <thead>
                        <th>Číslo</th>
                        <th>Název</th>
                        <th>Datum vydání</th>
                        <th>Zobrazit</th>
                        </thead>
                        
                        <?php
                          echo vypis_vydanych_cisel();
                        ?>

                    </table>
                </div>

</body>
</html>