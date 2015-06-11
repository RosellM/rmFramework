<?php
 class  grid_users 
{ 

public $id_group;
public function setid_group($id_group){$this->id_group = $id_group }

public function getid_group(){return $this->id_group }


public $name;
public function setname($name){$this->name = $name }

public function getname(){return $this->name }


public $username;
public function setusername($username){$this->username = $username }

public function getusername(){return $this->username }


public $password;
public function setpassword($password){$this->password = $password }

public function getpassword(){return $this->password }


public $email;
public function setemail($email){$this->email = $email }

public function getemail(){return $this->email }


 
function __construct($id_group,$name,$username,$password,$email,)
{
 $this->id_group = $id_group;
$this->name = $name;
$this->username = $username;
$this->password = $password;
$this->email = $email;
}
 }

?>