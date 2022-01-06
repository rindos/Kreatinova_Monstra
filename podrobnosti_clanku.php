<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();
  }
  $id_clanku=$_POST['id_clanku'];
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
                        <th>PODROBNOSTI ČLÁNKU</th>
                        <th></th>
                        </thead>         
                       
      <tr>
        <td>Název článku</td>
        <td><?php echo get_item_clanek($id_clanku,'nazev');?></td>
      </tr>   
      <tr>
        <td>Určené pro číslo:</td>
        <td><?php  echo get_item_cislo(get_item_clanek($id_clanku,'cislo_casopisu'),'nazev');?></td>
      </tr>  
      <tr>
        <td>Text článku:</td>
        <?php echo"<td><a  href='clanky/".get_item_clanek($id_clanku,'soubor')."' target='_blank'>Zobrazit článek</a></td>"; ?>
      </tr>
      <tr>
        <td>Autor:</td>
        <td><?php echo get_item(get_item_clanek($id_clanku,'email_autor'),'jmeno')." ".get_item(get_item_clanek($id_clanku,'email_autor'),'prijmeni');?></td>
      </tr>
      <tr>
        <td>Email autora:</td>
        <td><?php echo get_item_clanek($id_clanku,'email_autor');?></td>
      </tr> 
      <tr>
        <td>1. Recenzent:</td>
        <td><?php echo get_item_clanek($id_clanku,'email_recenzent1');?></td>
      </tr> 
      <tr>
        <td>1. Recenze vyhotovena:</td>
        <td><?php if (get_item_clanek($id_clanku,'recenze1_provedeno')=="1") echo "Ano"; else echo "Ne";?></td>
      </tr>
      <tr>
        <td>2. Recenzent:</td>
        <td><?php echo get_item_clanek($id_clanku,'email_recenzent2');?></td>
      </tr> 
      <tr>
        <td>2. Recenze vyhotovena:</td>
        <td><?php if (get_item_clanek($id_clanku,'recenze2_provedeno')=="1") echo "Ano"; else echo "Ne";?></td>
      </tr> 
      <tr>
        <td>Stav:</td>
        <td><?php echo get_item_clanek($id_clanku,'stav');?></td>
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