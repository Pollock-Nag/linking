<?php
class Login
{
	private $error= "";
	


	public function check_validity($data)
	{

		$email = addslashes($data['email']);
		$password= addslashes($data['password']);

		
		$query= "select * from users where email = '$email' limit 1"; 
		; 
		
		//echo $query;
		
		//return $query;
		$db = new Database();
		$result =$db->read($query);

		if($result)
		{
			$row = $result[0];

			if($password== $row['password'])
			{

				//create session data
				$_SESSION['linking_userid']= $row['userid'];


			}else{
				$this->error .="wrong passoword <br>";

			}

		}else{

			$this-> error .= "No such email found <br>";
		}

		return $this->error;

		
	}


	public function check_login( $id)
	{
		
		if( is_numeric($id))
		{

			$query= "select * from users where userid = '$id' limit 1"; 
			
			$db = new Database();
			$result =$db->read($query);

			if($result)
			{
				
				$user_data= $result[0];
				return $user_data;
			}

			else
			{
				header("Location: login.php");
				die;
			}

			
		}
		else
		{
			header("Location: login.php");
			die;
		}

	

	}


}