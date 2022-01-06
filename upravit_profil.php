<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();  
  }
  $email=$_SESSION['email'];

  if (isset($_POST['t_upravit_profil'])) {
    upravit_profil($_POST['jmeno'],$_POST['prijmeni'],$_POST['email'],$_POST['heslo'],$_POST['heslo2']);
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
  <form action = "upravit_profil.php" method = "POST" enctype="multipart/form-data"/>
    <input type="hidden" value="<?php echo $_SESSION['email'];  ?>" name="email">
    <div class="upravit_profil_kontos">    
          <img src="grafika/formulare/uprava_profilu.png" alt="Phuuuu" width="750px" height="550px">
          <div class="upravit_profil_jmeno"><input type="text" name="jmeno" value="<?php echo get_item($email,"jmeno");?>" class="input_upravit_profil"></div>
          <div class="upravit_profil_prijmeni"><input type="text" name="prijmeni" value="<?php echo get_item($email,"prijmeni")?>"class="input_upravit_profil"></div>
          <div class="upravit_profil_email"><input disabled type="email" name="email" value="<?php echo get_item($email,"email")?>"class="input_upravit_profil"></div>
          <div class="upravit_profil_datum"><input disabled type="text" name="datum" value="<?php echo datum_format(get_item($email,"datum_registrace"))?>"class="input_upravit_profil"></div>
          <div class="upravit_profil_heslo"><input type="password" name="heslo" placeholder="Heslo"class="input_upravit_profil"></div>
          <div class="upravit_profil_heslo_znovu"><input type="password" name="heslo2" placeholder="Heslo znovu"class="input_upravit_profil"></div>
          <div class="upravit_profil_avatar"><a href="nahrani_avatar.php">
          <img src="avatar/<?php echo get_item($email,"avatar")?>" id="uprava_avatar" alt="Profilový obrázek"width="100px" height="100px">
          </div></a>
          
      </div>
      <div class="tlacitko">
            <button type="submit" id="img_odeslat" name="t_upravit_profil" class="img_tlacitka btn_odeslat_form"></button>               
          </div>
    </form>
          <div class="footer">
  <button onclick="history.back()" id="img_zpet" class="img_tlacitka_zpet btn_odeslat_form"></button>
</div>
          
</body>
</html>