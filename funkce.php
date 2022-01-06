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

    function get_item_recenze($id_recenze,$item){
        $db= get_db();
        $sql = "SELECT * FROM recenze WHERE id = '$id_recenze'";
        $result= mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result,true)) {
            return $row[$item]; 
        }
    } 

    function get_item_odvolani($id_odvolani,$item){
        $db= get_db();
        $sql = "SELECT * FROM odvolani WHERE id = '$id_odvolani'";
        $result= mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result,true)) {
            return $row[$item]; 
        }
    } 

    function get_item_cislo($id_cislo,$item){
        $db= get_db();
        $sql = "SELECT * FROM cisla WHERE id = '$id_cislo'";
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
                <a href="upravit_profil.php"><div id="img_upravit_profil" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="prehled_recenzi_autorovi.php"><div id="img_vypracovane_recenze" class="img_tlacitka"></div></a>
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
                <a href="upravit_profil.php"><div id="img_upravit_profil" class="img_tlacitka"></div></a>
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
                <a href="sprava_odvolani.php"><div id="img_sprava_odvolani" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="prehled_clanku.php"><div id="img_prehled_clanku" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="registrace_recenzenta.php"><div id="img_vytvorit_recenzenta" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="upravit_profil.php"><div id="img_upravit_profil" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="prehled_vytvorene_recenze.php"><div id="img_vypracovane_recenze" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="vytvoreni_cisla.php"><div id="img_vytvorit_nove_cislo" class="img_tlacitka"></div></a>
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
                echo'<td> <form action = "podrobnosti_clanku.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["id"].'" name="id_clanku"> <button type="submit" id="img_podrobnosti_clanku" class="img_tlacitka btn_odeslat_form"></button></form></td>';               
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
                echo'<td> <form action = "podrobnosti_clanku.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["id"].'" name="id_clanku"> <button type="submit" id="img_podrobnosti_clanku" class="img_tlacitka btn_odeslat_form"></button></form></td>';                    
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
      function vypis_prehled_vytvorene_recenzi(){
        $db=get_db();
        $sql="SELECT * FROM recenze";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result)) {
            if($row['zorazeni_autorovi']=="0")
            {
                echo"<tr>";
                echo"<td>".get_item_clanek(get_item_recenze($row['id'],"id_clanku"),"nazev")."</td>";
                echo"<td>".$row['email_recenzent']."</td>";
                echo"<td>".datum_format($row['datum_recenze'])."</td>";
                echo'<td> <form action = "podrobnosti_recenze.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["id"].'" name="id"> <button type="submit" id="img_podrobnosti_clanku" class="img_tlacitka btn_odeslat_form"></button></form></td>';
                echo'<td> <form action = "prehled_vytvorene_recenze.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["id"].'" name="id"> <button type="submit" name="t_odeslani_autorovi" id="img_odeslat" class="img_tlacitka btn_odeslat_form"></button></form></td>';                     
            }
        }
      }

      function vypis_recenzi_autorovi($email){
        $db=get_db();
        $sqlrecenze="SELECT * FROM recenze";
        $sqlclanky= "SELECT * FROM clanky WHERE email_autor= '$email'";
        $result = mysqli_query($db, $sqlclanky) or die( mysqli_error($db));
        $result2 = mysqli_query($db, $sqlrecenze) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result))
        {
            if($row['recenze1_provedeno']=="1"||$row['recenze2_provedeno']=="1"){
                while($row2 = mysqli_fetch_array($result2))
                {
                    if($row2['zorazeni_autorovi']=="1")
                    {
                        echo"<tr>";
                        echo"<td>".get_item_clanek(get_item_recenze($row2['id'],"id_clanku"),"nazev")."</td>";
                        echo"<td>".$row2['email_recenzent']."</td>";
                        echo"<td>".datum_format($row2['datum_recenze'])."</td>";
                        echo'<td> <form action = "podrobnosti_recenze.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row2["id"].'" name="id"> <button type="submit" id="img_podrobnosti_clanku" class="img_tlacitka btn_odeslat_form"></button></form></td>';
                        if($row2['autor_se_odvolal']=="0")
                        echo'<td> <form action = "nahlaseni_recenze.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row2["id"].'" name="id"> <button type="submit" name="t_odeslani_autorovi" id="img_nahlasit" class="img_tlacitka btn_odeslat_form"></button></form></td>';                     
                        else
                        echo"<td>"."Nahlášeno"."</td>";
                    }
                }
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
        if(!$nasel) echo "Momentálně žádné recenze k přiřazení";
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

      function upravit_profil($jmeno,$prijmeni,$email,$heslo,$heslo2){
		if ($heslo==$heslo2)
		{
            $db= get_db();
            $check_duplicate_email= "SELECT email FROM uzivatele WHERE email= '$email' ";
            if($heslo==""){
                $sqlupdate= "UPDATE uzivatele SET jmeno='$jmeno',prijmeni='$prijmeni' WHERE email='$email'";
            }
            else{
                $heslo=md5($heslo);
                $sqlupdate= "UPDATE uzivatele SET jmeno='$jmeno',prijmeni='$prijmeni',heslo='$heslo' WHERE email='$email'";
            }
            mysqli_query($db,$sqlupdate);
            header("location: profil.php");
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
    function odeslani_recenze_autorovi($id_recenze){
        $db=get_db();
        $sqlupdate= "UPDATE recenze SET zorazeni_autorovi='1' WHERE id='$id_recenze'";
        mysqli_query($db,$sqlupdate);
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
            	$probehlo=0;
                $nasel=true;
                echo"<tr>";
                echo"<td>".$row['id']."</td>";
                echo"<td>".$row['nazev']."</td>";
                echo"<td>".$row['stav']."</td>";
                echo"<td>".datum_format($row['datum_vytvoreni'])."</td>";
                echo'<td> <form action = "podrobnosti_clanku.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["id"].'" name="id_clanku"> <button type="submit" id="img_podrobnosti_clanku" class="img_tlacitka btn_odeslat_form"></button></form></td>';
                if ($row['recenze1_provedeno']!=1&&$email==$row['email_recenzent1']) {
                	echo'<td> <form action = "tvorba_recenze.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["id"].'" name="id_clanku"> <button type="submit" id="img_vytvorit_recenzi" class="img_tlacitka btn_odeslat_form"></button></form></td>';
                	$probehlo=1;
                }
                if ($row['recenze2_provedeno']!=1&&$email==$row['email_recenzent2']) {
                	echo'<td> <form action = "tvorba_recenze.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["id"].'" name="id_clanku"> <button type="submit" id="img_vytvorit_recenzi" class="img_tlacitka btn_odeslat_form"></button></form></td>';
                	$probehlo=1;

                }
                if(!$probehlo){
                    $sqlrecenze="SELECT * FROM recenze WHERE email_recenzent='$email'";
                    $result2 = mysqli_query($db, $sqlrecenze) or die( mysqli_error($db));
                    while($row2 = mysqli_fetch_array($result2)) {
                        if($row['id']==$row2['id_clanku'])
                        {
                            echo'<td> <form action = "podrobnosti_recenze.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row2["id"].'" name="id"> <button type="submit" id="img_podrobnosti_clanku" class="img_tlacitka btn_odeslat_form"></button></form></td>';
                        }
                    }
                }
            }                            
        }
        if(!$nasel) echo "Nemáte momentálně žádný článek k recenzi";
    }

    function kontrola_stavu_recenzi($id_clanku){
    	$db= get_db(); 
		$sql="SELECT * FROM clanky";
		$result = mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result)) {
            if ($row['recenze1_provedeno']=="1"&&$row['recenze2_provedeno']=="1"&&$row['id']==$id_clanku)
            {
            	$sqlupdate= "UPDATE clanky SET stav='Recenze vyhotoveny, čeká se na zpracování redaktorem' WHERE id='$id_clanku'";
        		mysqli_query($db,$sqlupdate);
            }          
        }
    }

    function vytvoreni_recenze($id_clanku,$email_recenzenta,$aktualnost,$originalita,$odborna_uroven,$js_uroven,$text_recenze){
    	$db= get_db(); 
        $sql= "INSERT INTO recenze(id_clanku,email_recenzent,aktualnost_zajimavost_prinosnost,originalita,odborna_uroven,jazykova_a_stylisticka_uroven,text_recenze,vyhotoveno) VALUES ('$id_clanku', '$email_recenzenta', '$aktualnost', '$originalita', '$odborna_uroven', '$js_uroven', '$text_recenze','1')";
        mysqli_query($db,$sql);


        $sqlselect= "SELECT * FROM clanky WHERE id = '$id_clanku'";
        $result= mysqli_query($db, $sqlselect) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result,true)) {
            if ($row['email_recenzent1']==$email_recenzenta) {
            	$sqlupdate= "UPDATE clanky SET recenze1_provedeno='1'";
        		mysqli_query($db,$sqlupdate);
            }
            if ($row['email_recenzent2']==$email_recenzenta) {
            	$sqlupdate= "UPDATE clanky SET recenze2_provedeno='1'";
        		mysqli_query($db,$sqlupdate);
            }
        }
        kontrola_stavu_recenzi($id_clanku);
        header("location: prehled_recenze.php");
    }

    function vytvoreni_cisla($nazev,$pocet_clanku,$popis){
        $db= get_db(); 
        $sql= "INSERT INTO cisla(nazev,popis,pocet_clanku,stav) VALUES ('$nazev','$popis','$pocet_clanku', 'nevydán')";
        mysqli_query($db,$sql);
    }

    function odeslani_odvolani($id_recenze,$id_clanku,$text_odvolani){
        $db= get_db(); 
        $sql= "INSERT INTO odvolani(id_recenze, id_clanku,text_odvolani,stav) VALUES ('$id_recenze','$id_clanku','$text_odvolani','Předáno redaktorovi')";
        mysqli_query($db,$sql);
        $sqlupdate= "UPDATE recenze SET autor_se_odvolal='1' WHERE id='$id_recenze'";
        mysqli_query($db,$sqlupdate);
        header("location: prehled_recenzi_autorovi.php");
    }
    
    function vypis_odvolani(){
        $db=get_db();
        $sql="SELECT * FROM odvolani";
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        $nasel=false;
        while($row = mysqli_fetch_array($result)) {
                $nasel=true;
                echo"<tr>";
                echo"<td>".$row['id']."</td>";
                echo"<td>".get_item_clanek($row['id_clanku'],'nazev')."</td>";
                echo"<td>".$row['stav']."</td>";
                echo"<td>".datum_format($row['datum_vytvoreni'])."</td>";       
                echo'<td> <form action = "podrobnosti_recenze.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["id_recenze"].'" name="id"> <button type="submit" id="img_podrobnosti_clanku" class="img_tlacitka btn_odeslat_form"></button></form></td>';     
                echo'<td> <form action = "podrobnosti_odvolani.php" method = "POST" enctype="multipart/form-data"/> <input type="hidden" value="'.$row["id"].'" name="id"> <button type="submit" id="img_podrobnosti_clanku" class="img_tlacitka btn_odeslat_form"></button></form></td>';                           
        }
        if(!$nasel) echo "Nebylo nalezeno žádné odvolání";
    }
?>