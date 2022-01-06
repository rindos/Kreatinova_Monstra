<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();
  }


  $id_recenze=$_POST['id'];
  if (isset($_POST['t_odeslat_odvolani'])) {
    odeslani_odvolani($_POST['id_recenze'],$_POST['id_clanku'],$_POST['text_odvolani']);
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

<div class="obsah">
<div class="hlavicka">
    <div style="text-align: left;padding-top: 0%; padding-left: 1%;position: absolute;">
        <a href="index.php" style="text-decoration: none"><img src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%">
        <img src="grafika/loga/logo.png" alt="" width="4%" height="4%"></a>
      </div>
        <p style="text-align: center;font-size: 20px;font-family: 'psychofont';">!Tento web není oficiální web časopisu Logos Polytechnikos!</p>   
  </div>
  <div class="telo">


     
      
  </div>
  <form action = "nahlaseni_recenze.php" method = "POST" enctype="multipart/form-data"/>
  <input type="hidden" value="<?php echo $id_recenze; ?>" name="id_recenze">
  <input type="hidden" value="<?php echo get_item_recenze($id_recenze,"id_clanku"); ?>" name="id_clanku">
    <div class="nahlaseni_recenze_kontos">    
          <img src="grafika/formulare/zpetna_vazba.png" alt="Phuuuu" width="750px" height="550px">
           <h2 style="font-family: 'psychofont';" class="nahlaseni_recenze_nazev">Nahlášení recenze: <?php echo get_item_clanek(get_item_recenze($id_recenze,"id_clanku"),"nazev"); //Název článku?></h2>
          <div class="nahlaseni_recenze_text"><textarea rows="4" cols="50" name="text_odvolani" style="width: 550px;height: 250px"></textarea></div>
    </div>
      <div class="tlacitko">
        <button type="submit" id="img_odeslat" name="t_odeslat_odvolani" class="img_tlacitka btn_odeslat_form"></button>               
      </div>
    </div>
  </form>
</div>
<div class="footer">
  <button onclick="history.back()" id="img_zpet" class="img_tlacitka_zpet btn_odeslat_form"></button>
</div>

<body>
   
</body>
</html>