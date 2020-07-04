<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" href="css/style.css">
	<style type="text/css">
#error,#success{text-align:center;margin-top: 50px;}  
#error{color:black;}
#success{color:white;}	
</style>
</head>
<body>
	<div class="due" style="background-color:rgb(26, 177, 136,0.9);">
			
			<div style="width: 50%; height:50%; text-align: center; margin: 5% 25%; padding: 2%; ">
				
           <p style="font-size: 24px"><strong style="font-size: 36px"></strong><br></p>
   			<div id="error">
    <?php
    if(isset($_GET["error"])){
      echo $_GET["error"];
    }
     ?>
   </div>

   <div id="success">
   <?php
   if(isset($_GET["success"])){
    echo "<h2>".$_GET["success"]."</h2>";
    echo"<center>";
	echo "<h2><a href=\"index.html\">&#8594;Login</h2></a><br>";
	echo"</center>";
  }
  ?>




       </div>
   </div>

</body>
</html>