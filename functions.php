<?php
require 'dbconfig.php';
function insertAdress($adress, $lat, $longit){
	$query = "INSERT INTO Adress (adress, lat, longit) VALUES ('$adress', '$lat', '$longit')";
}
function checkuser($fuid,$ffname,$femail){
    	$check = mysql_query("select * from Users where Fuid='$fuid'");
	$check = mysql_num_rows($check);
	if (empty($check)) { // if new user . Insert a new record		
	$query = "INSERT INTO Users (Fuid,Ffname,Femail) VALUES ('$fuid','$ffname','$femail')";
	mysql_query($query);	
	} else {   // If Returned user . update the user record		
	$query = "UPDATE Users SET Ffname='$ffname', Femail='$femail' where Fuid='$fuid'";
	mysql_query($query);
	}

}

	$sql = "SELECT * FROM adress  limit 10";

    unset($_GET['quantidade']);
    }
      
      
      
		    $query = $link->query($sql);
		    $dados = $query->fetch_array();
			    if($query->num_rows > 0)
			    	while($row = $query->fetch_assoc()) {
        $result .="<tr><td style='display:none'>".$row["id"]."</td><td>" . $row["codigo"]. " </td><td>" . $row["descricao"]. "</td><td> " . $row["preco"]. "</td><td>"
        .$row["qtd_estoque"]."</td> <td id='colunaEditar'> <a href='editarProduto.php?id=".$row["id"]."'>Editar</a></td>
        <td id='colunaExcluir'> <a href='excluir.php?id=".$row["id"]."'>Excluir</a></td></tr>";
    }
			
		$result .= "</tbody>   </table>";
     echo $result;

}?>
