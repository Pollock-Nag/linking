<?php

	session_start();
//	print_r($_SESSION);
	include("classes/connect.php");
	include("classes/login.php");
	include("classes/user.php");

// To check user is logged in or not

	$login = new Login();
	
	$user_data = $login-> check_login($_SESSION['linking_userid']);

// Collect Friends
	$user = new User();
	$id = $_SESSION['linking_userid'];

	$friends= $user-> get_friends($id);

	//print_r($user_data[2]. " " .$user_data[3]);
	

	function show_request()
	{
		
		$own_userid=$_SESSION['linking_userid'];
		
		// user_one = sender
		// user_two = recever

		$quary = " SELECT * FROM friend_request JOIN users ON friend_request.user_one=userid WHERE user_two =$own_userid And status =0 " ;  

		$db = new Database();
		$own_userid=$_SESSION['linking_userid'];

		

		$result = $db->read($quary);

		/*echo "<pre>";
		print_r($result);
		echo "<pre>";*/



		if($result)
		{

			foreach ($result as $FRIEND_ROW)
			{
				# code...

				include("user.php");



				$user_id=  $FRIEND_ROW['userid'];
				$user_first_name=  $FRIEND_ROW['first_name'];
				$user_last_name=  $FRIEND_ROW['last_name'];
				
				//echo "$user_id";
				#	echo "          $user_first_name";
				#	echo "          $user_last_name";
			 		

			 	echo "
			 		

		 		<a style='cursor: pointer; color: transparent;'
		 		href='accept_request.php?u_id=$user_id'>
				
				<div id='accept_friend_button'>Accept</div><br><br>
				
				</a>

				<a style='cursor: pointer; color:transparent '
		 		href='delete_request_confirmation.php?u_id=$user_id'>
				
				<div id='reject_friend_button'>Reject</div><br><br>
				
				</a><br><br><br>



			 		

				";

				


			}

		}	




	}	



?>












<!DOCTYPE html>
<html>
	<head>
		<title>Requests | Linking</title>
	</head>

	<style type="text/css">
		
		#gray_bar{
			height: 50px;
			background-color: rgb(48,57,58);
			color: rgb(241,241,241);
		}

		#search_box{
			width: 400px;
			height:  19px;
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
			border-radius: 50%;
			border: solid 2px gray;
			
		}

		#menu_button{
			
			width: 100px;	
			display: inline-block;
			margin: 2px;

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

		#accept_friend_button{

			float: left;
			background-color: #405d9b;
			//background-color: rgb(25,25,25);
			border: none;
			color: #ccc;
			padding: 4px;
			font-size: 12px;
			border-radius: 4px;
			width: 45px;
			margin: -12px;
			margin-left:  0px;
			margin-top: 10px;
			margin-left: 5px;

			
		}


		#reject_friend_button{

			float: left;
			background-color: #405d9b;
			//background-color: rgb(25,25,25);
			border: none;
			color: #ccc;
			padding: 4px;
			font-size: 12px;
			border-radius: 4px;
			width: 45px;
			margin: -12px;
			margin-top: 10px;
			margin-left: 5px;
			;

			
		}		

		#friends_img{
			width: 100px;
			float: left;
			margin: 8px;
			border-radius: 50%;
			border: solid 2px gray;
			
		}

		#friends_bar{
			background-color: rgb(25,25,25);
			height: 700px;
			margin-top: 20px;
			padding: 8px;
			text-align: center;
			font-size: 20px;
			color: #405d9b;


		}

		#friends{

			clear: both;
			color: #405d9b;
		}





		#post_bar{

			margin-top: 20px;
			//background-color: rgb(25,25,25);
			padding: 10px;
			height: 500px;

		}

		#post{

			padding: 4px;
			font-size: 13px;
			color: #ccc;			

		}

		#friends_profile_pic{

			width: 100px;
			border-radius: 50%;
			border: solid 2px gray;
			
		}


		textarea{
			padding: 4px;
			background-color: rgb(25,25,25);
			width: 99%;
			height: 90px;
			border: none;
			font-family: tahoma;
			font-size: 14px;
			color: rgb(241,241,241);;

		}

		
	</style>

	<body style="font-family: tahoma; background-color:rgb(36,36,36);" >
		<!--GEAY BAR OF TOP-->
		<div id="gray_bar">
			<div style=" width: 800px; margin:auto; font-size: 30px;">

				<a style="color:transparent;  " href="profile.php"> <span style="color: #ddd">Linking</span> </a>

				<?php

					echo "<img src='$user_data[profile_image]' style=' width: 50px ;float: right; border-radius: 60% ; border: solid 2px gray '>";
				?>
					
				
				
				
					<a style=" color: transparent;"  href = "logout.php">
					
						<span id="signout_button" >Logout
						</span>
					</a>
			</div>
			
			

		</div>

		<!--Cover Area-->
		<div style=" width: 800px; margin: auto; ; min-height: 400px " >

			

			<!--Below Cover Area-->
			<div style="display: flex; color: rgb(241,241,241);">
				

				<!--Friend Area-->
				<div style=" min-height: 400px; flex: 1; ">
					
					<div id="friends_bar">				
						
					
						

					
						<?php

							echo "<img id ='profile_pic',  src='$user_data[profile_image]' ><br>";
							print_r($user_data[2]. " " .$user_data[3]);

						?>




					</div>
					
				</div>

				<!--Posts Area-->
				<div style=" min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;">
					
					<div style=" border: solid thin #aaa  padding: 10px; background-color: rgb(25,25,25);">
						
						<textarea placeholder="Whats on your mind?"></textarea>

						<input id="post_button" type="submit" value="Post" ><br/>

					</div>




					<!--Posts-->
					<div id= "post_bar">

						<div id="post">
							
							<div>
							
								You Friend Requests <br/><br/><br/>
								<div>
									<div>
										<form class="search_form" action="">
											




										</form>

									</div>
									<div class ="col-sm-4">
										
									</div>

								</div><br><br>

								<?php show_request(); ?>



		
								
							</div>



						</div>
					</div>




				</div>
			</div>
			

		</div>

	</body>
</html>