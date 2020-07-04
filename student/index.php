<!DOCTYPE html>
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
	</style>
</head>
<body>
	<center>
	<h1>Attachments </h1> </br></center>
	<h2><p align="left" class="sinistro"><a class="a1" href="studloginok.php">Back</a> </p></h2>
	
 <div id="file-wrapper">
	<?php
	
	
    $idcorso=$_GET["idcorso"];
    echo $idcorso;
	$mysqli = new mysqli('localhost','myelearn_asim','asim140897','myelearn_dbelearning');
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    }
	$sql="SELECT * FROM `files` WHERE idcorso=$idcorso";
	$result= mysqli_query($sql);
	if(mysqli_num_rows($result) > 0){
		echo "<table border=1 ><tr><th> Attachments </th>
                               <th> Download </th></tr>";
                               echo"<div class='frame'>";
		while($data= mysqli_fetch_assoc($result)){
			
			echo "<tr><td><strong><a href='".$data["location"]."'>".$data["filename"]."</a></strong></td>";
        	echo"<td><a href='download.php?filename=".$data["filename"]."'><strong>Download</strong></a></td>";
		
       } echo"</div>";


	}
     ?>	
	</div>
	
</body>
</html>