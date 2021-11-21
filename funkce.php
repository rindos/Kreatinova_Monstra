<?php

    function get_db(){
        return mysqli_connect("localhost", "root", "","rsp");
    }

    function get_item($email,$item){
        $db= get_db();
        $sql = "SELECT * FROM uzivatele WHERE email = '$email'";
        $result= mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result,true)) {
            return $row[$item]; 
        }
    } 
       
    function neprihlasen(){
        echo "<script>alert('Pro vstup na svůj profil musíš být přihlášen.\\nPokud ještě nemáš vytvořený účet, tak se zaregistruj')</script>";
        echo "<script>location.href='prihlaseni.php'</script>";
    }

    function vypis_menu($prihlasen){
        if ($prihlasen) {
            echo '<li><a href="home.php">Profil</a></li>';
            echo '<li><a href="moje_inzeraty.php">Moje inzeráty</a></li>';
            echo '<li><a href="odhlaseni.php">Odhlásit</a></li>';
        }
        else{
            echo '<li><a href="login.php">Přihlášení</a></li>';
        }
    }

    function vypis_tlacitka_neprihlasen(){
        echo '
            <div class="kontak">
                <div class="tlacitko">
                    <a href="archiv.php"><div id="img_archiv" class="img_tlacitka"></div></a>
                </div>
                <div class="tlacitko">
                    <a href="prihlaseni.php#tologin"><div id="img_prihlasit" class="img_tlacitka"></div></a>
                </div>
                <div class="tlacitko">
                    <a href="prihlaseni.php#toregister"><div id="img_registrovat" class="img_tlacitka"></div></a>
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
                <a href="profil.php"><div id="img_stav_clanku" class="img_tlacitka"></div></a>
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
                <a href="nahrani_clanku.php"><div id="img_nahrat_clanek" class="img_tlacitka"></div></a>
            </div>
            <div class="tlacitko">
                <a href="profil.php"><div id="img_stav_clanku" class="img_tlacitka"></div></a>
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

    function ziskat_hrace_do_akademie($prezdivka){
        $soubor_krestni = file("jmena/krestni.txt");
        $soubor_prijmeni = file("jmena/prijmeni.txt");
        $krestni = $soubor_krestni[rand(0, count($soubor_krestni) - 1)];    
        $prijmeni = $soubor_prijmeni[rand(0, count($soubor_prijmeni) - 1)];
        $elo_hrac=0;
        if ((rand(0, 10)!=1)) $ruka="P";
        else $ruka="L";
        $vek= rand(13,16);
        $smlouva_od=0;
        $smlouva_do=0;
        $plat=0;
        $akademie=1;
        $club_name=get_item($email,'club_name');
        $db= get_db();
        $sqlhrac= "INSERT INTO hraci(jmeno, prijmeni, club_name, elo_hrac, ruka, vek, smlouva_od, smlouva_do, plat, akademie) VALUES ('$krestni', '$prijmeni', '$club_name', '$elo_hrac', '$ruka', '$vek', '$smlouva_od', '$smlouva_do', '$plat', '$akademie')";
        mysqli_query($db,$sqlhrac);
    }

    function VypisObrazku($selekce){
        $sql="SELECT * FROM users";
        $db= get_db();
        $result = mysqli_query($db, $sql) or die( mysqli_error($db));
        while($row = mysqli_fetch_array($result,true)) {
            if (strcasecmp($row['email'], $_SESSION['email'])==0) {
            $id = $row['id'];
            $email= $row['email'];
            $klubovna=$row['klubovna'];
            $loznice=$row['loznice'];
            $akademie=$row['akademie'];
            $posilovna=$row['posilovna'];
            $regeneracni_centrum=$row['regeneracni_centrum'];
            $satna=$row['satna'];
            }
        }
        $pole_hodnot=array($klubovna,$loznice,$akademie,$posilovna,$regeneracni_centrum,$satna);
        $pole_text= array('klubovna','loznice','akademie','posilovna','regeneracni_centrum','satna');
        for($i=0;$i<6;$i++)
        {
            if($selekce==$pole_text[$i])
            {
                if($pole_hodnot[$i]>0) echo '<img src="obrazky/vybaveni/'.$selekce.'.png" class="obrazek_kategorie">';
                else echo '<img src="obrazky/vybaveni/zamek.png" class="obrazek_kategorie">';
            }
        }
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

      function kontrolaVybaveni($email,$vybaveni){
        if(get_item($email,$vybaveni)==0)
        {
            echo "<script>alert('Nemáš přístup k tomuto vybavení')</script>";
            echo "<script>location.href='vybaveni.php'</script>";
        }
      }

      function vypisAkademie($email){
        $db=get_db();
        $sql="SELECT * FROM hraci";
        $club_name=get_item($email,'club_name');
        $result2 = mysqli_query($db, $sql) or die( mysqli_error($db));
        $nasel=false;
        while($row2 = mysqli_fetch_array($result2)) {
            if ($row2['club_name']==$club_name&&$row2['akademie']==1)
            {
                $nasel=true;
                echo"<tr>";
                echo"<td>".$row2['prijmeni']."</td>";
                echo"<td>".$row2['jmeno']."</td>";
                echo"<td>".$row2['vek']."</td>";
                echo"<td>".$row2['ruka']."</td>";
                echo"<td>".$row2['nastup']."</td>";
            }                            
            }
            if(!$nasel) echo "Nemáte žádného hráče ve své akademii";
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
			header("location: index.php");
            // header("location: profil.php");
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
                //header("location: profil.php");
			}
		}
		else
		{
			echo "<script>alert('Hesla se neshodují')</script>";
		}		
      }

      
?>