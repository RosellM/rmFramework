<?php
include("Entities.php");
/**
*Clase que para configurar las conexion a la base de datos.
*
*/
class configData
{

private  $user="root";
private  $pass=""; 
private  $db="upch";
private  $direccion="localhost:3306";
private  $conexion;

	function __construct()
	{
		
	}

	public function connectDB(){

 		$this->conexion = (mysql_connect($this->direccion,$this->user,$this->pass)) or die(mysql_error());
     	mysql_select_db($this->db,$this->conexion) or die(mysql_error());
     	$this->createEntities($this->db,$this->conexion);
	}


	private function createEntities($db,$conexion){
     		
     		$rnt = new Entities($db,$conexion);

	}




}


?>