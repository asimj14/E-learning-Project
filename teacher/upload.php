<?php
if(isset($_POST["button"])){
	include('functions.php');
	include('database.php');
	$uploaded= upload_file_in_directory();
    if($uploaded){
    	//database stuff
    	save_file_info_in_db();//storing the file its name and url
      }else{
      	 header("Location: index.php?error=Error:Unable to upload file in directory");

      }
	
}else{
        header("Location: index.php?error=Error:Please upload the file ");
}

?>