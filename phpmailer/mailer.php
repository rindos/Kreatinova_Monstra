<?php
/*##########Script Information#########
  # Purpose: Send mail Using PHPMailer#
  #          & Gmail SMTP Server 	  #
  # Created: 24-11-2019 			  #
  #	Author : Hafiz Haider			  #
  # Version: 1.0					  #
  # Website: www.BroExperts.com 	  #
  #####################################*/

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

	function mail_registrace_recenzenta($email,$heslo){
        //Create instance of PHPMailer
        $mail = new PHPMailer();
        //Set mailer to use smtp
            $mail->isSMTP();
        //Define smtp host
            $mail->Host = "smtp.gmail.com";
        //Enable smtp authentication
            $mail->SMTPAuth = true;
        //Set smtp encryption type (ssl/tls)
            $mail->SMTPSecure = "tls";
        //Port to connect smtp
            $mail->Port = "587";
        //Set gmail username
            $mail->Username = "kreatinek.web@gmail.com";
        //Set gmail password
            $mail->Password = "Kreatinek0000";
        //Email subject
            $mail->Subject = "Test email using PHPMailer";
        //Set sender email
            $mail->setFrom('kreatinek.web@gmail.com');
        //Enable HTML
            $mail->isHTML(true);
        //Attachment
            $mail->addAttachment('img/attachment.png');
        //Email body
            $mail->Body = "<h1>Právě jste se stal RECENZENTEM na webu Kreatinek</h1></br><p>Přihlašovací údaje:<br>Email: ".$email."<br>Heslo: ".$heslo."</p>";
        //Add recipient
            $mail->addAddress($email);
        //Finally send email
            if ( $mail->send() ) {
                //echo "Email Sent..!";
            }else{
                //echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
            }
        //Closing smtp connection
            $mail->smtpClose();
    }

    function mail_registrace_autor($email){
        //Create instance of PHPMailer
        $mail = new PHPMailer();
        //Set mailer to use smtp
            $mail->isSMTP();
        //Define smtp host
            $mail->Host = "smtp.gmail.com";
        //Enable smtp authentication
            $mail->SMTPAuth = true;
        //Set smtp encryption type (ssl/tls)
            $mail->SMTPSecure = "tls";
        //Port to connect smtp
            $mail->Port = "587";
        //Set gmail username
            $mail->Username = "kreatinek.web@gmail.com";
        //Set gmail password
            $mail->Password = "Kreatinek0000";
        //Email subject
            $mail->Subject = "Test email using PHPMailer";
        //Set sender email
            $mail->setFrom('kreatinek.web@gmail.com');
        //Enable HTML
            $mail->isHTML(true);
        //Attachment
            $mail->addAttachment('img/attachment.png');
        //Email body
            $mail->Body = "<h1>Právě jste se stal AUTOREM na webu Kreatinek</h1></br><p>Přihlašovací údaje:<br>Email: ".$email."<br>Heslo: ".$heslo."</p>";
        //Add recipient
            $mail->addAddress($email);
        //Finally send email
            if ( $mail->send() ) {
                //echo "Email Sent..!";
            }
            else{
                //echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
            }
        //Closing smtp connection
            $mail->smtpClose();
    }