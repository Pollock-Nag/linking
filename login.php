<?php
session_start();

	//print_r($_SESSION);
	include("classes/connect.php");
	include("classes/login.php");

	$email= "";
	$password= "";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{

		$login = new Login();
		$res = $login-> check_validity($_POST);
		
		if($res != "")
		{

			echo "<div style=' text-align:center; font-size: 12px; color: red; padding: 4px;'>";
			echo "The following erroes occured: <br><br>";
			echo $res;
			echo "</div>";	
		}
		else
		{

			header("Location: profile.php");
			die;


		}


		$password=$_POST['password'] ;
		$email=$_POST['email'] ;
		

 	}

?>




<html> 

	<head>
		<title> Log in | Linking </title>
	</head>
	

	<style>
		
		#bar{
			height: 100px;
			background-color: rgb(48,57,58);
			//background-color: rgb(52,115,171);
			//background-color: rgb(246,245,248);
			
			font-size: 30px;
			color: rgb(241,241,241);
			padding: 4px;
		}

		#signup_button{
			background-color: rgb(39,92,171);
			font-size: 15px;
			width: 70px;
			text-align: center;
			padding: 4px;
			border-radius: 4px;
			float: right;
		}

		#login_bar{
			//background-color: rgb(246,245,248); 
			
			background-color: #e9ebee; 
			width:400px;
			height: 225px; 
			margin: auto;
			margin-top:50px;
			padding: 10px;
			padding-top: 60px;
			border-radius: 10px;
			text-align: center;
		}

		#text{
			height: 35px;
			width: 250px;
			border-radius: 4px;
			border: solid 1px #ddd;
			padding-top: 4px;
			font-size: 14px;

		}

		#button{
			height: 35px;
			width: 250px;
			border-radius: 4px;
			border: none;
			background-color: rgb(39,92,171);
			color: white; 
		}


	</style>

	<body style="font-family:tahoma; background-color: rgb(36,36,36); ">
		<div id="bar">
			
			<div style="font-size: 30">Linking</div> 
			
			<a style=" color:#ccc;text-decoration: none;"   href="signup.php">
				<div id="signup_button">Signup</div>
			</a>

			
		</div>
		
		<div>
			<div id="login_bar" >
				
				<form method="post">

					Log in to Linking<br/><br/>
					<input name="email" value="<?php echo $email ?>" type="text" id="text" placeholder="Email"><br/><br/>
					<input name="password" value="<?php echo $password ?>" type="Password" id="text" placeholder="Password"><br><br>
					<input type="submit" id="button" value="Log in"><br><br><br>

				</form>

			</div>

		</div>


	</body>

</html>