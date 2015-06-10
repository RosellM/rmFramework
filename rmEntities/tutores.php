<?php
 class  tutores 
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


public $Cuerpo_academico;
public function setCUERPO_ACADEMICO($Cuerpo_academico){$this->Cuerpo_academico = $Cuerpo_academico }

public function getCUERPO_ACADEMICO(){return $this->Cuerpo_academico }


 
function __construct($Nombre,$Apellido_paterno,$Apellido_materno,$Cuerpo_academico,)
{
 $this->Nombre = $Nombre;
$this->Apellido_paterno = $Apellido_paterno;
$this->Apellido_materno = $Apellido_materno;
$this->Cuerpo_academico = $Cuerpo_academico;
}
 }

?>