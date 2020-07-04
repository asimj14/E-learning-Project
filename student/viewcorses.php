<html>
<head><link rel="stylesheet" type="text/css" href="css/style.css"> 
<style>
table {
  padding: 40px;
  max-width: 600px;
  margin: 40px auto;
  border:none;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  transition: .5 ease;
  background-color: rgba(0,56,96,0.52);
  color:white;
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
.a2:link{
  color:white;
}
.a2:hover{
  color:#1ab189;
}

</style>

</head>
<body>
<center>

<h1>Other Courses </h1> </center>
<h2>
<p class="sinistro" align="left"><a class="a1" href="/elearning/logsign/student/studloginok.php">Back</a></p>
<p class="destro" align="right"><a  class="a2" href="../logout.php">Logout</a> </p>
</h2>

<?php
$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";
$tab_nome="corsi";
    $mysqli = new mysqli('localhost','myelearn_asim','asim140897','myelearn_dbelearning');
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    }

session_start();

$idutente=$_SESSION['idutente'];
$sql="(Select corsi.idcorso,corsi.nomecorso,corsi.descrizione,corsi.datacreazione FROM corsi where idcorso != ALL( Select  corsi.idcorso FROM iscrizione,corsi WHERE
corsi.idcorso=iscrizione.idcorso AND iscrizione.idutente=$idutente))";
$result = $mysqli->query($sql);

   if ($result->num_rows > 0) {
    echo "<table border=1 ><tr><th>Course Name</th>
                               <th> Description </th>
                               <th> Starting date</th>
                               <th> Enrol for courses</th>
                               </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["nomecorso"]." </td>
                  <td>".$row["descrizione"]."</td>
                  <td>".$row["datacreazione"]."</td>
                  <td>". "<a class='a2' href='enrol.php?idcorso=" .$row['idcorso']. "'>"."Enrol in this course</a>" ."</td></tr>";
                  
                 
    }
    echo "</table>";
} else {
    echo "<center><h1>You have already enrolled in all courses</h1></center>";
    
}
$mysqli->close();

?>
</body>
</html>

