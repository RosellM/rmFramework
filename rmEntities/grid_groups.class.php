<?php
 class  grid_groups 
{ 

public $group;
public function setgroup($group){$this->group = $group }

public function getgroup(){return $this->group }


public $description;
public function setdescription($description){$this->description = $description }

public function getdescription(){return $this->description }


 
function __construct($group,$description,)
{
 $this->group = $group;
$this->description = $description;
}
 }

?>