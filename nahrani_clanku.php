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
  <div class="obsah">
<div class="hlavicka">
    <div style="text-align: left;padding-top: 0%; padding-left: 1%;position: absolute;">
        <a href="index.php" style="text-decoration: none"><img src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%">
        <img src="grafika/loga/logo.png" alt="" width="4%" height="4%"></a>
      </div>
        <p style="text-align: center;font-size: 20px;font-family: 'psychofont';">!Tento web není oficiální web časopisu Logos Polytechnikos!</p>   
  </div>
  <form action = "pdf_upload.php" method = "POST" enctype="multipart/form-data"/>
    <input type="hidden" value="<?php echo $_SESSION['email'];  ?>" name="email">
    <div class="nahrani_clanku_kontos">    
          <img src="grafika/formulare/nahraniclanku.png" alt="Phuuuu" width="750px" height="550px">
          <div class="nahrani_clanku_nazev"><input type="Název" name="nazev" placeholder="Zde napište název souboru"></div>
          <div class="vyber_cisla"><select name="id_cisla" id="cars">
            <?php vypis_cisel_nevydanych(); ?>
              
            </select></div>
          <div class="vybrat_soubor_nazev"><input type = "file" name = "fileupload"/></div>
        </div>
          <div class="tlacitko">
            	<button type="submit" id="img_odeslat" class="img_tlacitka btn_odeslat_form"></button>
          </div>
      </div>

    </form>  
     <div class="footer">
  <button onclick="history.back()" id="img_zpet" class="img_tlacitka_zpet btn_odeslat_form"></button>
</div>
</body>
</html>