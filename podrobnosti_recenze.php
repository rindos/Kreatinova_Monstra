<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();
  }
  $id_recenze=$_POST['id'];
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
                        <th>RECENZE ČLÁNKU</th>
                        <th></th>
                        </thead>         
                       
      <tr>
        <td>Název článku</td>
        <td><?php echo get_item_clanek(get_item_recenze($id_recenze,"id_clanku"),"nazev"); //Název článku?></td>
      </tr>
      <tr>
        <td>Podrobnosti článku</td>
        <td><?php echo'<form action = "podrobnosti_clanku.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.get_item_clanek(get_item_recenze($id_recenze,'id_clanku'),'id').'" name="id_clanku"> <button type="submit" id="img_podrobnosti_clanku" class="img_tlacitka btn_odeslat_form"></button></form>';?></td>
      </tr>  
      <tr>
        <td>Datum recenze</td>
        <td><?php  echo get_item_recenze($id_recenze,"datum_recenze");?></td>
      </tr>  
      <tr>
        <td>Aktuálnost,zajímavost,přínosnost</td>
        <td><?php  echo get_item_recenze($id_recenze,"aktualnost_zajimavost_prinosnost");?></td>
      </tr>
      <tr>
        <td>Originalita</td>
        <td><?php  echo get_item_recenze($id_recenze,"originalita");?></td>
      </tr> 
      <tr>
        <td>Odborná úroveň</td>
        <td><?php echo get_item_recenze($id_recenze,"odborna_uroven");?></td>
      </tr> 
      <tr>
        <td>Jazyková a stylistická úroveň</td>
        <td><?php  echo get_item_recenze($id_recenze,"jazykova_a_stylisticka_uroven");?></td>
      </tr>
      <tr>
        <td>Text k recenzi</td>
        <td><p style="white-space: pre-line"><?php  echo get_item_recenze($id_recenze,"text_recenze");?></p></td>
      </tr>    

      </table>
  </div>
</div>
 <div class="footer">
  <button onclick="history.back()" id="img_zpet" class="img_tlacitka_zpet btn_odeslat_form"></button>
</div>
<body>
   
</body>
</html>