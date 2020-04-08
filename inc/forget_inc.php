<?php

	if(isset($_POST['submit']))
	{
		include_once 'db.php';
		$u_email=mysqli_escape_string($conn, $_POST['email']);
		$u_pwd=mysqli_escape_string($conn, $_POST['password_1']);
		$u_pwd1=mysqli_escape_string($conn, $_POST['password_2']);

		if($u_pwd==$u_pwd1)
		{
			$q="SELECT * FROM users where user_email='$u_email'";
			$result=mysqli_query($conn, $q);
			$resultcheck=mysqli_num_rows($result);
			if($resultcheck < 1)
			{

				echo "<script>window.open('forget.php?login=Error404','_self') </script>";
				exit();
			}
			else
			{
				$hashedpwd=$u_pwd;
				$q1="UPDATE `users` SET `user_pwd`='$hashedpwd' WHERE user_email='$u_email'";
				if(mysqli_query($conn,$q1))
				{
					header("Location: ../index.php? msg=Password Successfully Changed");
				}
			}
		}
		else{
			header("Location: forget.php? msg=Password doesnot match");
		}

	}

