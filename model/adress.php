<?php

class Produto
{

	
	private $id;
	private $adress;
	private $lat;
	private $longit;

	public function get_adress() { return $this->adress; }
	public function get_lat() { return $this->lat; }
	public function get_longit() { return $this->longit; }
	
	public function set_adress($valor) { $this->adress = $valor; }
	public function set_lat($valor) { $this->lat = $valor; }
	public function set_longit($valor) { $this->longit = $valor; }

	public function inserir()
	{
		require_once __DIR__.'/../banco/banco.php';

		if($_POST)
		{
			$this->codigo = $_POST['adress'];
			$this->descricao = $_POST['lat'];
			$this->preco = $_POST['longit'];
		}

	 	$sql = "INSERT INTO adress(adress,lat,longit) VALUES ('".$this->adress."','".$this->lat."','".$this->longit."')";
  		
		$query = $link->query($sql);


		
		if ($_POST)
		{
			header("Location:indexTeste.php");
		}

	}

	public function excluir($id)
	{
		$servidor = "localhost";
		$usuario = "root";
		$senha = "";
		$banco = "mashup";
	 	$link = mysqli_connect($servidor, $usuario, $senha, $banco) or die(mysql_error());
	
		if($_POST)
		{
		
			$this->id = $id;
		}

		$sql = "DELETE FROM adress WHERE id ='".$this->id."'";
		$query = $link->query($sql);
		
		if ($_POST)
		{
		
			header("Location:indexTeste.php");
		}


	}

	
}

?>