<?php
	$dbservername="localhost";
	$dbusername="root";
	$dbpassword="123456";
	$dbname="examination";
	
	$conn=mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
	if($conn)
	{
		echo "<script> Connected</script>";
	}
	else
	{
		echo "<script>Database connection failed</script>";
		die;
	}
?>