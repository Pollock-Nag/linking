<?php

class Database
{

	private $host="localhost";
	private $username="root";
	private $password="";
	private $db="linking";


	function connect()
	{

		$connection = mysqli_connect($this->host,$this->username,$this->password,$this->db);
		return $connection;
	}

	function read($query)
	{
		$conn = $this-> connect();
		$res= mysqli_query($conn,$query);


		if(!$res){
			return false;
		}
		else
		{
			$data = false; 
			while($row = mysqli_fetch_array($res))
			{
				$data[]=$row;
			}

			return $data;
		}
		
	}


	function save($query)
	{
		$conn = $this-> connect();
		$res= mysqli_query($conn,$query);

		if(!$res){
			return false;
		}else{
			return true;
		}

		
	}



}


//$db = new Database();
//$quary="select * from users";
//$data = $db-> read($quary);

//print_r($data);



