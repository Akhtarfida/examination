<?php

	if(isset($_POST['submit']))
	{
		include_once 'db.php';
		$first=mysqli_escape_string($conn, $_POST['first']);
		$last=mysqli_escape_string($conn, $_POST['last']);
		$u_name=mysqli_escape_string($conn, $_POST['username']);
		$u_email=mysqli_escape_string($conn, $_POST['email']);
		$u_pwd=mysqli_escape_string($conn, $_POST['password_1']);
		$u_pwd1=mysqli_escape_string($conn, $_POST['password_2']);


		if(empty($u_name) || empty($u_email) || empty($u_pwd) || empty($u_pwd1))
		{
		
			echo "<script>window.open('../signup.php?signup=Fill The Fields','_self') </script>";
			exit();
		}
		else
		{
			// check if input characters are valid
			if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))
			{
				
			
				echo "<script>window.open('../signup.php?signup=Invalid first or last name or username','_self') </script>";
				exit();	
			}
			else
			{
				if(!filter_var($u_email, FILTER_VALIDATE_EMAIL))
				{
		
					"<script>window.open('../signup.php?signup=Invalid Email','_self') </script>";
					exit();	
				}
				else
				{
					if($u_pwd!=$u_pwd1)
					{
			
							echo "<script>window.open('../signup.php?signup=Passwords don't Match','_self') </script>";
						exit();		
					}
					else
					{
						$sql="SELECT * FROM users WHERE user_name = '$u_name'";
						$result=mysqli_query($conn, $sql);
						
						if(mysqli_num_rows($result) > 0)
						{
							echo "<script>window.open('../signup.php?signup=User Taken','_self') </script>";
							//"<script>window.open('view.php?delete=Record Deleted Successfully','_self')</script>"
							exit();				
						}
						else
						{
							$sql="SELECT * FROM users WHERE user_email = '$u_email'";
							$result=mysqli_query($conn, $sql);
							
							if(mysqli_num_rows($result) > 0)
							{
								header("Location: ../signup.php? signup = Already a user Sign in");
								exit();				
							}
							else{	
								// Hashing The Password
							$hashedpwd=$u_pwd
							//Insert the User
							$q="INSERT INTO  users(user_name, user_email, user_pwd, user_first, user_last) 
								VALUES('$u_name', '$u_email', '$hashedpwd', '$first', '$last');";
							$result=mysqli_query($conn, $q);
							$q1="UPDATE users SET user_privilages = 'Admin' where user_name='admin'";
				
								echo "<script>window.open('../index.php?signup=Successfully Signed Up...!','_self') </script>";
							exit();
							}	
						
						}
					}
				}
			}
		}
	}
	else
	{
		header("Location: ../signup.php");
		exit();
	}
?>