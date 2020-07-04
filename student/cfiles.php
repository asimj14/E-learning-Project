<html>
<head>
  <link rel="stylesheet" type="text/css" href="css/style.css"> 
  <title>Course Attachments</title>
  <style type="text/css">
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
form{background-color: rgba(0,56,96,0.52);color: white;}
table:hover {
  box-shadow: 0px 0px 40px 16px white;
  }
  #error,#success{text-align:center;margin-top: 50px; background-color: white}  
  #error{color:red;}
  #success{color:green;}
  #img-wrapper{margin-top:50px}
  .frame{width:100px;height:60px;display:inline-block;}
  .frame > img{width:100%;height:100%;}
  h3{
    color: white;
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
  </style>
</head>
<h1>Attachments</h1>
<body>  

  <?php 
session_start();
  
echo"<h2><p align='left' class='sinistro'><a class='a' href='/elearning/logsign/student/contenuti.php?idcorso=" .$_SESSION['idcorso']."'>Back</a></p></h2>";

    ?>
  

<div id="file-wrapper"> 
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
    $idcorso=$_GET["idcorso"];
    $sql = " SELECT * FROM `files` WHERE idcorso='$idcorso' ";
    $result = $mysqli->query($sql);

   if ($result->num_rows > 0) {
    echo "<table border=1 ><tr><th>Attachments</th>
                             <th>Download</th></tr>";
                             echo"<div class='frame'>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $loc="../teacher/".$row["location"];

        echo "<tr><td><strong><a class='a1' href='".$loc."'>".$row["filename"]."</a></strong></td>";
        echo"<td><a class='a1' href='download.php?filename=".$row["filename"]."'><strong>Download</strong></a></td>";
    }
    echo"</div>";
    echo "</table>";
    echo "</div>";
} else {

    echo "<br><br><br><br>";
    echo "<center><h3>This course doesn't have any attachments</h3></center>";
}
$mysqli->close();

?>
</body>
</html>