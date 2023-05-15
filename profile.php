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
	$friends= $user-> my_friends( $id);


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
			
				Linking &nbsp &nbsp 
				

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

			<div style="background-color: rgb(25,25,25); text-align: center; color: #405d9b">
				
				<img src="galaxy4.jpg" style="width: 100%;">
				
				
				<span style=" font-size: 11px">


					<?php  

						$image = "";
						if(file_exists($user_data['profile_image']))
						{

							$image = $user_data['profile_image'];
						}

					?>

					<img id="profile_pic" src="<?php echo $image?>" ><br>
					<a style=" color:#405d9b; text-decoration: none;" href="change_profile_image.php">  Change Image</a>
				

				</span>
				
				


				<br/>
					
					<div style="font-size: 20px;"><?php echo $user_data['first_name'] ." ".$user_data['last_name'] ?></div>

				<br/>


				
				
				<div id="menu_button">Timeline</div>
				<div id="menu_button">About</div>


				<a style=" color:#405d9b; text-decoration: none;"   href="request.php">
				<div id="menu_button">Requests</div>
				</a>

				<a style=" color:#405d9b;text-decoration: none;"   href="members.php">
				<div id="menu_button">Find Friends</div>
				</a>

				<div id="menu_button">Notifications</div>
				<div id="menu_button">Chat</div>
				
				    
			</div>

			<!--Below Cover Area-->
			<div style="display: flex; color: rgb(241,241,241);">
				

				<!--Friend Area-->
				<div style=" min-height: 400px; flex: 1; ">
					
					<div id="friends_bar">				
						Friends<br/>
			
						<?php

						if($friends){

							foreach ($friends as $FRIEND_ROW) {
								# code...

								include("user.php");
							}

						}


						?>


					</div>
					
				</div>

				<!--Posts Area-->
				<div style=" min-height: 400px; flex: 2.5; padding: 20px; padding-right: 0px;">
					
					<div style=" border: solid thin #aaa  padding: 10px; background-color: rgb(25,25,25);">
						
						<textarea placeholder="Whats on your mind?"></textarea>

						<input id="post_button" type="submit" value="Post" ><br/>

					</div>



				</div>
			</div>
			

		</div>

	</body>
</html>