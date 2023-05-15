<?php
	
	include("classes/connect.php");
	include("classes/signup.php");

	$first_name= "";
	$last_name= "";
	$gender= "";
	$email= "";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{

		$signup = new Singup();
		$res = $signup-> check_validity($_POST);
		
		if($res != "")
		{

			echo "<div style=' text-align:center; font-size: 12px; color: red; padding: 4px;'>";
			echo "The following erroes occured: <br><br>";
			echo $res;
			echo "</div>";	
		}
		else
		{

			echo 
				"<script>  
				
					alert(' Signup successfully!');window.location='login.php'
				
				</script>";

			//header("Location: login.php");
			die;


		}


		$first_name=$_POST['first_name'] ;
		$last_name=$_POST['last_name'] ;
		$gender=$_POST['gender'] ;
		$email=$_POST['email'] ;

 	}

?>





<html> 

	<head>
		<title> Sign up | Linking </title>
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

		#login_button{
			background-color: rgb(39,92,171);
			font-size: 15px;
			width: 70px;
			text-align: center;
			padding: 4px;
			border-radius: 4px;
			float: right;
		}

		#signup_bar{
			//background-color: rgb(246,245,248); 
			
			background-color: #e9ebee; 
			width:400px;
			height: 500px; 
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
			padding: 4px;
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
			<a style=" color:#ccc;text-decoration: none;"   href="login.php">
				<div id="login_button">Login</div>
			</a>
			
		</div>
		
		<div>
			<div id="signup_bar" >
				
				Sign up to Linking<br/><br/>


				<form method ="post" action="">


					<input value="<?php echo $first_name ?>" name="first_name" type="text" id="text" placeholder="First Name"><br/><br/>
					<input value="<?php echo $last_name ?>"  name="last_name" type="text" id="text" placeholder="Last Name"><br/><br/>

					<span style="font-weight: normal;">Gender:</span><br/>
					<select id="text" name="gender">
						
						<option> <?php echo $gender ?> </option>
						<option>Male</option>
						<option>Female</option>

					</select>
					<br/><br/>
					
					<input value="<?php echo $email ?>"  name="email"  type="text" id="text" placeholder="Email"><br/><br/>
					<input name="password"  type="Password" id="text" placeholder="Password"><br><br>
					<input name="password2"  type="Password" id="text" placeholder="Retype Password"><br><br>
					
					<input type="submit" id="button" value="Sign up"><br><br><br>
	

				</form>
				
			</div>

		</div>


	</body>

</html>