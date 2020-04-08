<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
		session_start();

		if(isset($_POST['login']))
		{
			include_once 'db.php';
			$u_uid=mysqli_escape_string($conn, $_POST['username']);
			$u_pwd=mysqli_escape_string($conn, $_POST['password_1']);

			// echo "<pre>";
			// print_r($u_pwd);
			// exit;


			$q="SELECT * FROM users where user_name='$u_uid' OR user_email='$u_uid'";
			$result=mysqli_query($conn, $q);
		
			$resultcheck=mysqli_num_rows($result);
			// print_r($resultcheck);

			if($resultcheck < 1)
			{

				echo "<script>window.open('../index.php?login=Error404','_self') </script>";
				exit();
			}
			else
			{
				
				if($row=mysqli_fetch_assoc($result))
				{
					
					$status = $row['user_status'];
					if(!($status=='Active'))
					{
						echo "<script>window.open('../index.php?login=Error','_self') </script>";
						exit();
					}
					else
					{ 
					
					
					if(! ($u_pwd == $row['user_pwd']))
					{
						echo "HI F";
						die;
						echo "<script>window.open('../index.php?login=Error','_self') </script>";
						exit();
					}
					else if($u_pwd == $row['user_pwd'])
					{
						$_SESSION['u_id'] = $row['user_id'];
						$_SESSION['u_first'] = $row['user_first'];
						$_SESSION['u_last'] = $row['user_last'];
						$_SESSION['u_uid'] = $row['user_name'];
						$_SESSION['u_email'] = $row['user_email'];
						$_SESSION['u_pwd'] = $row['user_pwd'];
						$_SESSION['u_status'] = $row['user_status'];
						$_SESSION['u_prvlge'] = $row['user_privilages'];
						$privilage=$_SESSION['u_prvlge'];

						if($_SESSION['u_uid']=='Admin'){
							$privilage='Admin';
							$q2="update `users` set user_privilages='$privilage' where user_name='Admin'";
							if(mysqli_query($conn,$q2))
								echo "ok";
							else
								echo "Error";

						}

						if($privilage=='User')
						{
							header("location: ../User/homepage.php? login =Success(User)");
							exit();
						}
						if($privilage=='Admin')
						{
							header("Location: ../Admin/homepage.php? login=Success(Admin)");
							exit();
						}
					}
				}
			}
		}
	}
		else
		{
			header("location: ../index.php? login= Error");
			exit();
		}	
	?>

</body>
</html>