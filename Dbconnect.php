<?php

class Dbconnect
{
    private $host;
    private $dbusername;
    private $dbpassword;
	  private $dbname;

   
  protected function connect()
  {
    $this->host='localhost';
    $this->dbusername='root';
    $this->dbpassword='';
    $this->dbname='oop';
    $con=new mysqli($this->host,$this->dbusername,$this->dbpassword,$this->dbname);
    if ($con->connect_error) {
      die("Connection failed: " . $con->connect_error);
    }
    
    return $con;
  }
}
class query extends Dbconnect
{
  public 	$columns="";
	public $values="";
	
	public $column="";
	public $value="";


public function getData($table, $id=0){
  if($id== 0){
    $sql="SELECT * FROM form INNER JOIN second ON form.id = second.id ";

  }
   $result= $this->connect()-> query($sql);
    return $result;
} 
public function selectbyid($table,$id)
	{
		$sel= "SELECT * FROM $table where id=$id";
		$sel1=$this->connect()->query($sel);
		return mysqli_fetch_array($sel1);
		
	}

public function escape_string($value)
{
	return $this->connect()->real_escape_string($value);
}

public function insertData($data,$table){
  foreach($data as $this->column => $this->value)
		{
			
			$this->columns .= ($this->columns == "") ? "" : ", ";
			$this->columns .= $this->column;
		
			$this->values .= ($this->values == "") ? "" : ", ";
			$this->values .= "'".$this->value ."'";
			
			echo $this->values;
    }
		
  print_r($data);
  
  $sql="INSERT INTO $table ($this->columns)
  VALUES ($this->values)";
  if ($this->connect()->query($sql) === TRUE) {
    
  } else {
    echo "Error: " . $sql . "<br>" .$this->connect() ->error;
    }
  }
  public function deleteData($table,$id){
    $sql = "DELETE FROM $table WHERE id=$id";
    if ($this->connect()->query($sql) === TRUE) {
      echo "Record deleted successfully";
    } else {
      echo "Error deleting record: " .$this->connect() ->error ;
    }
  }
  public function updateData($data,$table,$id){
    foreach ($data as $this->column => $this->value) {

    $sql = "UPDATE $table SET $this->column = '$this->value' WHERE id=$id";
      if ($this->connect()->query($sql) === TRUE) {
     
      } else {
      echo  $this->connect()->error;
    }
  }
}
}


// $obj=new query();
// $obj->getData('form');
// // $obj->insertData('form');
// // $obj->deleteData('form',2);
// $obj->updateData('form',1);
 



?>