<?php
 class  grid_tables 
{ 

public $table;
public function settable($table){$this->table = $table }

public function gettable(){return $this->table }


public $description;
public function setdescription($description){$this->description = $description }

public function getdescription(){return $this->description }


 
function __construct($table,$description,)
{
 $this->table = $table;
$this->description = $description;
}
 }

?>