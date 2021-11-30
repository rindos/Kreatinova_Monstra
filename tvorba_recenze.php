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
    <div style="text-align: left;padding-top: 0%; padding-left: 1%">
        <a href="index.php" style="text-decoration: none"><img src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%">
        <img src="grafika/loga/logo.png" alt="" width="4%" height="4%"></a>
      </div>
  </div>
  <div class="telo">
      Název článku: <?php echo get_item_clanek($id_clanku,'nazev'); ?><br>
      Název čísla: <?php echo nazev_cisla_casopisu(get_item_clanek($id_clanku,'cislo_casopisu')); ?><br>
      <?php
        echo "<a  href='clanky/".get_item_clanek($id_clanku,'soubor')."' target='_blank'>Zobrazit článek</a>";
      ?>

<form action = "registrace.php" method = "POST" enctype="multipart/form-data"/>
    <input type="hidden" value="<?php echo $_SESSION['email'];  ?>" name="email">
    <div class="nahrani_clanku_kontos">    
          <img src="grafika/formulare/registrace.png" alt="Phuuuu" width="750px" height="550px">
          <div class="registrace_jmeno">aktuálnost, zajímavost a přínosnost: <input type="text" name="jmeno" placeholder="Jméno" class="input_registrace"></div>
          <div class="registrace_prijmeni"> originalita: <input type="text" name="prijmeni" placeholder="Příjmení"class="input_registrace"></div>
          <div class="registrace_email">odborná úroveň: <input type="email" name="email" placeholder="E-mail"class="input_registrace"></div>
          <div class="registrace_heslo">jazyková a stylistická úroveň: <input type="password" name="heslo" placeholder="Heslo"class="input_registrace"></div>
          <div class="registrace_hesloznovu">Text recenze: <input type="password" name="heslo2" placeholder="Heslo znovu"class="input_registrace"></div>
    </div>
    <div class="kontak_registrace">
      <div class="tlacitko">
        <button type="submit" id="img_odeslat" name="t_registrovat" class="img_tlacitka btn_odeslat_form"></button>               
      </div>
    </div>
  </form>

  <div class="paticka">
    <p>Kreatinek hoho<br>
        <a href="mailto:kreatinek@gmail.com">kreatinek@gmail.com</a></p>
        <p style="text-align: center;">!Tento web není oficiální web časopisu Logos Polytechnikos!</p>
  </div>
</div>

<body>
   
</body>
</html>