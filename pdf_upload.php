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

   $uploadpath=$target_dir.basename($filename);
if(! in_array($ext,$fileextensions))
   {
     $errors[]="Soubor není formátu .pdf (Lze nahrát pouze soubory formátu .pdf)";
   }
   if(empty($errors))
   {
     if(move_uploaded_file($tmpname,$uploadpath))
     {
       echo "Soubor byl úspěšně nahrán";
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