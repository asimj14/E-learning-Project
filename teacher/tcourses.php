
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
h2 {
  text-align: center;
  color: white;
  font-weight: 300;
  margin: 0 0 40px;
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
#error,#success{text-align:center;margin-top: 50px; background-color: white}  
  #error{color:red;}
  #success{color:green;}
</style>

</head>

<body>
<center>

<h1>My courses </h1> </br></center>
<h2>
<p align="left" class="sinistro"><a class="a" href="/elearning/logsign/teacher/docloginok.php">Back</a> </p>
<p align="right" class="destro"><a class="a1" href="/elearning/logsign/logout.php">Logout</a> </h2></p><br><br>
<div id="error">
    <?php
    $idcorso=$_GET["idcorso"];
    session_start();
    $_SESSION['idcorso']= $idcorso;


    if(isset($_GET["error"])){
      echo $_GET["error"];
    }
  ?>
  </div>

  <div id="success">
  <?php
  if(isset($_GET["success"])){
    echo $_GET["success"];
  }
  ?>
  </div>
<?php
session_start();
$idu=$_SESSION['idutente'];


$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";

    $mysqli = new mysqli('localhost','myelearn_asim','asim140897','myelearn_dbelearning');
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    }
 
$sql="Select distinct idcorso,nomecorso,descrizione FROM corsi WHERE
corsi.iddocente=$idu";
$result = $mysqli->query($sql);

   if ($result->num_rows > 0) {

    echo "<table border=1 ><tr><th>Course Name</th>
                               <th>Description</th>
                               <th>Action</th>
                               </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $idcorso=$row['idcorso'];
        echo "<tr><td>". "<a class='a1' href='contenuti.php?idcorso=" .$row['idcorso']. "'>".$row["nomecorso"]."</a>" ."</td>
                  <td>".$row["descrizione"]." </td>
                  <td><a class='a1' href='deletecourse.php?idcorso=".$row["idcorso"]."'><strong>Delete</strong></a></td>
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
    echo "<br><center><h2>You don't have any course yet!!</h2></center>";
}
$mysqli->close();

?>
</body>
</html>

