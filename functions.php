<?php
 /**
  * 
  */
  class Database
  {
  	public $conn;
  	function __construct()
  	{
  		$this->conn= new mysqli('localhost','root','','exam');
  		if ($this->conn){
  			//echo "connected";
  		}
  		else{
  			echo "cant connect to database";
  		}
  		
  	}

  	function insert_data($age,$name,$address){

  		$return=$this->conn->query("INSERT INTO user (age,name,address) VALUES ('$age','$name','$address')");

  		if ($return) {
  			return true;
  		}
  		else{
  			return false;
  		}

  	}
  	function select_data(){
  		$data = array();
  		$result=$this->conn->query("SELECT * FROM user");
  		while ($row=$result->fetch_assoc()) {
  			$data[] = $row;
  		}
  		return $data;
  	}
  	function select_data_byid($id){
  		$data = array();
		$result=$this->conn->query("SELECT * FROM user WHERE id=$id");
		while ($row=$result->fetch_assoc()) {
  			$data[] = $row;
  		}
  		return $data;
  	}
  	public function delete_user_data($id){
  		
  		$result=$this->conn->query("DELETE FROM user WHERE id=$id");
  		if ($result) {
  			return true;
  		}
  		else{
  			return false;
  		}
  	}
  	public function update_user($name,$age,$address,$id){

  		$result=$this->conn->query("UPDATE user SET name='$name',age='$age',address='$address' WHERE id='$id'");
  		if ($result) {
  			return true;
  		}
  		else{
  			return false;
  		}
  	}
  } 
 ?>