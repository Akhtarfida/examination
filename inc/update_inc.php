<?php

	$key = @$_GET['update'];
	include_once 'db.php';

	$qu="SELECT user_status FROM users WHERE user_name='$key'";
	$r=mysqli_query($conn, $qu);
	$result=mysqli_fetch_assoc($r);

	$currentvalue=$result['user_status'];
	if($currentvalue=='Active')
	{	
		$currentvalue='InActive';
	}
	else
		$currentvalue='Active';
	
	$q= "UPDATE users SET user_status='$currentvalue' where user_name = '$key'"; 
	$r=mysqli_query($conn, $q);
	if($r==true){
		header("Location: ../Admin/users.php");
	}
?>