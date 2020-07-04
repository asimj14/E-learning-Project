<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/style.css"> </head>
	<title>Reset Password</title>
</head>
<body>
	<div class="due" style="background-color:rgb(26, 177, 136,0.9);">
			
			<div style="width: 50%; height:50%; text-align: center; margin: 5% 25%; padding: 2%; ">
				
           <p style="font-size: 24px"><strong style="font-size: 36px"></strong><br></p>
<?php
if(isset($_GET["email"]) && isset($_GET["token"])){
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";

$connection= new mysqli($host,$username,$pass,$db_nome);
 //check connection
 if($conn->connect_error){
 	 echo"<center>";
	 die("<h1>Connection failed ; ".$connect_error."</h1>");
	 echo"<center>";
 }
 
 $email = $connection->real_escape_string($_GET["email"]);
 $token = $connection->real_escape_string($_GET["token"]);
 $data = $connection->query("SELECT idutente FROM utenti WHERE email='$email'AND token='$token'");
 if($data->num_rows > 0)
 {

         $str ="0123456789qwertzuioplkjhghbffmjkfdmjndjnfjmk";

 		$str = str_shuffle($str);
 		$str = substr($str, 0, 15);
        $password = md5($str);
        $connection->query("UPDATE utenti SET password= '$password', token='' WHERE email='$email'");
        echo"<center>";
        echo " <h1>Your new password is: $str </h1>";

	echo "<h2><a href=\"http://myelearning.x10.bz/elearning-home/\">&#8594;Login again</h2></a><br>";
	echo "<h2><a href=\"http://myelearning.x10.bz/\">&#8594;Back to HomePage</h2></a>";

        echo"</center>";

  }
  else{
  	echo"<center>";
  	echo("<h1>Please check your link!</h1>");
  	echo"</center>";
  }
}
else{
	header("Location: index.html");
}
?>
</body>
</html>


