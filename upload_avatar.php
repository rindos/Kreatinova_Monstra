<?php
error_reporting(0);
ini_set('display_errors', 0);
  session_start();
  $db= mysqli_connect("localhost", "root", "","rsp");
  $sql="SELECT * FROM uzivatele";
  $result = mysqli_query($db, $sql) or die( mysqli_error($db));
  while($row = mysqli_fetch_array($result,true)) {
    if (strcasecmp($row['email'], $_SESSION['email'])==0) {
      $id = $row['id'];
      $email=$row['email'];
      $avatar=$row['avatar'];
    }
  }
  if (isset($_SESSION['email'])) {
  }
  else{
    echo "<script>alert('Pro vstup na svůj profil musíš být přihlášen.
    \\nPokud ještě nemáš vytvořený účet, tak se zaregistruj')</script>";
    echo "<script>location.href='login.php'</script>";
  }
?>
<?php
$filename= "avatar/".$email;
$db= mysqli_connect("localhost", "root", "","rsp");
$image = $_FILES["fileToUpload"]["name"];
$true=true;
$target_dir = "avatar/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$filename_default=$email.".".$imageFileType;
$sql_inzerat = "UPDATE uzivatele SET avatar='$avatar' WHERE email='".$email."'";
$sql_default = "UPDATE uzivatele SET avatar='$filename_default' WHERE email='".$email."'";
$nazev_obrazku= $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo " Soubor je obrázek: - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo " Soubor není obrázek. ";
        $uploadOk = 0;
    }
}
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo " Omlouváme se, soubor je příliš velký.";
    $uploadOk = 0;
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
    echo " Podporované formáty: JPG, JPEG, PNG a GIF";
    $uploadOk = 0;
}
if ($uploadOk == 0) {
    echo " Váš náhledový obrázek nebyl nahrán.";
    header("refresh:4; url=home.php");
}
else
{
  if($avatar=="default.png")
  {
    $filename="avatar/".$filename_default;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filename))
    {
        echo "Soubor: ". basename( $_FILES["fileToUpload"]["name"]). " byl úspěšně nahrán.";
        $db= mysqli_connect("localhost", "root", "","rsp");
        $result2 = mysqli_query($db,$sql_default) or die( mysqli_error($db)); 
        while ($row2=mysqli_fetch_array($result2, true))
        {
            if ($row2['email']==$email) {
              mysqli_query($db,$sql_default);
            }
        }
        header("refresh:2; url=home.php");
    }
    else
    {
      echo " Nebylo zapsáno do databáze.";
    }
  }
  else
  {
    $filename="avatar/".$avatar;
    if (unlink($filename))
    {
      echo 'The file ' . $avatar . ' was deleted successfully!';
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $filename))
      {
          echo "Soubor: ". basename( $_FILES["fileToUpload"]["name"]). " byl úspěšně nahrán.";
          $db= mysqli_connect("localhost", "root", "","rsp");
          $result2 = mysqli_query($db,$sql_inzerat) or die( mysqli_error($db)); 
          while ($row2=mysqli_fetch_array($result2, true))
          {
              if ($row2['email']==$email) {
                mysqli_query($db,$sql_inzerat);
              }
          }
          header("refresh:2; url=home.php");
      }
      else
      {
        echo " Nebylo zapsáno do databáze.";
      }
    }
    else
    {
      echo 'There was a error deleting the file ' . $avatar;
    }
  }
}
?>