<?php


/**
* Clase para generar las plantillas de las entidades
*Directorio de las entidades rmEntities/*
*/
class createFisicalEntities
{
	private $creado = FALSE;
	private $ClassName;
	private $auxC = '$this->';
	private $ClassParam = array();
	private $Atttr = "";
	private $__constructClass;
	function __construct($ClassName)
	{
		
		$this->ClassName = $ClassName;

	}
/*
CREAR ARCHIVO POR CADA CLASE
	Crear Attr por cada clase
	Agregar Atrr.
*/
	public function createAtt($fieldsArray)
	{
		echo $this->ClassName;
		foreach ($fieldsArray as $key) {
			$this->createClassFile($key);
		}
		$file = fopen("rmEntities/".$this->ClassName.".php","a+");

		foreach ($this->ClassParam as $key) {
			///
			$aux = $key;
			$this->Atttr = $this->Atttr."$".$key.",";
			$this->__constructClass = $this->__constructClass.$this->auxC.$aux." = $".$aux.";\n";
		}

		fputs($file,"\n \nfunction __construct(".$this->Atttr.")\n{\n ".$this->__constructClass."}\n }");
		
		fputs($file,"\n\n?>");
	}

	public function createClassFile($Attttr)
	{
		if($this->creado == FALSE){

			$miarchivo=fopen("rmEntities/".$this->ClassName.'.php','w');//abrir archivo, nombre archivo, modo apertura
			echo "##Tu archivo se ha guardado con el nombre \"$this->ClassName.php\" \n";
			$file = fopen("rmEntities/".$this->ClassName.".php","w");
			fputs($file,"<?php\n class  ".$this->ClassName." \n{ \n");
			fclose($miarchivo); //cerrar archivo
			$this->creado = TRUE;
		}
		else
		{
			echo $Attttr."\n";
			array_push ( $this->ClassParam , $Attttr );
			$file = fopen("rmEntities/".$this->ClassName.".php","a+");
			fputs($file,"\npublic $".$Attttr.";");

			fputs($file,"\npublic function set". strtoupper( $Attttr )."($".$Attttr."){".$this->auxC."".$Attttr." = $".$Attttr." }\n");
			fputs($file,"\npublic function get". strtoupper( $Attttr )."(){return ".$this->auxC."".$Attttr." }\n\n");

 			fclose($file);
		}
		

	}
}
?>