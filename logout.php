<?php

session_start();

if(isset($_SESSION['linking_userid']))
{
	$_SESSION['linking_userid']= NULL;
	unset($_SESSION['linking_userid']);
}

header("Location: login.php");
die;