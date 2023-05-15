<?php
	$user_two=$_GET['u_id'];
	echo "
	<script>  
						
		temp=confirm(' Do you want to DELETE the request ? ');
			if(!temp){
				window.location='request.php';
			}else{
				window.location='delete_request.php?u_id=$user_two';

			}			
	</script>
	";
