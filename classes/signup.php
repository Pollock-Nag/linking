<?php

/**
 * 
 */
class Singup 
{
	
	private $error= "";
	
	public function check_validity($data)
	{
		foreach ($data as $key => $value) {
			
			if(empty($value))
			{
				$this-> error = $this-> error . $key . " is empty!<br>"; 
			}


			if($key=='password2')
			{

				$password= $data['password'];
				$password2 = $value;
				
				if($password != $password2){
					$this-> error = $this-> error .  " Password doesnot match  <br>";
				}


				/*if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
				     
				 	$this-> error = $this-> error .  " Please enter a valid email address <br>"; 	

				}*/
			   				
			
			}



			if($key=='email')
			{
				$email = $value;
				  
				if (!filter_var($email, FILTER_VALIDATE_EMAIL))
				{
				     
				 	$this-> error = $this-> error .  " Please enter a valid email address <br>"; 	

				}
			   				
			
			}
			
			if($key=="first_name")
			{

				if (is_numeric($value))
				{
					$this-> error = $this-> error .  " First name can't be a number <br>"; 	
				}				
			
				if (strstr($value, " "))
				{
					$this-> error = $this-> error .  " First name can't have spaces <br>"; 	
				}

			}

			if($key=="last_name")
			{

				if (is_numeric($value))
				{
					$this-> error = $this-> error .  " Last name can't be a number <br>"; 	
				}

				if (strstr($value, " "))
				{
					$this-> error = $this-> error .  " Last name can't have spaces <br>"; 	
				}								
			
			}			

		}

		if($this-> error== ""){

			//no error
			$this-> create_user($data);

		}else{

			return $this->error;
		}

	}

	public function create_user($data)
	{

		$first_name= ucfirst($data['first_name']);
		$last_name=ucfirst($data['last_name']);
		$gender = $data['gender'];
		$email = $data['email'];
		$password= $data['password'];

		//create this
		$url_address= strtolower($first_name)."." .strtolower($last_name);
		
		$userid= $this->create_user_id();


		$query= "insert into users
		(userid,first_name,last_name,gender,email,password,url_address) 
		values 
		('$userid','$first_name','$last_name','$gender','$email','$password','$url_address')"; 
		
		//echo $query;
		
		//return $query;
		$db = new Database();
		$db->save($query);
	}

	
	private function create_user_id(){

		$length = rand(4,19);
		$number = "";

		for ($i=0; $i < $length ; $i++) { 
			# code...
			$new_rand= rand(0,9);

			$number=$number. $new_rand;

		}
		return $number;

	}


}