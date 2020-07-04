<!DOCTYPE html>
<html>
<head> <link rel="stylesheet" href="css/style.css"> 
	<title>control login</title>
</head>
<body>
	<div class="due" style="background-color: rgb(26, 177, 136,0.9);">
			
			<div style="width: 50%; height:50%; text-align: center; margin: 5% 25%; padding: 2%; ">
				
           <p style="font-size: 24px"><strong style="font-size: 36px"></strong><br></p>
<?php
$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";
$tab_nome="utenti";
//Create connection_aborted
 $conn= new mysqli($host,$username,$pass,$db_nome);
 //check connection
 if($conn->connect_error){
	 die("Connection failed ; ".$connect_error);
 }
 if (isset ($_POST['username'])  && isset($_POST['password'])){

// acquisizione dati dal form HTML
$username = $_POST["username"];
$password = md5($_POST["password"]);

// lettura della tabella utenti il campo pwd nella tabella utenti deve essere di almeno 32 

$sql=" Select * from $tab_nome where username='$username' and  password='$password'";
$result=$conn->query($sql);

if($result->num_rows==1){

    while($row = $result->fetch_assoc()) {
      
			     if($row["tipoutente"]=='Student') {
			     	 session_start();
	                 $_SESSION['username'] = $username;
	                 session_start();
	                 $_SESSION['idutente']= $row['idutente'];
	                 session_start();
	                 $_SESSION['cognome'] = $row['cognome'];
	                 session_start();
	                 $_SESSION['nome']= $row['nome'];
	                 session_start();
	                 $_SESSION['usertype']= $row['tipoutente'];
	                 session_start();
	                 $_SESSION['email'] = $row['email'];
	                 session_start();
	                 $_SESSION['datanascita']= $row['datanascita'];
	                 session_start();
	                 $_SESSION['cf']= $row['cf'];


			     	 header("Location: student/studloginok.php");}
			     	elseif($row["tipoutente"]=='Teacher') {
			         		session_start();
	                 		$_SESSION['username'] = $username;
	                 		session_start();
	                 		$_SESSION['idutente']= $row['idutente'];
	                 		session_start();
	                 		$_SESSION['cognome'] = $row['cognome'];
	                 		session_start();
	                 		$_SESSION['nome']= $row['nome'];
	                 		session_start();
	                 		$_SESSION['usertype']= $row['tipoutente'];
	                		session_start();
	                 		$_SESSION['email'] = $row['email'];
	                 		session_start();
	                 		$_SESSION['datanascita']= $row['datanascita'];
	                 		session_start();
	                 		$_SESSION['cf']= $row['cf'];
			     	 header("Location: teacher/docloginok.php");} 
			     	else
			     		 {
			     		 	session_start();
	                        $_SESSION['username'] = $username;
	                        session_start();
	                        $_SESSION['idutente']= $row['idutente'];
	                        session_start();
	                 	    $_SESSION['cognome'] = $row['cognome'];
	                 	    session_start();
	                 	    $_SESSION['nome']= $row['nome'];
	                  	    session_start();
	                 		$_SESSION['usertype']= $row['tipoutente'];
	                		session_start();
	                 		$_SESSION['email'] = $row['email'];
	                 		session_start();
	                 		$_SESSION['datanascita']= $row['datanascita'];
	                 		session_start();
	                 		$_SESSION['cf']= $row['cf'];
			     	 header("Location: admin/ammloginok.php");}


}
}
 else 
{

echo "<br><br><br><center><h1>
Identification failed: wrong username or password </h1><br />";
echo "<h2><a href=\"index.html\">&#8594;Back to login page</h2>  </a></center>";
}
}
$mysqli->close();

?>


</body>
</html>