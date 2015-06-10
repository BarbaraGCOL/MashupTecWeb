<?php 
	$servidor = 'localhost';
    $usuario = 'root';
    $senha = 'root';
    $banco = 'mashup';


    $result = "  <table class='table table-striped table-advance table-hover'>
                    <h4><i class='fa fa-angle-right'></i> Localidades Cadastradas</h4>
                    <hr>
                    <thead><tr>
                        <th style='display:none'>id</th>
						<th>Localidade</th>
                        <th>Endereço</th>
                        <th>Coordenadas</th>
                        <th></th>
                        <th></th>
                    </tr></thead>
                    <tbody><tr>";

	$link = new mysqli($servidor,$usuario,$senha,$banco);
	$sql = $link -> query("select * from localidade");

	while($row = $sql -> fetch_assoc()){
        $latlong_string = str_replace('(', '', $row['latlong']);
        $latlong_string = str_replace(')', '', $latlong_string);
        $latlong_string = str_replace(' ', '', $latlong_string);

        $explode = explode(',', $latlong_string);

        $latitude = $explode[0];
        $longitude = $explode[1];

        $latitude_longitude = $row['latlong'];
        $endereco = $row['endereco'];

        $result .='<tr>
    	
        <td style="display:none">'.$row['id'].'</td><td>'.$row['nome'].'</td><td>' 
    	. $row['endereco'].'</td><td>'.$row['latlong'].'</td><td>'.'</td><td id="colunaEditar"> 
        <a onClick="preencheForm(\''.$latitude.'\',\''.$longitude.'\',\''.$endereco.'\',\''.$row['nome'].'\');">Ver</a></td>
        <td id="colunaExcluir"> <a onclick="confirmacao('.$row['id'].')">Excluir</a></td></tr>';
    }
			
	$result .= "</tbody></table>";
	
    echo $result;
		
?>