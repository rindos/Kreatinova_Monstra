<?php
     require_once('phpmailer/mailer.php');
    function get_db(){
        return mysqli_connect("localhost", "root", "","rsp");
    }
    function datum_format($datum){ 
        $datum_preformatovane = date("d.m.Y", strtotime($datum));  
        return $datum_preformatovane;
    }
 

    function get_item($email,$item){
        $db= get_db();
        $sql = "SELECT * FROM uzivatele WHERE email = '$email'";
        $result= mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result,true)) {
            return $row[$item]; 
        }
    }

    function get_item_clanek($id_clanku,$item){
        $db= get_db();
        $sql = "SELECT * FROM clanky WHERE id = '$id_clanku'";
        $result= mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result,true)) {
            return $row[$item]; 
        }
    } 
       
    function neprihlasen(){
        echo "<script>alert('Pro vstup na svůj profil musíš být přihlášen.\\nPokud ještě nemáš vytvořený účet, tak se zaregistruj')</script>";
        echo "<script>location.href='prihlaseni.php'</script>";
    }

    function vypis_tlacitka_neprihlasen(){
        echo '
            <div class="kontak">
                <div class="tlacitko">
                    <a href="archiv.php"><div id="img_archiv" class="img_tlacitka"></div></a>
                </div>
                <div class="tlacitko">
                    <a href="prihlaseni.php"><div id="img_prihlasit" class="img_tlacitka"></div></a>
                </div>
                <div class="tlacitko">
                    <a href="registrace.php"><div id="img_registrovat" class="img_tlacitka"></div></a>
                </div>
            </div>
            ';
    }
    function vypis_tlacitka_prihlasen(){
        echo '
            <div class="kontak">
                <div class="tlacitko">
                    <a href="archiv.php"><div id="img_archiv" class="img_tlacitka"></div></a>
                </div>
                <div class="tlacitko">
                    <a href="profil.php"><div id="img_profil" class="img_tlacitka"></div></a>
                </div>
                <div class="tlacitko">
                    <a href="odhlaseni.php"><div id="img_odhlasit" class="img_tlacitka"></div></a>
                </div>
            </div>
            ';
    }
    function vypis_profil_autor(){
        echo '
        <div class="kontak">
            <div class="tlacitko">
                <a href="nahrani_clanku.php"><div id="img_nahrat_clanek" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="stav_clanku.php"><div id="img_stav_clanku" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="profil.php"><div id="img_upravit_profil" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="odhlaseni.php"><div id="img_odhlasit" class="img_tlacitka"></div></a>
            </div>
        </div>
        ';
    }
    function vypis_profil_recenzent(){
        echo '
        <div class="kontak">
            <div class="tlacitko">
                <a href="prehled_recenze.php"><div id="img_vytvorit_recenzi" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="profil.php"><div id="img_upravit_profil" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="odhlaseni.php"><div id="img_odhlasit" class="img_tlacitka"></div></a>
            </div>
        </div>
        ';
    }
    function vypis_profil_redaktor(){
        echo '
        <div class="kontak">
            <div class="tlacitko">
                <a href="prirazeni_recenzentu.php"><div id="img_prirazeni_clanku_recenzentum" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="prehled_uzivatelu.php"><div id="img_prehled_uzivatelu" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href=".php"><div id="img_sprava_odvolani" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="prehled_clanku.php"><div id="img_prehled_clanku" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="registrace_recenzenta.php"><div id="img_zadost_o_recenzenta" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="profil.php"><div id="img_upravit_profil" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="odhlaseni.php"><div id="img_odhlasit" class="img_tlacitka"></div></a>
            </div>
        </div>
        ';
    }

    function vypis_profil_sefredaktor(){
        echo '
        <div class="kontak">
            <div class="tlacitko">
                <a href="odhlaseni.php"><div id="img_odhlasit" class="img_tlacitka"></div></a>
            </div>
        </div>
        ';
    }

    function vypis_profil_admin(){
        echo '
        <div class="kontak">
            <div class="tlacitko">
                <a href="odhlaseni.php"><div id="img_odhlasit" class="img_tlacitka"></div></a>
            </div>
        </div>
        ';
    }

    function pridat_clanek($soubor,$nazev,$email_autor, $cislo_casopisu){
        $db= get_db(); 
        $sql= "INSERT INTO clanky(soubor, nazev, email_autor, stav, cislo_casopisu) VALUES ('$soubor', '$nazev', '$email_autor', 'Čeká na přiřazení recenzentů', '$cislo_casopisu')";
        mysqli_query($db,$sql);
    }

    function prirazeni_id_clanku(){
        $sql="SELECT * FROM clanky";
        $db= get_db();
        $id=0;
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result,true)) {
            $id = $row['id'];
        }
        return ++$id;
    }

    function zpracovaniKomentar(){
        if (isset($_POST['zapisKomentar'])&& $_POST['komentar']!=null) {
          zapisKomentar($_POST['email'],$_POST['datum'],$_POST['komentar']);
        }
    }

    function zapisKomentar($email,$datum,$komentar){
        $db= get_db();
        $sql_komentar = "INSERT INTO chat (uzivatel, datum, komentar) VALUES ('$email', '$datum', '$komentar')";
        $result_komentar= $db->query($sql_komentar);
    }

    function vypisKomentaru(){
        date_default_timezone_set("Europe/Berlin");
        $db= get_db();
        $sql_vem_komentar = "SELECT * FROM chat ORDER BY datum DESC";
        $result_vem_komentar= $db->query($sql_vem_komentar);
        while ($row_komentar=$result_vem_komentar->fetch_assoc()) {
          echo"<div class='komentare-box'>";
              echo "<b>".$row_komentar['uzivatel']."</b><br>";
              echo $row_komentar['komentar']."<br>";
              echo $row_komentar['datum'];
          echo "</div>";
        }
      }

      function vypis_clanku_autora($email){
        $db=get_db();
        $sql="SELECT * FROM clanky";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        $nasel=false;
        while($row = mysqli_fetch_array($result)) {
            if ($row['email_autor']==$email)
            {
                $nasel=true;
                echo"<tr>";
                echo"<td>".$row['id']."</td>";
                echo"<td>".$row['nazev']."</td>";
                echo"<td>".$row['stav']."</td>";
                echo"<td>".datum_format($row['datum_vytvoreni'])."</td>";
            }                            
        }
        if(!$nasel) echo "Nemáte ještě vytvořený žádný článek";
      }

    function vypis_clanku_vsech(){
        $db=get_db();
        $sql="SELECT * FROM clanky";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        $nasel=false;
        while($row = mysqli_fetch_array($result)) {
                $nasel=true;
                echo"<tr>";
                echo"<td>".$row['id']."</td>";
                echo"<td>".$row['nazev']."</td>";
                echo"<td>".vypis_celejmeno($row['email_autor'])."</td>";
                echo"<td>".$row['stav']."</td>";
                echo"<td>".datum_format($row['datum_vytvoreni'])."</td>";                          
        }
        if(!$nasel) echo "Nemáte ještě vytvořený žádný článek";
      }

      function vypis_celejmeno($email){
        $db=get_db();
        $sql="SELECT * FROM uzivatele";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result)) {
            if($row['email']==$email){
                $celejmeno=$row['jmeno']." ".$row['prijmeni'];
                return $celejmeno;
            }                
        }
      }

      function vypis_autoru_recenzentu(){
        $db=get_db();
        $sql="SELECT * FROM uzivatele";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result)) {
            if($row['role']=='autor'||$row['role']=='recenzent'){
                echo"<tr>";
                echo"<td>".ucfirst($row['role'])."</td>";
                echo"<td>".$row['jmeno']."</td>";
                echo"<td>".$row['prijmeni']."</td>";
                echo"<td>".datum_format($row['datum_registrace'])."</td>";
                echo'<td> <form action = "podrobnosti_uzivatele.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["email"].'" name="email"> <button type="submit" id="img_podrobnosti" class="img_tlacitka btn_odeslat_form"></button></form></td>';


            }                
        }
      }

      function vypis_clanku_pro_recenzi(){
        $db=get_db();
        $sql="SELECT * FROM clanky";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        $nasel=false;
        while($row = mysqli_fetch_array($result)) {
            if ($row['email_recenzent1']==''||$row['email_recenzent2']=='')
            {
                $nasel=true;
                echo"<tr>";
                echo"<td>".$row['id']."</td>";
                echo"<td>".$row['nazev']."</td>";
                echo"<td>".$row['email_autor']."</td>";
                echo"<td>".$row['stav']."</td>";
                echo"<td>".datum_format($row['datum_vytvoreni'])."</td>";
                echo'<td> <form action = "upload_pridani_recenzentu.php" method = "POST" enctype="multipart/form-data"/><select name="recenzent1">';
                vypis_vsech_recenzentu();
                echo"</select></td>";
                echo"<td> <select name='recenzent2'>";
                vypis_vsech_recenzentu();
                echo"</select></td>";
                echo'<td> <input type="hidden" value="'.$row["id"].'" name="id_clanku"> <button type="submit" id="img_odeslat" class="img_tlacitka btn_odeslat_form"></button></form></td>';
            }
        }
        if(!$nasel) echo "Chyba";
      }
      

      function pridani_recenzentu_k_clanku($recenzent1,$recenzent2,$id_clanku){
        $db=get_db();
        $sql= "UPDATE clanky SET email_recenzent1='$recenzent1', email_recenzent2='$recenzent2', stav='Předáno recenzentům' WHERE id='$id_clanku'";
        mysqli_query($db,$sql);
        echo "Recenzenti úspěšně přidání k recenzi";
      }

      function vypis_vsech_recenzentu(){
        $db=get_db();
        $sql="SELECT * FROM uzivatele";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result)) {
            if ($row['role']=="recenzent")
            {
                echo "<option value=".$row['email'].">".$row['jmeno']." ".$row['prijmeni']."</option>";
            }                          
        }
      }

    function vypis_cisel_nevydanych(){
        $db=get_db();
        $sql="SELECT * FROM cisla";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result)) {
            if ($row['stav']!="vydán")
            {
                echo "<option value=".$row['id'].">".$row['nazev']."</option>";
            }                          
        }
      }

      function pocet_vydanych_clanku_autora($email){
        $db=get_db();
        $sql="SELECT * FROM clanky";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        $pocet=0;
        while($row = mysqli_fetch_array($result)) {
            if ($row['email_autor']==$email&&$row['stav']=="Vydán")
            {
                ++$pocet;
            }                            
        }
        return $pocet;
      }
      function pocet_recenzi_recenzenta($email){
        $db=get_db();
        $sql="SELECT * FROM clanky";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        $pocet=0;
        while($row = mysqli_fetch_array($result)) {
            if ($row['email_autor']==$email&&$row['stav']=="Vydán")
            {
                ++$pocet;
            }                            
        }
        return $pocet;
      }

      
      function prihlaseni($email,$heslo){
		$heslo=md5($heslo);
        $db=get_db();
		$sql="SELECT * FROM uzivatele WHERE email='$email' AND heslo='$heslo'";
		$result =mysqli_query($db,$sql);
		if (mysqli_num_rows($result)==1) {			
			while($row = mysqli_fetch_array($result,true)) {
     			if ($email==$row['email']) {
     				$_SESSION['user_id'] = $id;
					 $_SESSION['email'] = $row['email'];
     			}
     		}
            header("location: profil.php");
		}
		else{
			echo "<script>alert('Špatné přihlašovací údaje')</script>";
		}
      }

      function registrace($jmeno,$prijmeni,$email,$heslo,$heslo2){
		if ($heslo==$heslo2)
		{
            $db= get_db();
			$check_duplicate_email= "SELECT email FROM uzivatele WHERE email= '$email' ";
			$result_email=mysqli_query($db,$check_duplicate_email);
			$count_email=mysqli_num_rows($result_email);
			$heslo=md5($heslo);
			if ($count_email>0) {
				echo "<script>alert('Tento email již využívná jiný uživatel, zvol si jiný')</script>";
			}
			else{
				$sql = "INSERT INTO uzivatele(jmeno, prijmeni, email, heslo, avatar, role) VALUES ('$jmeno','$prijmeni','$email','$heslo','default.png','autor')";
				mysqli_query($db,$sql);
                $_SESSION['email'] = $email;
                header("location: index.php");
			}
		}
		else
		{
			echo "<script>alert('Hesla se neshodují')</script>";
		}		
      }

      function vypis_karta_autor($email){
        echo'
        <div class="karta_autor_container">
        <img src="grafika/karty/karta_autor.png" alt="" width="550px" height="350px">
        <div class="karta_jmeno">'.get_item($email,"jmeno").'</div>
        <div class="karta_prijmeni">'. get_item($email,"prijmeni").'</div>
        <div class="karta_email">'.get_item($email,"email").'</div>
        <div class="karta_datum_reg">'.datum_format(get_item($email,"datum_registrace")).'</div>
        <div class="karta_vydanych_clanku">'.pocet_vydanych_clanku_autora($email).'</div>
        <div class="karta_avatar">
        <img src="avatar/'.get_item($email,"avatar").'" alt="Profilový obrázek"width="135px" height="135px">
        </div>
        </div>
        ';
      }

    function vypis_karta_recenzent($email){
        echo'
        <div class="karta_autor_container">
        <img src="grafika/karty/karta_recenzent.png" alt="" width="550px" height="350px">
        <div class="karta_jmeno">'.get_item($email,"jmeno").'</div>
        <div class="karta_prijmeni">'. get_item($email,"prijmeni").'</div>
        <div class="karta_email">'.get_item($email,"email").'</div>
        <div class="karta_datum_reg">'.datum_format(get_item($email,"datum_registrace")).'</div>
        <div class="karta_pocet_recenzi">'.pocet_recenzi_recenzenta($email).'</div>
        <div class="karta_avatar">
        <img src="avatar/'.get_item($email,"avatar").'" alt="Profilový obrázek"width="135px" height="135px">
        </div>
        </div>
        ';
      }
    
    function vypis_karta_redaktor($email){
        echo'
        <div class="karta_autor_container">
        <img src="grafika/karty/karta_redaktor.png" alt="" width="550px" height="350px">
        <div class="karta_jmeno">'.get_item($email,"jmeno").'</div>
        <div class="karta_prijmeni">'. get_item($email,"prijmeni").'</div>
        <div class="karta_email">'.get_item($email,"email").'</div>
        <div class="karta_datum_reg">'.datum_format(get_item($email,"datum_registrace")).'</div>
        <div class="karta_avatar_v2">
        <img src="avatar/'.get_item($email,"avatar").'" alt="Profilový obrázek"width="135px" height="135px">
        </div>
        </div>
        ';
    }

    function vypis_karta_sefredaktor($email){
        echo'
        <div class="karta_autor_container">
        <img src="grafika/karty/karta_sefredaktor.png" alt="" width="550px" height="350px">
        <div class="karta_jmeno">'.get_item($email,"jmeno").'</div>
        <div class="karta_prijmeni">'. get_item($email,"prijmeni").'</div>
        <div class="karta_email">'.get_item($email,"email").'</div>
        <div class="karta_datum_reg">'.datum_format(get_item($email,"datum_registrace")).'</div>
        <div class="karta_avatar_v2">
        <img src="avatar/'.get_item($email,"avatar").'" alt="Profilový obrázek"width="135px" height="135px">
        </div>
        </div>
        ';
    }

    function vypis_karta_admin($email){
        echo'
        <div class="karta_autor_container">
        <img src="grafika/karty/karta_admin.png" alt="" width="550px" height="350px">
        <div class="karta_jmeno">'.get_item($email,"jmeno").'</div>
        <div class="karta_prijmeni">'. get_item($email,"prijmeni").'</div>
        <div class="karta_email">'.get_item($email,"email").'</div>
        <div class="karta_datum_reg">'.datum_format(get_item($email,"datum_registrace")).'</div>
        <div class="karta_avatar_v2">
        <img src="avatar/'.get_item($email,"avatar").'" alt="Profilový obrázek"width="135px" height="135px">
        </div>
        </div>
        ';
    }

    function vypis_vydanych_cisel(){
        $db=get_db();
        $sql="SELECT * FROM cisla";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result)) {
            if ($row['stav']=="vydán")
            {
                echo"<tr>";
                echo"<td>".$row['id']."</td>";
                echo"<td>".$row['nazev']."</td>";
                echo"<td>".datum_format($row['datum_vydani'])."</td>";
                echo"<td><a  href='vydana_cisla/".$row['soubor']."' target='_blank'>Zobrazit cislo</a></td>";
            }                            
        }
    }

    function nazev_cisla_casopisu($cislo){
        $db=get_db();
        $sql="SELECT * FROM cisla";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result)) {
            if ($row['id']==$cislo)
            {
                echo $row['nazev'];
            }                            
        }
    }

    function registrovat_redaktora($jmeno,$prijmeni,$email){
        $db= get_db();
		$check_duplicate_email= "SELECT email FROM uzivatele WHERE email= '$email' ";
		$result_email=mysqli_query($db,$check_duplicate_email);
		$count_email=mysqli_num_rows($result_email);
        $heslo= vygenerovat_heslo();
		$heslo_zasifrovane=md5($heslo);
		if ($count_email>0) {
			echo "<script>alert('Tento email již využívná jiný uživatel, zvol si jiný')</script>";
		}
		else{
			$sql = "INSERT INTO uzivatele(jmeno, prijmeni, email, heslo, avatar, role) VALUES ('$jmeno','$prijmeni','$email','$heslo_zasifrovane','default.png','recenzent')";
			mysqli_query($db,$sql);
            mail_registrace_recenzenta($email,$heslo);
            echo "<script>alert('Registrace recenzentra, proběhla úspěšně')</script>";
		}
    }

    function vygenerovat_heslo() {
        $znaky = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $heslo = array();
        $pocet_znaku = strlen($znaky) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $pocet_znaku);
            $heslo[] = $znaky[$n];
        }
        return implode($heslo);
    }
    function vypis_prehled_recenzi_recenzenta($email){
        $db=get_db();
        $sql="SELECT * FROM clanky";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        $nasel=false;
        while($row = mysqli_fetch_array($result)) {
            if ($row['email_recenzent1']==$email||$row['email_recenzent2']==$email)
            {
                $nasel=true;
                echo"<tr>";
                echo"<td>".$row['id']."</td>";
                echo"<td>".$row['nazev']."</td>";
                echo"<td>".$row['stav']."</td>";
                echo"<td>".datum_format($row['datum_vytvoreni'])."</td>";
                echo'<td> <form action = "tvorba_recenze.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["id"].'" name="id_clanku"> <button type="submit" id="img_vytvorit_recenzi" class="img_tlacitka btn_odeslat_form"></button></form></td>';

            }                            
        }
        if(!$nasel) echo "Nemáte momentálně žádný článek k recenzi";
    }
?>