<?php
$dbh = new PDO("mysql:host=localhost;dbname=mydata","root","");
$idmateriale = isset($_GET['id'])? $_GET['id'] : "";
$stat = $dbh->prepare("select * from files where id=?");
$stat->bindParam(1,$id);
$stat->execute();
$row = $stat->fetch();
header("Content-Type:".$row['location']);
echo $row['filename'];
//echo '<img src="data:image/jpeg;base64,'.base64_encode($row['data']).'"/>';