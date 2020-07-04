<?php
if(isset($_GET["filename"]) && $_GET["filename"] != ""){
	$file = "upload/".$_GET["filename"];
	header('Content-type: application/force-download');
	header('Content-disposition: attachment; filename="'.basename($file).'"');
	header('Content-length: '.filesize($file));
	readfile($file);

}
else{
	header("Location: index.php?error=Error: Invalid Filename");
}
?>