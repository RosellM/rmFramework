<?php
 class  alumnos 
{ 

public $Nombre;
public function setNOMBRE($Nombre){$this->Nombre = $Nombre }

public function getNOMBRE(){return $this->Nombre }


public $Apellido_paterno;
public function setAPELLIDO_PATERNO($Apellido_paterno){$this->Apellido_paterno = $Apellido_paterno }

public function getAPELLIDO_PATERNO(){return $this->Apellido_paterno }


public $Apellido_materno;
public function setAPELLIDO_MATERNO($Apellido_materno){$this->Apellido_materno = $Apellido_materno }

public function getAPELLIDO_MATERNO(){return $this->Apellido_materno }


public $Matricula;
public function setMATRICULA($Matricula){$this->Matricula = $Matricula }

public function getMATRICULA(){return $this->Matricula }


public $Especialidad;
public function setESPECIALIDAD($Especialidad){$this->Especialidad = $Especialidad }

public function getESPECIALIDAD(){return $this->Especialidad }


public $id_tutor;
public function setID_TUTOR($id_tutor){$this->id_tutor = $id_tutor }

public function getID_TUTOR(){return $this->id_tutor }


 
function __construct($Nombre,$Apellido_paterno,$Apellido_materno,$Matricula,$Especialidad,$id_tutor,)
{
 $this->Nombre = $Nombre;
$this->Apellido_paterno = $Apellido_paterno;
$this->Apellido_materno = $Apellido_materno;
$this->Matricula = $Matricula;
$this->Especialidad = $Especialidad;
$this->id_tutor = $id_tutor;
}
 }

?>