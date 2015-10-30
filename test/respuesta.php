<html>
<body>
<?php
$usuario=$_POST['usr'];
$pass=$_POST['pass'];
$email=$_POST['email'];

$link = mysqli_connect("localhost", "prueba", "pruebaprueba1234", "prueba");

/* comprobar la conexión */
if (mysqli_connect_errno()) {
    printf("Falló la conexión: %s\n", mysqli_connect_error());
    exit();
}


$qry="INSERT INTO usuarios VALUES ('','".$usuario."','".$pass."','".$email."')";


if($link->query($qry))
	echo "se ha registrado el usuario";
else 
	echo "no se ha podido registrar el usuario";


require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                           

$mail->setFrom('no_reply@test.com', 'prueba');
$mail->addAddress($email, $usuario);     
$mail->isHTML(true);                         

$mail->Subject = 'mi mensaje';
$mail->Body    = 'gracias por registrarte <b>in bold!</b>';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
?>
</body>
</html>