<!DOCTYPE html>
<html>
<head>
	<title>course</title>
	<style>
form {
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border-radius: 4px;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  transition: .5 ease;
  background-color: rgba(219,237,233,0.6);
}

form:hover {
  box-shadow: 0px 0px 40px 16px white;
  }
.sinistro{float:left;}
.destro{float:right;} 
  a:link {
    color: #white;
}

/* visited link */
a:visited {
    color: white;
}

/* mouse over link */
a:hover {
    color: black;
}

/* selected link */
a:active {
    color: white;
}


.a1:link {
    color: white;
}

/* visited link */
.a1:visited {
    color: white;
}

/* mouse over link */
.a1:hover {
    color: #1aba89;
}

/* selected link */
.a1:active {
    color: white;
}
.a2:link {
    color: black;
}

/* visited link */
.a2:visited {
    color: black;
}

/* mouse over link */
.a2:hover {
    color: #1aba89;
}

/* selected link */
.a2:active {
    color: black;
}
#error,#success{text-align:center;margin-top: 50px;}  
#error{color:red;}
#success{color:green;}
  </style>
</head>
<body>
<?php
 session_start();
echo"<center><h1> Here is your Student ID  ". $_SESSION['idutente']."</h1></center>";
$idutente=$_SESSION['idutente'];
$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";
$tab_nome="corsi";
    $mysqli = new mysqli('localhost','myelearn_asim','asim140897','myelearn_dbelearning');
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    }
 
	$nomecorso = "";
	$descrizione = "";
	$datacreazione="";

	



if (isset($_POST['save'])) {	
   
	$nomecorso=$_POST["nomecorso"];
	$descrizione=$_POST["descrizione"];
	//$datacreazione="Select CURDATE()";
	$contenuto=$_POST["contenuto"];
	



$sql="INSERT INTO $tab_nome(nomecorso,descrizione,datacreazione,iddocente,contenuto)";
$sql.="VALUES ('$nomecorso','$descrizione',NOW(),'$idutente','$contenuto')";  
if ($mysqli->query($sql) === TRUE) {

	header("Location: createcourse.php?success=Course created successfully!!! <a class='a2' href='tcourses.php'>View Course</a>");
} else {
    header("Location: createcourse.php?error=Error:Unable to create a course");
}
}
$mysqli->close();

?>
</body>
</html>


