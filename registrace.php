<?php
  session_start();
  require_once('funkce.php');
  if (isset($_POST['t_registrovat'])) {
    registrace($_POST['jmeno'],$_POST['prijmeni'],$_POST['email'],$_POST['heslo'],$_POST['heslo2']);
}
if (isset($_POST['t_prihlasit'])) {
  header("location: prihlaseni.php");
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
  <form action = "registrace.php" method = "POST" enctype="multipart/form-data"/>
    <input type="hidden" value="<?php echo $_SESSION['email'];  ?>" name="email">
    <div class="nahrani_clanku_kontos">    
          <img src="grafika/formulare/registrace.png" alt="Phuuuu" width="750px" height="550px">
          <div class="registrace_jmeno"><input type="text" name="jmeno" placeholder="Jméno" class="input_registrace"></div>
          <div class="registrace_prijmeni"><input type="text" name="prijmeni" placeholder="Příjmení"class="input_registrace"></div>
          <div class="registrace_email"><input type="email" name="email" placeholder="E-mail"class="input_registrace"></div>
          <div class="registrace_heslo"><input type="password" name="heslo" placeholder="Heslo"class="input_registrace"></div>
          <div class="registrace_hesloznovu"><input type="password" name="heslo2" placeholder="Heslo znovu"class="input_registrace"></div>
    </div>
    <div class="kontak_registrace">
      <div class="tlacitko">
        <button type="submit" id="img_odeslat" name="t_registrovat" class="img_tlacitka btn_odeslat_form"></button>               
      </div>
  </form>  

    <div class="tlacitko">
      <button  id="img_prihlasit" name="t_prihlasit" class="img_tlacitka btn_odeslat_form"></button>
    </div>
    </div>
    </div>
  </div>
</body>
</html>