<?php
include("createFisicalEntities.php");
/**
* Clase para obtener los nombre de tablas y campos de estas
*En base el nombre de la tabla, se general la clase, en base a los campos, los atributos.
*/
class rmEntities
{
	private  $db;
	private  $conexion;
	function __construct($db,$conexion)
	{
		$this->db = $db;
		$this->conexion = $conexion; 
		$this->createEntities();
	}

/*HACER DIRECTORIO DE ENTIDADES
  LISTAR TABLAS
  LISTAS ATRIBUTOS POR TABLA
  CREAR ENTIDAD POR TABLA
**/



	private function createEntities(){
			$this->createMkdir();
			$this->showEntitiesFDB();			
	}




	private function showEntitiesFDB()
	{
		mysql_select_db($this->db,$this->conexion) or die(mysql_error());
		$sql = "SHOW FULL TABLES WHERE Table_Type != 'VIEW' " ;
		$resultado = mysql_query($sql);

		if (!$resultado) {
    			echo "Error de BD, no se pudieron listar las tablas\n";
    			echo 'Error MySQL: ' . mysql_error();
    			exit;
		}

		while ($fila = mysql_fetch_row($resultado)) {
    	//	echo "Tablas exportadas: {$fila[0]}  ............ OK\n";
    		$this->getFields($fila[0]);
		}
	}


	private function getFields($tableName)
	{
		$cfe = new createFisicalEntities($tableName);
		 $arrayField = array();
		if ( strpos ( $tableName," " )) {
			echo "El nombre de la tabla ". $tableName." contiene espacios en blanco, esto impide que sea exportada!\n Verifique la cadena del nombre.";
			
		}
		$resultado = mysql_query("SHOW COLUMNS FROM ".$tableName);
		if (!$resultado) {
    			echo 'No se pudo ejecutar la consulta: ' . mysql_error();

    	exit;
		}
		if (mysql_num_rows($resultado) > 0) {
    			while ($fila = mysql_fetch_assoc($resultado)) {
        		
        			array_push ( $arrayField , $fila["Field"] );

        			
    			}
    			$cfe->createAtt($arrayField);
		}
	}

	private function createMkdir()

	{

			echo "Creando directorios raiz..\n";
			if(!mkdir("./rmEntities", 0777, false)) {
    			die('Fallo al crear las carpetas o estas ya existen...');
    		
    		}
    		elseif (!mkdir("./rmNeg", 0777, false)) {
    			die('Fallo al crear las carpetas o estas ya existen...');
    			
    		}
    		elseif (!mkdir("./rmDat", 0777, false)) {
    			die('Fallo al crear las carpetas o estas ya existen...');
    			
    		}
    		echo "Estructura............. OK!\n";

	}



}

?>