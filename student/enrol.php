<!DOCTYPE html>
<html>
<head><link rel="stylesheet" type="text/css" href="css/style.css">
<title>Enrol</title>
<style>
a:link {
    color: white;
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
    color: black;
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
    color: #1ab189;
}

/* selected link */
.a1:active {
    color: black;
}
table {
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border:none;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  transition: .5 ease;
  background-color: rgba(219,237,233,0.6);
}
td{
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
th{
    border: 1px solid #dddddd;
    text-align: center;
    padding: 10px;
}


table:hover {
  box-shadow: 0px 0px 40px 16px white;
  }
.sinistro{float:left;}
.destro{float:right;} 
</style><style>
table {
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border:none;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  transition: .5 ease;
  background-color: rgba(219,237,233,0.6);
}

table:hover {
  box-shadow: 0px 0px 40px 16px white;
  }
  </style>
</head>
<body>
<h2>
<p class="sinistro" align="left"><a  href="/elearning/logsign/student/viewcorses.php">Back</a></p>
<p class="destro" align="right"><a  class="a1" href="../logout.php">Logout</a> </p>
</h2>


<?php
$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";

    $mysqli = new mysqli('localhost','myelearn_asim','asim140897','myelearn_dbelearning');
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);

    }

session_start();
$idutente=$_SESSION['idutente'];


$idcorso=$_GET["idcorso"];

$sql="INSERT INTO iscrizione(`idutente`,`idcorso`) VALUES('$idutente','$idcorso')";
//$sql.="VALUES ('$idutente','$idcorso')";  
if ($mysqli->query($sql) === TRUE) {
	session_start();
  $_SESSION['msg'] = "<center><h1>Enrolled successfully</h1></center>";
    echo "<br><br><br><br><br><br><br><center><h1>Enrolled successfully</h1></center>";
    echo "<br><center><h2><a class='a1' href='/elearning/logsign/student/mycorses.php'>Go to Courses</a></h2></center>";
    //header('location: viewcorses.php');
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}


$mysqli->close();

?>
</body>
</html>


