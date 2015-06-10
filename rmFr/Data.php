<?php

/**
* 
*/
class Data
{
	

	public  $user;
	public  $pass; 
	public  $db;
	public  $server;

	function __construct($user,$pass,$db,$server)
	{
		$this->user  =  $user;
		$this->pass  = $pass;
		$this->db    = $db;
		$this->server= $server;
	}

	public function connectDB(){

 		$this->conexion = (mysql_connect($this->server,$this->user,$this->pass)) or die(mysql_error());
     	mysql_select_db($this->db,$this->conexion) or die(mysql_error());
     	return $this->conexion;
	
	}

}


?>