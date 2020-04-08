			<?php
				include 'db.php';
				session_start();

				if(isset($_POST['subs']))
				{
					$marks=$_POST['marks'];
					$sub=$_POST['qst-subject'];
					$result=$_POST['res-perc'];
					$user=$_SESSION['u_id'];
					$subid=$_POST['sid'];
					$perc=$_POST['result'];


					$q="INSERT INTO `result`(user_id,sub_id,result,res_perc)VALUES($user,$subid,'$result',$perc)";
					if(mysqli_query($conn,$q))
					{
						header("Location: ../User/homepage.php");
					}
					else
					{
						echo "Error";
					}
				}
					
			?>
