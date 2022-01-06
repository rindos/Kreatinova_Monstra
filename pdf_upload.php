<?php
   require_once('funkce.php');
   $target_dir="clanky/";
   $filename=$_FILES["fileupload"]["name"];

   $tmpname=$_FILES["fileupload"]["tmp_name"];
   $filetype=$_FILES["fileupload"]["type"];
   $errors=[];
   $fileextensions=["pdf"];
	$arr=explode(".",$filename);
   $ext=strtolower(end($arr));
   $nazev_clanku=$_POST['nazev'];
   $email_autor=$_POST['email'];
   $cislo_casopisu=$_POST['id_cisla'];

   $id_clanku=prirazeni_id_clanku();
   $soubor=$id_clanku."_".$nazev_clanku.".pdf";
   $uploadpath=$target_dir.basename($soubor);

if(! in_array($ext,$fileextensions))
   {
     $errors[]="Soubor není formátu .pdf (Lze nahrát pouze soubory formátu .pdf)";
   }
   if(empty($errors))
   {
     if(move_uploaded_file($tmpname,$uploadpath))
     {
       pridat_clanek($soubor,$nazev_clanku,$email_autor,$cislo_casopisu);
       echo "Soubor byl úspěšně nahrán";
       header("location: stav_clanku.php");
     }
     else
     {
       echo "Něco se pokazilo";
     }
   }
   else
   {
      foreach($errors as $value)
      {
         echo "$value";
      }
   }
   
?>