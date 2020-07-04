
<?php
$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";
$tab_nome="utenti";
    $mysqli = new mysqli('localhost','myelearn_asim','asim140897','myelearn_dbelearning');
    if ($mysqli->connect_error) {
    die('Errore di connessione (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
	}
 
$sql=" Select * from $tab_nome ";
$result = $mysqli->query($sql);

   if ($result->num_rows > 0) {
    echo "<table border=1 ><tr><th>User ID</th>
	                           <th>Surname</th>
	                           <th>Name</th>
	                           <th>Date of birth</th>
	                           <th>CF</th>
	                            <th>User Type</th>
	                           <th>Email</th>
	                           <th>username</th>
	                           <th>Password</th>
	                           </tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["idutente"]."</td>
		          <td>".$row["cognome"]." </td>
		          <td>".$row["nome"]."</td>
		          <td>".$row["datadinascita"]."</td>
			      <td>".$row["cf"]."</td>
			      <td>".$row["tipoutente"]."</td>
			      <td>".$row["email"]."</td>
			      <td>".$row["username"]."</td>
			      <td>".$row["password"]."</td>



			      </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$mysqli->close();

?>
</body>
</html>