<?php

	$key = @$_GET['update'];
	include_once 'db.php';

	$qu="SELECT user_privilages FROM users WHERE user_name='$key'";
	$r=mysqli_query($conn, $qu);
	$result=mysqli_fetch_assoc($r);

	$currentvalue=$result['user_privilages'];
	if($currentvalue=='User')
	{	
		$currentvalue='Admin';
	}
	else
		$currentvalue='User';
	
	$q= "UPDATE users SET user_privilages='$currentvalue' where user_name = '$key'"; 
	$r=mysqli_query($conn, $q);
	if($r==true){
		header("Location: ../Admin/users.php");
	}
?>