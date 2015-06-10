<?php
include("configDataFr.php");
include("Data.php");
 
 /**
  * Clase para genera vistas dinámicas
  */
 class viewsTemplate  extends  Data{
     	
     public $viewName = "";
	 
     function __construct() {
         $this->createMkdr();
		 parent::__construct(configDataFr::$user,configDataFr::$pass,configDataFr::$db,configDataFr::$server); 
		 parent::connectDB();
		 $this->getTableName();
		 
     }
	 /**
	  * 
	  * obtener nombre de la tabla
	  * obtener campos de la tabla
	  * crear vistas php por casa tabla y controler por casa atributo en frAplicatioms/Views/
	  * 
	  */
	  
	 public function getTableName()
	 {
		
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
	 
	 public function getFields($tableName)
	 {
		 $this->viewName = $tableName;
		 $this->createView($tableName);
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
    			$this->createControls($arrayField);
		}
		 
	 }
	 	  
	 public function createMkdr()
	 {
	 	
		echo "Creando directorios raiz..\n";
			if(!mkdir("./rmAplication", 0777, false)) {
    			die('Fallo al crear las carpetas o estas ya existen...');
    			
    		}
			elseif(!mkdir("./rmAplication/models", 0777, false)) {
    			die('Fallo al crear las carpetas o estas ya existen...');
    			
    		}
			elseif(!mkdir("./rmAplication/Views", 0777, false)) {
    			die('Fallo al crear las carpetas o estas ya existen...');
    			
    		}
			elseif(!mkdir("./rmAplication/Controllers", 0777, false)) {
    			die('Fallo al crear las carpetas o estas ya existen...');
    			
    		}
		 
	 }
	 
	 
	 public function createView($name)
	 {
		 /*creo archivo*/
		 $miarchivo=fopen("rmAplication/Views/".$name.'.php','w');//abrir archivo, nombre archivo, modo apertura
			echo "##Tu archivo se ha guardado con el nombre \"$name.php\" \n";
			
			fclose($miarchivo); //cerrar archivo
	 }
	 
	 public function createControls($names)
	 {
		 /*agrego controles*/
		  $file=fopen("rmAplication/Views/".$this->viewName.'.php','a+');//abrir archivo, nombre archivo, modo apertura
		   fputs($file,"<!DOCTYPE html>\n");
		      fputs($file,"<html>\n");
			 fputs($file,"<head></head>\n");
			  fputs($file,"<title>".$this->viewName."</title>\n");
			   fputs($file,"<body><center>\n");
			    fputs($file,"<!-- You can modify this template.\nThis template is designed for temporary use. -->\n");
		 foreach ($names as $key) {
			 fputs($file,"<input type='text' name= '".$key." ' id='".$key."' placeholder='".$key."'></br>\n");
			 
		 }
	   fputs($file,"</center></body>\n");
 	     fputs($file,"<html>\n");
		 fclose($file); //cerrar archivo
	 }
 }
 
 
 
?>