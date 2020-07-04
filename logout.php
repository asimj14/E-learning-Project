<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="css/style.css"> </head>
<style>
</style>
	<title></title>
</head>
<body>
<div class="due" style="background-color:rgb(26, 177, 136,0.9);">
			
			<div style="width: 50%; height:50%; text-align: center; margin: 5% 25%; padding: 2%; ">
				
           <p style="font-size: 24px"><strong style="font-size: 36px"></strong><br></p>
 <?php
session_start();
// elimina le variabili di sessione impostate
$_SESSION = array();
// elimina la sessione
session_destroy();
echo"<center>";
echo "<h1>You have successfully logout, goodbye!!</h1>";
echo"</center>";
?>
<?php
echo"<center>";
echo "<h2><a href=\"http://myelearning.x10.bz/elearning-home/\">&#8594;Login again</h2></a><br>";
echo "<h2><a href=\"http://myelearning.x10.bz/\">&#8594;Back to HomePage</h2></a>";
echo"</center>";
?>
						
			</div>		
			</div>
</body>
</html>>

