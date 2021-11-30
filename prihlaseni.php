<?php
  session_start();
  require_once('funkce.php');
  if (isset($_POST['t_prihlasit'])) {
    prihlaseni($_POST['email'],$_POST['heslo']);
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

  <div class="class_kontak_prihlaseni">
  <form action = "prihlaseni.php" method = "POST" enctype="multipart/form-data"/>
    <input type="hidden" value="<?php echo $_SESSION['email'];  ?>" name="email">    
          <img src="grafika/formulare/prihlaseni.png" alt="Phuuuu" width="950px" height="550px">
          <div class="prihlaseni_email"><input type="email" name="email" placeholder="E-mail" class="prihlaseni_input"></div>
          <div class="prihlaseni_heslo"><input type="password" name="heslo" placeholder="Heslo"class="prihlaseni_input"></div>
        </div>
        <div class="kontak_prihlaseni">
          <div class="tlacitko">
          <button type="submit" id="img_odeslat" name="t_prihlasit" class="img_tlacitka btn_odeslat_form"></button>    
          </div>     
      
    </form>  
    <div class="tlacitko">
    <a href="registrace.php"><button type="submit" id="img_registrovat" name="t_registrace" class="img_tlacitka btn_odeslat_form"></button></a>  
  </div>
</div>
  </div>
</div>
</body>
</html>