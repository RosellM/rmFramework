
<?php
/*
*Archivo para recibir los comandos de entrada.
*
*/
include ("rmFr/viewsTemplate.php");
include("configData.php");
if(count($argv)>2){
echo "Error en la entrada,\n comando requerido CREATE";
return;
}

switch ($argv[1]) {
	case 'CREATE':
		$db = new configData();
		echo $argv[1];
	
		echo "OBTENIENDO DATOS...\n";
		$db->connectDB();
		echo "Conexion .......... OK!\n";
		break;
	
	case 'CREATE-TEMPORAL-VIEWS':
		echo $argv[1];
		echo "CONEXION SELECCIONADA .......... OK!\n";
		$v = new viewsTemplate();
		echo "CREANDO VISTAS TEMPORALES...OK \n";
		break;
	default:
		echo "Error en la entrada,\n comandos aceptados 'CREATE, CREATE TEMPORAL VIEWS' ";
		return;
		break;
}

/**
if ($argv[1] != "CREATE") {
	
	if($argv[1]  == "CREATE-TEMPORAL-VIEWS")
	{
		echo "OBTENIENDO DATOS...OK \n";
		$db->connectDB();
		echo "CONEXION SELECCIONADA .......... OK!\n";
		$v = new viewsTemplate();
		echo "CREANDO VISTAS TEMPORALES...OK \n";
	}
	else
	{
		echo "Error en la entrada,\n comandos aceptados 'CREATE, CREATE TEMPORAL VIEWS' ";
		return;
	}
	
}else {
	echo "OBTENIENDO DATOS...\n";
	$db->connectDB();
	echo "Conexion .......... OK!\n";
	
	
} **/


?>