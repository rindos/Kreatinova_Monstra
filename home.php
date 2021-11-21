<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();  
  }
  else $email= $_SESSION['email'];
?>
<html>
  <head>
  	<title>Profil</title>
    <link rel="shortcut icon" href="wet-mouse-152-193425.png" type="image/png">
    <link rel="stylesheet" href="stylex.css">
  </head>
  <body>
  	<header>
        <div class="container_header">
          <div id="branding">
            <h1><span class="nazev_header">Kreatinek</span> back end only</h1>
          </div>
          <nav>
            <ul>
              <li><a href="index.php">Kategorie</a></li>
              <?php
                if (isset($_SESSION['email'])) {
                echo '<li class="stranka_aktualni"><a href="home.php">Profil</a></li>';
                echo '<li><a href="moje_inzeraty.php">Můj klub</a></li>';
                echo '<li><a href="odhlaseni.php">Odhlásit</a></li>';                
                }
                else{
                  echo '<li><a href="login.php">Přihlášení</a></li>';
                }
              ?>
            </ul>
          </nav>
        </div>
    </header>
    <div class="odsazeni_doprava05">
  	    <h1><?php echo get_item($email,'jmeno')." ".get_item($email,'prijmeni') ; ?></h1>
        <div>
          <img class="obrazek_nahledovy" src="avatar/<?php echo get_item($email,'avatar'); ?>" alt="" /> 
        </div>
        <h3>
          Email uživatele: <?php echo get_item($email,'email');?><br>
          Role uživatele: <?php echo get_item($email,'role');?><br>
        </h3>
        <a href="nahrani_logo.php"><button class="tlacitko tlacitko_animace">Změna avataru</button></a><br>
        <a href="vybaveni.php"><button class="tlacitko tlacitko_animace">Vybavení</button></a><br> 
        <a href="komunita.php"><button class="tlacitko tlacitko_animace">Komunita</button></a><br> 
        <a href="odhlaseni.php"><button class="tlacitko tlacitko_animace">Odhlásit</button></a>
    </div>
  </body>
<footer>
    &copy Tomáš Mastný 2020
</footer>
</html>