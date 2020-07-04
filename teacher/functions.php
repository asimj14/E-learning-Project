<?php
/*this function creats a file path or location*/
function get_file_path(){
	$upload_directory = "upload/";
	$filename = $_FILES["myfile"]["name"];
	$upload_directory .=$filename;

	return $upload_directory;
}
/*this function creats a tmp path or location*/
function get_tmp_path(){
	$tmp_dir= $_FILES["myfile"]["tmp_name"];
	return $tmp_dir;
}



/*this function returns the size of the file*/
function get_file_size(){
	$size =$_FILES["myfile"]["size"];
	return $size;
}

/*this function returns the extension of the file*/
function get_file_extension(){
	$ext = pathinfo($_FILES["myfile"]["name"], PATHINFO_EXTENSION);
	return $ext;
}
/*this function returns the extension of the file*/
function upload_file_in_directory(){
$upload_directory= get_file_path();
$tmp_dir=get_tmp_path();
$ext=get_file_extension();
$uploaded = move_uploaded_file($tmp_dir, $upload_directory);
	if($uploaded){
	
	return true;

	}
   return false;
		//header("Location: index.php?error=Error:Please upload the file");
			
}


?>