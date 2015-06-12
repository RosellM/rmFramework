<?php
include("configDataFr.php");
include("Data.php");
/**
* 
*/
class rmAccess extends Data
{
	
	function __construct()
	{
		parent::__construct(configDataFr::$user,configDataFr::$pass,configDataFr::$db,configDataFr::$server); 
		
	}

	public function addEntity($entity)
	{
		$ArraySQL = array();
		$ArraySQLValues = array();
		$tableName =  get_class($entity);
		$columnNames = "";
		$values = "";
		$attClassName = get_object_vars($entity);
		foreach ($attClassName as $attrName => $AttrValue) {
    		echo "$attrName : $AttrValue\n";		
			array_push ( $ArraySQL , $attrName );
			array_push ( $ArraySQLValues , $AttrValue );
		}
	echo $tableName."\n";	
	
	$connection = parent::connectDB() ;
	
	$columnNames =  implode(",",$ArraySQL)."\n";
	$values =  "'".implode("','",$ArraySQLValues)."'";
	$INSERT_COMPLETE = "INSERT INTO ".$tableName." (".$columnNames.") VALUES (".$values.")";
	echo $INSERT_COMPLETE;
	$retval  = 	 mysql_query( $INSERT_COMPLETE, $connection);
		if(! $retval ){
  				die('Could not enter data: ' . mysql_error());
		}
		
		echo "Entered data successfully\n";
    	mysql_close( $connection );	
	}
	
	public function deleteEntity($identifier,$tableName)
	{
		/**
		 * $sql = 'DELETE FROM tutorials_tbl
       		/**WHERE tutorial_id=3';
		 */
		 
		 $connection = parent::connectDB() ;
		 
		 $sql = "DELETE FROM ".$tableName." WHERE id = ".$identifier;
		 echo $sql;
		 $retval = mysql_query( $sql, $connection );
	     if(! $retval ){
  				die('Could not deleted data: ' . mysql_error());
		 }
		echo "deleted data successfully\n";
		mysql_close( $connection ); 
		 
	}
	/*option = 0, si es para guardar, option = 1 para actualizar*/
	public function saveOrUpdate($entity,$option,$id)
	{
		switch ($option) {
			case '1':
				$this->addEntity($entity);
				break;
			case '2':
				$this->updateEntity($entity, $id);		
			break;
			default:
				echo "Could not execute this option..";
				break;
		}
	}
	
	public function updateEntity($entity,$id)
	{
		$connection = parent::connectDB() ;
		$aux = 0;
		$valuesToUpdate=" ";
		$tableName =  get_class($entity);
		 $attClassName = get_object_vars($entity);
		foreach ($attClassName as $attrName => $AttrValue) {
    		echo "$attrName : $AttrValue\n";		
			
			if ($aux ==sizeof( $attClassName ) -1 ) {
					$valuesToUpdate = $valuesToUpdate.$attrName." = ' ".$AttrValue."' ";
			}
			else{
					$valuesToUpdate = $valuesToUpdate.$attrName." = ' ".$AttrValue."', ";
			}
			$aux ++ ;
		}
		 $sql = "UPDATE ".$tableName." SET ".$valuesToUpdate." WHERE id = ".$id;
		 echo $sql;
		 $retval = mysql_query( $sql, $connection   );
	     if(! $retval ){
  				die('Could not update data: ' . mysql_error());
		 }
		echo "updated data successfully\n";
		mysql_close( $connection ); 
		
	 }
}


?>