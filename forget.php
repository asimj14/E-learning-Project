<?php
if(isset($_POST["forgotPass"])){
$host = "localhost";
$username="myelearn_asim";
$pass="asim140897";
$db_nome="myelearn_dbelearning";

//Create connection_aborted
 $connection= new mysqli($host,$username,$pass,$db_nome);
 
 $email = $connection->real_escape_string($_POST["email"]);
 $data = $connection->query("SELECT idutente FROM utenti WHERE email='$email'");
 if($data->num_rows > 0)
 {
 		$str ="0123456789qwertzuioplkjhghbffmjkfdmjndjnfjmk";
 		$str = str_shuffle($str);
 		$str = substr($str, 0, 10);
 		//echo $str;
 		$url = "http://myelearning.x10.bz/elearning/logsign/resetPassword.php?token=".$str."&email=".$email;


 		mail($email, "Reset Password", "To reset your password,please visit this: $url", "From: myelearn@myelearning.x10.bz\r\n");
 		$connection->query("UPDATE utenti SET token='$str' WHERE email='$email'");

 		echo "<center><strong><h3>Please check your email</center></strong></h3>";
}
 else{
 		echo "<center><strong><h3>Please check your inputs!</center></strong></h3>";
  }

}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>

</head>
<style>
body{
	 background-image: url(10.jpg); 
}
h3{
	color: white;
	background-color: black;
}
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #1ab188;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: black;
    color: white;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
div:hover {
  box-shadow: 0px 0px 40px 16px black;
  }
</style>
<body>
<div>
<form action="forget.php" method="post">

	<label for="email"><center><h4>Enter your email to reset your password</h4></center></label>
    <input type="text" name="email" placeholder="Email"><br>
 	<input type="submit" name="forgotPass" value="Request Password">	

</form>
</div>
</body>
</html>





