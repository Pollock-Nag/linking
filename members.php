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

	//($user_data[2]. " " .$user_data[3]);
	

	function search_user()
	{
		$db = new Database();
		$own_userid=$_SESSION['linking_userid'];
		//print_r($own_userid);

		if(isset($_GET['search_user_btn'])){

			$search_query = htmlentities($_GET['search_user']);
			$get_user= " SELECT * from users WHERE userid != $own_userid AND (first_name LIKE '%$search_query%' OR last_name LIKE '%$search_query%') ";

		}		
		else{


			$get_user = " select * from users WHERE userid != $own_userid ";			
		

		}



		$result = $db->read($get_user);

		/*echo "<pre>";
		print_r($result);
		echo "<pre>";*/



		if($result){

			foreach ($result as $FRIEND_ROW)
			{
				# code...

				include("user.php");



				$user_id=  $FRIEND_ROW['userid'];
				$user_first_name=  $FRIEND_ROW['first_name'];
				$user_last_name=  $FRIEND_ROW['last_name'];
				$user_two_profile_pic=  $FRIEND_ROW['profile_image'];
				
				//echo "$user_id";
				#	echo "          $user_first_name";
				#	echo "          $user_last_name";
			 		

			 	echo "
			 		

		 		<a style='cursor: pointer; color: transparent'
		 		href='user_profile_view.php?u_id=$user_id'>
				
				<div id='add_friend_button'>View Profile</div>
				
				</a><br><br><br>

			 		

				";

				


			}

		}		




	}	



?>





<!DOCTYPE html>
<html>
	<head>
		<title>Find Friends | Linking</title>
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

		#add_friend_button{

			float: left;
			background-color: #405d9b;
			//background-color: rgb(25,25,25);
			border: none;
			color: #ccc;
			padding: 4px;
			font-size: 12px;
			border-radius: 4px;
			width: 65px;
			margin: -12px;
			margin-left:  0px;
			margin-top: 25px;
			

			
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
				
					<a style="color: transparent;" href = "logout.php">
					
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
							
								All Users <br/><br/><br/>
								<div>
									<div>
										<form class="search_form" action="">
											
											<input id="search_box" type="text" placeholder="Search whom you know" name=" search_user">

											<button  type="submit" style="  border-radius: 2px; background-color:#405d9b; border: none;color: #ccc; height: 25px; "  name='search_user_btn'> Search</button>




										</form>

									</div>

								</div><br><br>

								<?php search_user(); ?>


								
							</div>



						</div>
					</div>




				</div>
			</div>
			

		</div>

	</body>
</html>