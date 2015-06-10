<?php 

	$link = mysqli_connect("localhost", "root", "root", "mashup");
 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
	$nome = $_POST['nome'];
    $endereco = $_POST['local'];
    $latlong = $_POST['latlong'];

    $sql = "INSERT INTO localidade VALUES (0, '$nome', '$endereco', '$latlong')";
    $query = $link->query($sql);
    // Close connection
	mysqli_close($link);	
    header("Location:index.php");
     	
     
?>