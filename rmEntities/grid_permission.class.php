<?php
 class  grid_permission 
{ 

public $permission_type;
public function setpermission_type($permission_type){$this->permission_type = $permission_type }

public function getpermission_type(){return $this->permission_type }


public $id_group;
public function setid_group($id_group){$this->id_group = $id_group }

public function getid_group(){return $this->id_group }


public $id_table;
public function setid_table($id_table){$this->id_table = $id_table }

public function getid_table(){return $this->id_table }


 
function __construct($permission_type,$id_group,$id_table,)
{
 $this->permission_type = $permission_type;
$this->id_group = $id_group;
$this->id_table = $id_table;
}
 }

?>