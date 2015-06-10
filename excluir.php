<?php
	$link = mysqli_connect("localhost", "root", "root", "mashup");
 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$id = $_GET['id'];
	
	$sql = "DELETE FROM localidade where id = $id";
    $query = $link->query($sql);
    // Close connection
	mysqli_close($link);	
    header("Location:index.php");
?>