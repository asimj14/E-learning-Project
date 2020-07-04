
<html>
<head><link rel="stylesheet" type="text/css" href="css/style.css"> 
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
    color: white;
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
    color: #1ab189;
}

/* selected link */
.a1:active {
    color: black;
}
.a2:link {
    color: white;
}
.a2:hover {
    color: black;
}
table {
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border:none;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  transition: .5 ease;
  background-color: rgba(0,56,96,0.52);
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
</style>

</head>

<body>
<center>

<h1> Already Registered courses </h1> </br></center>
<h2>
<p class="sinistro" align="left"><a class="a2" href="/elearning/logsign/student/studloginok.php">Back</a></p>
<p class="destro" align="right"><a  class="a1" href="../logout.php">Logout</a> </p>
</h2>
<?php
session_start();
$idutente=$_SESSION['idutente'];


$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";

    $mysqli = new mysqli('localhost','myelearn_asim','asim140897','myelearn_dbelearning');
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    }
 
$sql="Select distinct corsi.idcorso,corsi.nomecorso,corsi.descrizione FROM iscrizione,corsi WHERE
corsi.idcorso=iscrizione.idcorso AND iscrizione.idutente=$idutente";
$result = $mysqli->query($sql);

   if ($result->num_rows > 0) {
    echo "<table border=1 ><tr><th> Course Name  </th>
                               <th> Description </th>
                               </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $idcorso=$row['idcorso'];
        echo "<tr><td>". "<a class='a1' href='contenuti.php?idcorso=" .$row['idcorso']. "'>".$row["nomecorso"]."</a>" ."</td>
                  <td>".$row["descrizione"]." </td>
                </tr>";
                   session_start();
                   $_SESSION['idcorso']= $row['idcorso'];
                   session_start();
                   $_SESSION['nomecorso']= $row['nomecorso'];
                   session_start();
                   $_SESSION['descrizione'] = $row['descrizione'];
    }
    echo "</table>";
} else {
    echo "<br><br><br><br><br>";
    echo "<center><h1>You haven't enrolled in any course yet !!</h1></center>";
}
$mysqli->close();

?>
</body>
</html>

