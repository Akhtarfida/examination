<?php
	session_start();
	$user=$_SESSION['u_id'];
	$pwd=$_SESSION['u_pwd'];


	if(isset($_POST['submit']))
	{
		include_once 'db.php';
		$first=mysqli_escape_string($conn, $_POST['first']);
		$last=mysqli_escape_string($conn, $_POST['last']);
		$u_name=mysqli_escape_string($conn, $_POST['username']);
		$u_pwd=mysqli_escape_string($conn, $_POST['password_1']);
		$u_pwd1=mysqli_escape_string($conn, $_POST['password_2']);

		$h= password_verify($u_pwd, $pwd);
		if($h==false)
		{
			header("Location: ../user/users.php?login=Error'");
						exit();
		}
		else
		{
			// check if input characters are valid
			if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last))
			{
				
			
				echo "<script>window.open('../user/users.php?signup=Invalid first or last name or username','_self') </script>";
				exit();	
			}
			else
			{
						$sql="SELECT * FROM users WHERE user_name = '$u_name'";
						$result=mysqli_query($conn, $sql);
						
						if(mysqli_num_rows($result) > 0)
						{
							echo "<script>window.open('../user/users.php?signup=User Taken','_self') </script>";
							//"<script>window.open('view.php?delete=Record Deleted Successfully','_self')</script>"
							exit();				
						}
							else{	
								// Hashing The Password
							$hashedpwd=password_hash($u_pwd1, PASSWORD_DEFAULT);
							//Update the User
							$q="UPDATE `users` SET `user_name`='$u_name',`user_pwd`='$hashedpwd',`user_first`='$first',`user_last`='$last' WHERE user_id=$user";
							$result=mysqli_query($conn, $q);
							if($result)
							{
								header("Location: ../inc/logout_inc.php? msg=Successfully Changed...!");
								exit();
							}
							else
							{
								echo "Error";
							}
							}	

						
						}
					}
				}
	

	else
	{
	#	header("Location: ../users/user.php");
	#	exit();
	}
?>