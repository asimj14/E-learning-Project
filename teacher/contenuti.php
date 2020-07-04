<html>
<head><link rel="stylesheet" type="text/css" href="css/style.css"> 
<style>
table {
  padding: 40px;
  width: 100%;
  margin: 40px auto;
  border:none;
  box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
  transition: .5 ease;
  background-color: rgba(0,56,96,0.52);
}
td{
    border: none;
    text-align: left;
    padding: 8px;
}
th{
    border: none;
    text-align: center;
    padding: 10px;
}

table:hover {
  box-shadow: 0px 0px 40px 16px black;
  }
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


.sinistro{float:left;}
.destro{float:right;} 
</style>

</head>
<body>
<h2>
<p class="sinistro" align="left"><a class="a" href="/elearning/logsign/teacher/tcourses.php">Back</a></p>
<p class="destro" align="right"><a class="a1" href="/elearning/logsign/logout.php">Logout</a> </p>
</h2>


<?php

include('../dbconnect.php');

$mysqli = new mysqli($host,$username,$pass,$db_nome);
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
  }

$idcorso=$_GET["idcorso"];
session_start();
$_SESSION['idcorso'] = $idcorso;

$sql=" Select * from corsi WHERE idcorso='$idcorso'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  echo"<center>";
    echo "<table>";
    while($row = $result->fetch_assoc()) {

                 
        echo "<tr>

                  <th>".$row["nomecorso"]." </th></tr>
                  <tr><td>".$row["contenuto"]."</td></tr>
                  <tr><td>". "<a class='a1' href='index.php?idcorso=" .$row['idcorso']. "'>"."<center>View attachments</center></a>" ."</td></tr>";
                $nomecorso=$row["nomecorso"];

    }
    echo "</table>";
    echo"</center>";
} else {
    echo "0 results";
}
//echo<input class="MyButton" type="button" value="View attachments" onclick="window.location.href='index.php?idcorso=$idcorso'"/>
?>







</body>
</html>