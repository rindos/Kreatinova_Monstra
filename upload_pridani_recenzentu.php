<?php
  require_once('funkce.php');
    if($_POST["recenzent1"]==$_POST["recenzent2"]){
      echo "<script>alert('Recenzent 1 je stejný jako Recenzent2 <br> Recenzenti musí být odlišní</script>";
      header("location: prirazeni_recenzentu.php");
    }
    else{
      pridani_recenzentu_k_clanku($_POST["recenzent1"],$_POST["recenzent2"],$_POST["id_clanku"]); 
      header("location: prirazeni_recenzentu.php");
    }
    
    
?>