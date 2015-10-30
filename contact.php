<?php

	function getConnection() {
    $dbhost='localhost';
    $dbuser='root';
    $dbpass='775922';
    $dbname='contact';
    $dbh = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;
}
function saveComent($nombre, $email,$asunto,$mensaje) {
  $sql = 'INSERT INTO contact (nombre, email,asunto,mensaje) VALUES (:nombre,:email,:asunto,:mensaje)';
  try {
    $db = getConnection();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':asunto', $asunto);
    $stmt->bindParam(':mensaje', $mensaje);
    $stmt->execute();
    echo $stmt->rowCount();

    $db = null;
  } catch(PDOException $e) {
    echo 'Error: ' . $e->getMessage();
  }
}


	$email   = $_POST['email'];
	$name  = $_POST['name'];
	$subject = $_POST['subject'];
	$message = $_POST['comments']; 
	saveComent($name,$email,$subject,$message);  
?>