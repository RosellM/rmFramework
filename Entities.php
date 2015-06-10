<?php
include("rmEntities.php");
/**
* Clase para enviar la conexionn y la base datos.
*/
class Entities
{

	private  $db;
	private  $conexion;
	function __construct($db,$conexion)
	{
	
		$this->db = $db;
		$this->conexion = $conexion;
		$this->toCreateEntities();
	}

	private function toCreateEntities()
	{

			 $rtn = new rmEntities($this->db,$this->conexion);

	}




}


?>