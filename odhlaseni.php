<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="grafika/loga/logo.png" type="image/png">
  <link rel="stylesheet" href="stylex.css">
  <title>Odhlášení</title>
</head>
<body>
    <?php
	session_start();
	session_destroy();
	unset($_SESSION['email']);
	header("location: index.php");
?>
</body>
</html>