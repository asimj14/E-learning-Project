<html>
<head></title>	
</head>
<h1></h1>
<body>
<?php
session_start();

$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";
$tab_nome="utenti";

    $mysqli = new mysqli($host,$username,$pass,$db_nome);
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}

	$nome = "";
	$cognome = "";
	$nome="";
	$cf="";
	$datanascita="";
	$email="";
	$username="";
	$password="";
	$usertype="";
	$idutente = 0;
	$edit_state=false;





if (isset($_POST['save'])) {	
    $cognome=$_POST["cognome"];
	$nome=$_POST["nome"];
	$cf=$_POST["cf"];
	$datanascita=$_POST["datanascita"];
	$email=$_POST["email"];
	$password=md5($_POST["password"]);
	$username=$_POST["username"];
	$usertype=$_POST["usertype"];
	
$sql="INSERT INTO $tab_nome(cognome, nome, cf, tipoutente, datanascita, email, username, password, abilitato) ";
$sql.="VALUES ('$cognome','$nome','$cf','$usertype','$datanascita','$email','$username','$password','1')";	
if ($mysqli->query($sql) === TRUE) {
	$_SESSION['msg'] = " New User created successfully";
    echo "New record created successfully";
    header('location: ammloginok.php');
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

}

//update records
$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";
$tab_nome="utenti";
if(isset($_POST['update'])){
	$idutente =$_POST["idutente"];
     $cognome=$_POST["cognome"];
	$nome=$_POST["nome"];
	$cf=$_POST["cf"];
	$datanascita=$_POST["datanascita"];
	$email=$_POST["email"];
	$password=md5($_POST["password"]);
	$username=$_POST["username"];
	$usertype=$_POST["usertype"];
	/*
	$sql2=" UPDATE utenti SET idutente='$idutente',
											 cognome='$cognome',

											 nome='$nome',

											 cf='$cf',

											datanascita='$datanascita',

											 email='$email',

											 password='$password',

											 username='$username',

											 tipoutente='$usertype',

									 WHERE idutente='$idutente' ";


  $sql2= "UPDATE [LOW_PRIORITY] [IGNORE] utenti
SET idutente='$idutente' [, cognome='$cognome'…]
[WHERE idutente='$idutente']
[LIMIT numero_righe]";*/

$sql2="UPDATE `utenti` SET 
  `idutente`='$idutente', 
  `cognome`='$cognome', 
  `nome`='$nome', 
  `cf`='$cf',
  `datanascita`='$datanascita',
  `email`='$email',
  `password`='$password', 
  `tipoutente`='$usertype', 

  `username`='$username' 
WHERE `idutente`='$idutente'";

 if ($mysqli->query($sql2) === TRUE) {
	$_SESSION['msg'] = " User updated successfully";
    
    header('location: ammloginok.php');
} else {
    echo "Error: " . $sql2 . "<br>" . $mysqli->error;
}

}
//delete records
if(isset($_GET['del'])){

	$idutente=$GET['del'];

	$cognome=$GET["cognome"];
	$nome=$_POST["nome"];
	$cf=$_POST["cf"];
	$datanascita=$_POST["datanascita"];
	$email=$_POST["email"];
	$password=md5($_POST["password"]);
	$username=$_POST["username"];
	$usertype=$_POST["usertype"];



	$sql2="DELETE FROM `utenti` 
     WHERE `idutente`='$idutente'";

 if ($mysqli->query($sql2) === TRUE) {
	$_SESSION['msg'] = "User deleted successfully";
    
    header('location: ammloginok.php');
} else {
    echo "Error: " . $sql2 . "<br>" . $mysqli->error;
}


	}


//retrieve records 
$sql1=" Select * from $tab_nome ";
$result = $mysqli->query($sql1);





$mysqli->close();

?>

</body>
</html>




















