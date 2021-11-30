<?php
  require_once('funkce.php');
pridani_recenzentu_k_clanku($_POST["recenzent1"],$_POST["recenzent2"],$_POST["id_clanku"]);
header("pridani_recenzentu.php")
?>