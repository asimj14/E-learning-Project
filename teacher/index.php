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




	</style>
</head>
<body><center>
	<h1>View and Upload attachments </h1> </br></center>

  <?php 
session_start();
  
echo"<h2><p align='left' class='sinistro'><a class='a' href='/elearning/logsign/teacher/contenuti.php?idcorso=" .$_SESSION['idcorso']."'>Back</a></p></h2>";

    ?>

	
    <form action="upload.php" method="post" enctype="multipart/form-data">
	<fieldset> 
	<legend>Upload a file</legend>
	<input type="file" name="myfile"/>
	 <button type="submit" name="button" value="pressed">Upload</button>

    </fieldset>
	 </form>
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
	<div id="file-wrapper">
	<?php
	include('database.php');
	get_files();
     ?>	
	</div>
	
</body>
</html>