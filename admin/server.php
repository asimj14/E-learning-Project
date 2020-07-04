
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
	//$_SESSION['msg'] = " New User created successfully";
    //echo "New record created successfully";
    header('location: ammloginok.php?sucins=New user created successfully');
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}

}
//update records



//retrieve records 
$sql1=" Select * from $tab_nome ";
$result = $mysqli->query($sql1);
$mysqli->close();

?>





















