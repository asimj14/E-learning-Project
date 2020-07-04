<?php

$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";

    $mysqli = new mysqli('localhost','myelearn_asim','asim140897','myelearn_dbelearning');
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);

    }
 ?>   
 