<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();
  }
  $id_odvolani=$_POST['id'];
?>
<!DOCTYPE html>
<html>
<head lang="cs">
    <meta charset="UTF-8">
    
    <title>Kreatinek</title>
    <link rel="shortcut icon" href="grafika/loga/logo.png" type="image/png">
    <link rel="stylesheet" href="style.css">
</head>

<div class="obsah">
<div class="hlavicka">
    <div style="text-align: left;padding-top: 0%; padding-left: 1%;position: absolute;">
        <a href="index.php" style="text-decoration: none"><img src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%">
        <img src="grafika/loga/logo.png" alt="" width="4%" height="4%"></a>
      </div>
        <p style="text-align: center;font-size: 20px;font-family: 'psychofont';">!Tento web není oficiální web časopisu Logos Polytechnikos!</p>   
  </div>
    <table class="styled-table">
                        
               <thead>
                        <th>PODROBNOSTI ODVOLÁNÍ</th>
                        <th></th>
                        </thead>         
                       
        <tr>
        <td>Název článku</td>
        <td><?php echo get_item_clanek( get_item_recenze(get_item_odvolani($id_odvolani,'id_recenze'),'id_clanku'),'nazev');//Název článku xDDD?></td>
      </tr>   
      <tr>
        <td>Text k odvolání</td>
        <td><p style="white-space: pre-line"><?php  echo get_item_odvolani($id_odvolani,"text_odvolani");?></p></td>

      </tr>    
       
      
      </table>
      
      
  </div>
</div>
</div>
 <div class="footer">
  <button onclick="history.back()" id="img_zpet" class="img_tlacitka_zpet btn_odeslat_form"></button>
</div>

<body>
   
</body>
</html>