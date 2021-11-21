<?php
	session_start();
	require_once('funkce.php');
	if (isset($_POST['t_prihlasit'])) {
        prihlaseni($_POST['email'],$_POST['heslo']);
	}
    if (isset($_POST['t_registrovat'])) {
		registrace($_POST['jmeno'],$_POST['prijmeni'],$_POST['email'],$_POST['heslo'],$_POST['heslo2']);
	}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!DOCTYPE html>
    <html lang="en" class="no-js">
    <head>
        <meta charset="UTF-8" />
        <title>Reg/Log</title>
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/demo.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
            <header>			
            </header>
            <section>
            		<div style="padding-top: 5%"> 
                <div id="container_demo">
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="prihlaseni.php" method="post" autocomplete="on"> 
                                <h1>Přihlášení</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" > E-mail </label>
                                    <input id="username" name="email" required="required" type="text" placeholder="např. pavelnovak@seznam.cz"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p"> Heslo </label>
                                    <input id="password" name="heslo" required="required" type="password" placeholder="Heslo" /> 
                                </p>
                                
                                <p class="login button"> 
                                    <input name="t_prihlasit" type="submit" value="Přihlásit" /> 
								</p>
                                <p class="change_link">
									Ještě nejste registrovaný?
									<a href="#toregister" class="to_register">Registrovat</a>
								</p>
                            </form>
                        </div>
                        <div id="register" class="animate form">
                            <form  action="prihlaseni.php" method="post" autocomplete="on"> 
                                <h1> Registrace </h1> 
                                <p> 
                                    <label data-icon="u">Jméno</label>
                                    <input required="required" name="jmeno" type="text" placeholder="Pavel" />
                                </p>
                                <p> 
                                    <label data-icon="u">Příjmení</label>
                                    <input required="required" name="prijmeni" type="text" placeholder="Novák" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > E-mail</label>
                                    <input id="emailsignup" name="email" required="required" type="email" placeholder="pavelnovak@seznam.cz"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Heslo </label>
                                    <input id="heslo1_reg" name="heslo" required="required" type="password" placeholder="Heslo"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Potvrďte prosím své heslo </label>
                                    <input id="heslo2_reg" name="heslo2" required="required" type="password" placeholder="Heslo"/>
                                </p>
                                <span id='kontrola_hesel'></span>
                                <p class="signin button"> 
									<input type="submit" name="t_registrovat" value="Registrovat"/> 
								</p>
                                <p class="change_link">  
									Už jste registrován?
									<a href="#tologin" class="to_register"> Přihlásit se </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </div>
            </section>
        </div>
    </body>
</html>
<script>
$('#heslo1_reg, #heslo2_reg').on('keyup', function () {
  if ($('#heslo1_reg').val() == $('#heslo2_reg').val()) {
    $('#kontrola_hesel').html('Hesla se shodují').css('color', 'green');
  } else 
    $('#kontrola_hesel').html('Hesla se neshodují').css('color', 'red');
});
</script>