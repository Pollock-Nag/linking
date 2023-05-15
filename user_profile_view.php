<?php

	session_start();
//	print_r($_SESSION);
	include("classes/connect.php");
	include("classes/login.php");
	include("classes/user.php");
	include("classes/signup.php");
	
// To check user is logged in or not

	$login = new Login();
	
	$user_data = $login-> check_login($_SESSION['linking_userid']);
	

	if(isset($_GET['u_id'])){
		$u_id = $_GET['u_id'];

	}

	$own_userid=$_SESSION['linking_userid'];
	$user_two=$u_id;
	
	// To send friend request 

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
			$db = new Database();

			// IF WE ARE FRIEND ALERADY	 
			/*$q0 = "SELECT * FROM friends WHERE (user_one= $own_userid AND user_two= $user_two)OR( user_one= $user_two AND user_two= $own_userid)";

			$check[] = $db -> read($q0);
			$row_count= count($check,1);    if($row_count===1) */
			//print_r( $row_count);

			$q0 = "SELECT * FROM `friend_request` WHERE ((user_one = $own_userid AND user_two = $user_two ) OR (user_one = $user_two AND user_two = $own_userid)) AND status = 1 ";

			$result0=$db->read($q0);

			if(!$result0)
			{

				// IF I ALREADY SEND A REQUEST

				$q1 = "SELECT * FROM `friend_request` WHERE ((user_one = $own_userid AND user_two = $user_two ) OR (user_one = $user_two AND user_two = $own_userid)) AND status = 0 ";

				$result=$db->read($q1);

				// IF WE ARE NOT FRIEND AND  I ALREADY DONOT SEND A REQUEST
				if(!$result)
				{
					// IF WE ARE NOT FRIEND AND  I ALREADY DONOT SEND A REQUEST
					$query= "INSERT INTO friend_request ( user_one, user_two, status) VALUES ('$own_userid','$user_two','0')";

					$db->save($query);

					echo 
						"<script>  
							
							alert('Successfully send !');window.location='members.php'
						
						</script>";


				}else{

					$sql_as_a_sender = "SELECT * FROM `friend_request` WHERE user_one = $own_userid AND user_two = $user_two ";

					$check= $db->read($sql_as_a_sender);

					if($check)
					{
						echo 
						"<script>  
						
							alert('You have already send a request');window.location='members.php'
						
						</script>";



						
					}

					else{

						echo 
						"<script style:>  
						
							alert('You already have a PENDING request from this user');window.location='members.php'
						
						</script>";

					} 

				}
			}
			else
			{
				echo 
				"<script style:>  
				
					alert('You people are already FRIENDS!');window.location='members.php'
				
				</script>";				

			}


			//print_r( "string");
			
			

	}


	//user two details

	$query= "SELECT * FROM users WHERE userid='$user_two'";
	$db = new Database();
	$user_two_data=$db->read($query);

	foreach ($user_two_data as $FRIEND_ROW) {

		$user_two_id=  $FRIEND_ROW['userid'];
		$user_two_first_name=  $FRIEND_ROW['first_name'];
		$user_two_last_name=  $FRIEND_ROW['last_name'];
		$user_two_profile_pic=  $FRIEND_ROW['profile_image'];


	}

	
	
?>




<!DOCTYPE html>
<html>
	<head>
		<title>Profile | Linking</title>
	</head>

	<style type="text/css">
		
		#gray_bar{
			height: 50px;
			background-color: rgb(48,57,58);
			color: rgb(241,241,241);
		}

		#search_box{
			width: 400px;
			height:  20px;
			border-radius: 4px;
			border: none;
			padding: 4px;
			font-size: 14px;
			background-image: url(search.png);
			background-repeat: no-repeat; 
			background-position: right;

		}

		#profile_pic{

			width: 150px;
			margin-top: -200px;
			border-radius: 50%;
			border: solid 2px gray;
			
		}

		#menu_button{
			
			background-color: #405d9b;
			color: #ddd;
			font-size: 14px;
			text-align: center;
			padding: 4px;
			border-radius: 4px;
			border-radius: none;
			width: 100px;	
			display: inline-block;
			margin: 2px;
			margin-left: 680px;
			border: none;
			cursor: pointer;


		}
		
		#post_button{

			float: right;
			background-color: #405d9b;
			border: none;
			color: #ddd;
			padding: 4px;
			font-size: 14px;
			border-radius: 4px;
			width: 54px;  	 
		}

		#friends_img{
			width: 40px;
			float: left;
			margin: 8px;
			border-radius: 50%;
			border: solid 2px gray;
			
		}

		#friends_bar{
			background-color: rgb(25,25,25);
			height: 400px;
			margin-top: 20px;
			
			padding: 8px;


		}

		#friends{

			clear: both;
			color: #405d9b;

		}


		#signout_button{
			background-color: #405d9b;
			color: #ccc;
			font-size: 10px;
			width: 40px;
			text-align: center;
			padding: 4px;
			border-radius: 4px;
			margin: 10px;
			margin-top: 12px;
			float: right;
			background-position: right;

		}


		
	</style>

	<body style="font-family: tahoma; background-color:rgb(36,36,36);" >
		<!--GEAY BAR OF TOP-->
		<div id="gray_bar">
			<div style=" width: 800px; margin:auto; font-size: 30px;">
			
				Linking &nbsp &nbsp <input type=" text" id="search_box" placeholder="Search whom you know">
				<?php

					echo "<img src='$user_data[profile_image]' style=' width: 50px ;float: right; border-radius: 60% ; border: solid 2px gray '>";
				?>				
					<a href = "logout.php">
					
					<span id="signout_button" >Logout
					</span>
					</a>
			</div>
			
			

		</div>

		<!--Cover Area-->
		<div style=" width: 800px; margin: auto; ; min-height: 400px " >

			<div style="background-color: rgb(25,25,25); text-align: center; color: #405d9b">
				
				<img src="galaxy4.jpg" style="width: 100%;">
				<img id="profile_pic" src="<?php echo $user_two_profile_pic ?>" ><br>
				
				<br/>
					
					<div style="font-size: 20px;"><?php echo $user_two_first_name ." ".$user_two_last_name ?></div>

				<br/>


				

				<form  action="" method ="POST">
					
						<input id="menu_button" type="submit" name="addfriend" value="Add as friend">
					

				</form>
		
				
				    
			</div>

			<!--Below Cover Area-->
			<div style="display: flex; color: rgb(241,241,241);">
				

				
			
			</div>
			

		</div>

	</body>
</html>