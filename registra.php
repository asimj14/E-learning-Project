
<html>
<head>
<title>Sign Up</title>	

</head>
<body>

<?php

$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";
$tab_nome="utenti";

    $mysqli = new mysqli($host,$username,$pass,$db_nome);
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
	
    $cognome=$_POST["cognome"];
	$nome=$_POST["nome"];
	$cf=$_POST["cf"];
	$datanascita=$_POST["datanascita"];
	$email=$_POST["email"];
	$username=$_POST["username"];
	$password=$_POST["password"];
	$usertype=$_POST["usertype"];
	$password=md5($password);
	




$sql="INSERT INTO $tab_nome(cognome, nome, cf, tipoutente, datanascita, email, username, password, abilitato) ";
$sql.="VALUES ('$cognome','$nome','$cf','$usertype','$datanascita','$email','$username','$password','1')";


if ($mysqli->query($sql) === TRUE) {

	header("Location: registered.php?success=User registered successfully!!!");
} else {
    header("Location: registered.php?error=Error:Error while trying to register");
}
$mysqli->close();

?>
 

</body>
</html>
