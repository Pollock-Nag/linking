<?php

class User
{

	public function get_data($id)
	{
		$query= "select * from users where userid= '$id' limit 1";
		
		$db = new Database();
		$result = $db-> read($query);

		if($result)
		{
			$row = $result[0];
			return $row;
		}
		else
		{
			return false;

		}

	}

	//For getting all users
	public function get_friends($id)
	{
		
		$query= "select * from users where userid != '$id' "; 
		$db = new Database();
		$result= $db->read($query);

		if($result)
		{
			return $result;
		}
		else
		{
			return false;
		}	

	}

	// For getting my friends ONLY
	public function my_friends($id){

		$query= "SELECT users.*, friends.user_one , friends.user_two FROM users INNER JOIN friends ON friends.user_one= users.userid OR friends.user_two = users.userid WHERE ( friends.user_one = '$id' OR friends.user_two = '$id')AND users.userid != '$id' GROUP BY users.first_name ORDER BY friends.id DESC  ";
		

		$db = new Database();
		$result= $db->read($query);


		if($result)
		{
			return $result;
		}
		else
		{
			return false;
		}	

	}


}