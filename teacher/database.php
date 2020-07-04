<!DOCTYPE html>
<html>
<head>
	<title>db</title>
<style type="text/css">
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

/* selected link */
.a1:active {
    color: black;
}	

</style>

</head>
<body>
<?php

function connect_db(){
	$connection =mysqli_connect("localhost", "myelearn_asim", "asim140897", "myelearn_dbelearning");
		if(mysqli_connect_errno()){
			die(mysqli_connect_error());
		}
		return $connection; 
}

function save_file_info_in_db(){
	$connection = connect_db();
	$upload_directory = get_file_path();
	$filename= basename($upload_directory);
	session_start();
	$idcorso=$_SESSION['idcorso'];
	echo "<script> console.log('".$_SESSION['idcorso']."');</script>";
	$sql = "INSERT INTO `files`(`filename`,`location`,`idcorso`) VALUES(?,?,$idcorso)";
	$stmt=mysqli_prepare($connection,$sql);
	if($stmt){

		mysqli_stmt_bind_param($stmt, 'ss',$filename,$upload_directory);
		$saved=mysqli_stmt_execute($stmt);
		if($saved){
			header("Location: index.php?success=File uploaded!!!"."&idcorso=".$_SESSION['idcorso']);
		}
		else{
			 if(file_exists($upload_directory)){
			 	//if not saved in db then delete the file 
			 	unlink($upload_directory);
			 }
			 header("Location: index.php?error=Error:Unabale to store info in db");
			 
			}
		}
}

function get_files(){
	session_start();
    $idcorso=$_SESSION["idcorso"];
	$connection = connect_db();
	$sql="SELECT * FROM `files` WHERE idcorso='$idcorso'";
	$result= mysqli_query($connection, $sql);
	if(mysqli_num_rows($result) > 0){
		echo "<table border=1 ><tr>   <th> Attachments </th>
                               <th> Download </th>
         					   <th> Delete </th>
                               </tr>";
                               echo"<div class='frame'>";
		while($data= mysqli_fetch_assoc($result)){
			
			//echo "<li><a href='upload/"."$data['location']"."' target="_blank">".'$data["filename"]'."</a></li>";
		
        echo "<tr><td><strong><a class='a1' href='".$data["location"]."'>".$data["filename"]."</a></strong></td>";
        
		//echo"<img src='".$data["location"]."' alt=''>";
		echo"<td><a class='a1' href='download.php?filename=".$data["filename"]."'><strong>Download</strong></a></td>";
		echo"<td><a class='a1' href='delete.php?filename=".$data["filename"]."'><strong>Delete</strong></a></td></tr>";
        /*echo"&nbsp;"; echo"&nbsp;"; echo"&nbsp;";
	    echo"<a href='view.php?filename=".$data["filename"]."'>View</a>";
			*/
			
		} echo"</div>";


	}

}
?>

</body>
</html>

