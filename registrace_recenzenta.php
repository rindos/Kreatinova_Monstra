<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();  
  }

  if (isset($_POST['t_registrovat_recenzenta'])) {
    registrovat_redaktora($_POST['jmeno'],$_POST['prijmeni'],$_POST['email']);
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
  <form action = "registrace_recenzenta.php" method = "POST" enctype="multipart/form-data"/>
    <div class="class_registrace_recenzenta">    
          <img src="grafika/formulare/registrace_recenzenta.png" alt="Phuuuu" width="750px" height="550px">
          <div class="class_registrace_recenzenta_jmeno"><input type="text" name="jmeno" placeholder="např. Petr" style="width: 200px;" class="input_reg_rec"></div>
          <div class="class_registrace_recenzenta_prijmeni"><input type="text" name="prijmeni" placeholder="např. Smetánka"style="width: 200px" class="input_reg_rec"></div>
          <div class="class_registrace_recenzenta_email"><input type="email" name="email" placeholder="E-mail"style="width: 270px"class="input_reg_rec"></div>
        </div>
          <div class="tlacitko" style="padding-right: 3%">
            	<button type="submit" name='t_registrovat_recenzenta' id="img_potvrdit" class="img_tlacitka btn_odeslat_form"></button>
          </div>
      </div>
    </form>    
</body>
</html>