<?php
  session_start();
  require_once('funkce.php');
  if (!isset($_SESSION['email'])) {
    neprihlasen();
  }
  $id_clanku=$_POST['id_clanku'];
  if (isset($_POST['t_odeslat_recenzi'])) {
    vytvoreni_recenze($_POST['id_clanku'],$_POST['email_recenzenta'],$_POST['aktualnost'],$_POST['originalita'],$_POST['odborna_uroven'],$_POST['js_uroven'],$_POST['text_recenze']);
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
<!--
  		<img id="1silak" src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%"><br>
  		<img id="2silak" src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%"><br>
  		<img id="3silak" src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%"><br>
		<img id="4silak" src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%"><br>
  		<img id="5silak" src="grafika/loga/kreatinek.png" alt="" width="10%" height="10%"> -->
      
      
      
        

<form action = "tvorba_recenze.php" method = "POST" enctype="multipart/form-data"/>
    <input type="hidden" value="<?php echo $_SESSION['email'];  ?>" name="email_recenzenta">
    <input type="hidden" value="<?php echo $id_clanku; ?>" name="id_clanku">
              <div class="zobrazit_clanek">
    <?php
        echo "<a href='clanky/".get_item_clanek($id_clanku,'soubor')." ' target='_blank'>Zobrazit článek</a>";
      ?>
    </div>
    <div class="tvorba_recenze_kontos">           
          <img src="grafika/formulare/tvorba_recenze.png" alt="Phuuuu" width="950px" height="750px">
          <div class="tvorba_recenze_nazev_clanku"><?php echo get_item_clanek($id_clanku,'nazev'); ?></div>
          <div class="tvorba_recenze_jmeno_autora"><?php echo vypis_celejmeno(get_item_clanek($id_clanku,'email_autor')); ?></div> 
          <div class="tvorba_recenze_nazev_cisla"><?php echo nazev_cisla_casopisu(get_item_clanek($id_clanku,'cislo_casopisu')); ?></div> 
          <div class="tvorba_recenze_akt_zaj_pri"><span id="vypis_aktualnost"></span></div>
          <div class="tvorba_recenze_originalita"><span id="vypis_originalita"></span></div>
          <div class="tvorba_recenze_odborna_uroven"><span id="vypis_odborna_uroven"></span></div>
          <div class="tvorba_recenze_jazykova"><span id="vypis_js_uroven"></span></div>
          <div class="tvorba_recenze_celkem"><span id="magor"></span></div>
          <div class="tvorba_recenze_akt_zaj_pri_slajdr"><input type="range" id="aktualnost" name="aktualnost" min="1" max="5" value="3" class="input_tvorba_recenze"></div>
          <div class="tvorba_recenze_originalita_slajdr"><input type="range" id="originalita"  name="originalita"  min="1" max="5" value="3" class="input_tvorba_recenze"></div>
          <div class="tvorba_recenze_odborna_uroven_slajdr"><input type="range" id="odborna_uroven" name="odborna_uroven" min="1" max="5" class="input_tvorba_recenze"></div>
          <div class="tvorba_recenze_jazykova_slajdr"><input type="range" id="js_uroven" name="js_uroven" min="1" max="5" placeholder="Heslo"class="input_tvorba_recenze"></div>
          <div class="textak_tvorba_recenze"><textarea rows="4" cols="50" name="text_recenze" style="width: 500px;height: 110px; outline: none; border: none; "></textarea></div>

    </div>

      <div class="tlacitko">
        <button type="submit" id="img_odeslat" name="t_odeslat_recenzi" class="img_tlacitka btn_odeslat_form"></button>               
      </div>
    </div>
  </form>

</div>
</div>
 <div class="footer">
  <button onclick="history.back()" id="img_zpet" class="img_tlacitka_zpet btn_odeslat_form"></button>
</div>

<body>
   
</body>
</html>

<script>
var output_celkem=document.getElementById("magor");
const sum = 12;
output_celkem.innerHTML=sum;


var slider_aktualnost = document.getElementById("aktualnost");
var output_aktualnost = document.getElementById("vypis_aktualnost");
output_aktualnost.innerHTML = slider_aktualnost.value;
slider_aktualnost.oninput = function() {
  output_aktualnost.innerHTML = this.value;
  const sum = parseInt(slider_aktualnost.value) + parseInt(slider_originalita.value) + parseInt(slider_odborna_uroven.value) + parseInt(slider_js_uroven.value);
  output_celkem.innerHTML=sum;	
    zobrazObrazek(sum);
}

var slider_originalita = document.getElementById("originalita");
var output_originalita = document.getElementById("vypis_originalita");
output_originalita.innerHTML = slider_originalita.value;
slider_originalita.oninput = function() {
  output_originalita.innerHTML = this.value;
  const sum = parseInt(slider_aktualnost.value) + parseInt(slider_originalita.value) + parseInt(slider_odborna_uroven.value) + parseInt(slider_js_uroven.value);
  output_celkem.innerHTML=sum;	
    zobrazObrazek(sum);
}

var slider_odborna_uroven = document.getElementById("odborna_uroven");
var output_odborna_uroven = document.getElementById("vypis_odborna_uroven");
output_odborna_uroven.innerHTML = slider_odborna_uroven.value;
slider_odborna_uroven.oninput = function() {
  output_odborna_uroven.innerHTML = this.value;
  const sum = parseInt(slider_aktualnost.value) + parseInt(slider_originalita.value) + parseInt(slider_odborna_uroven.value) + parseInt(slider_js_uroven.value);
  output_celkem.innerHTML=sum;	
    zobrazObrazek(sum);
}

var slider_js_uroven = document.getElementById("js_uroven");
var output_js_uroven = document.getElementById("vypis_js_uroven");
output_js_uroven.innerHTML = slider_js_uroven.value;
slider_js_uroven.oninput = function() {
  output_js_uroven.innerHTML = this.value;
  const sum = parseInt(slider_aktualnost.value) + parseInt(slider_originalita.value) + parseInt(slider_odborna_uroven.value) + parseInt(slider_js_uroven.value);
  output_celkem.innerHTML=sum;	
  zobrazObrazek(sum);
}

function schovObrazky() {
    var img = document.getElementById("1silak");
    img.style.visibility = 'hidden';
    var img = document.getElementById("2silak");
    img.style.visibility = 'hidden';
    var img = document.getElementById("3silak");
    img.style.visibility = 'hidden';
    var img = document.getElementById("4silak");
    img.style.visibility = 'hidden';
    var img = document.getElementById("5silak");
    img.style.visibility = 'hidden';
}

function ukazObrazek(obrazek) {
    var img = document.getElementById(obrazek);
    img.style.visibility = 'visible';
}

function zobrazObrazek(sum){
	schovObrazky();
	if (sum<8) {
		ukazObrazek("1silak");
	}
	else if(sum>=8&&sum<12){
		ukazObrazek("2silak");
	}
	else if(sum>=12&&sum<16){
		ukazObrazek("3silak");
	}
	else if(sum>=16&&sum<20){
		ukazObrazek("4silak");
	}
	else{
		ukazObrazek("5silak");
	}
}
</script>