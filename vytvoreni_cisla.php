<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();  
  }
  if (isset($_POST['t_vytvorit_cislo'])) {
    vytvoreni_cisla($_POST['nazev'],$_POST['pocet_clanku'],$_POST['popis']);
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
  <div class="obsah">
<div class="hlavicka">
    <div style="text-align: left;padding-top: 0%; padding-left: 1%;position: absolute;">
        <a href="index.php" style="text-decoration: none"><img src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%">
        <img src="grafika/loga/logo.png" alt="" width="4%" height="4%"></a>
      </div>
        <p style="text-align: center;font-size: 20px;font-family: 'psychofont';">!Tento web není oficiální web časopisu Logos Polytechnikos!</p>   
  </div>
  <form action = "vytvoreni_cisla.php" method = "POST" enctype="multipart/form-data"/>
    <input type="hidden" value="<?php echo $_SESSION['email'];  ?>" name="email">
    <div class="vytvoreni_cisla_kontos">    
          <img src="grafika/formulare/vytvoreni_noveho_cisla.png" alt="Phuuuu" width="750px" height="550px">
          <div class="vytvoreni_cisla_nazev"><input type="Název" name="nazev" placeholder="Zde napište název čísla"class="input_vytvoreni_cisla"></div>
          <div class="vytvoreni_cisla_pocet_clanku"><input type="Název" name="pocet_clanku" placeholder="Počet článků" class="input_vytvoreni_cisla" style="width: 150px"></div>
          <div class="vytvoreni_cisla_popis_cisla"><textarea rows="4" cols="50" name="popis" style="width: 300px;height: 150px" ></textarea></div>
                         
      </div>
      <div class="tlacitko">
        <button type="submit" id="img_odeslat" name="t_vytvorit_cislo" class="img_tlacitka btn_odeslat_form" ></button>
      </div>
  </form>    
  </div>
 <div class="footer">
  <button onclick="history.back()" id="img_zpet" class="img_tlacitka_zpet btn_odeslat_form"></button>
</div>
</body>
</html>