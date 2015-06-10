<?php
$link = mysqli_connect("localhost", "root", "root", "mashup");
 
	// Check connection
	if($link === false){
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}

$UID = (int)$_GET['id'];

$sql = "SELECT * FROM localidade WHERE id = '$UID'";
$query = $link->query($sql);

$result='';


echo "<form id='formularioEdicao' onsubmit='return validarEdicao();'  action='' method='POST'>";
echo "<span id='mensagemEdicao'></span><br>";
			    	if(mysqli_num_rows($query)>=1){
    while($row = mysqli_fetch_array($query)) {
					        echo "<label>Código :</label>
					        <input id='nom' name='nom'  type='text' value='".$row["nome"]."' style='display:none' >
						 	<input id='end' name='end'  type='text' value='".$row["endereco"]."' >";
					    }
						echo"<button type='submit' name='editar'>Editar</button></form>";
}
//header("Location:index.php");
?>