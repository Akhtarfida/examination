	<?php
		session_start();
				include "db.php";

				
				$qstsubject=$_POST['qst-subject'];
				$qu="select * from subject where sub_name='$qstsubject'";
				$ru=mysqli_query($conn,$qu);
				$rec=mysqli_fetch_assoc($ru);
				$subid=$rec['sub_id'];
				
				$qstid=$_POST['qst-id'];
				$qstname=$_POST['qst-name'];

			
				$opta=$_POST['a'];
				$optb=$_POST['b'];
				$optc=$_POST['c'];
				$optd=$_POST['d'];
				$ans=$_POST['ans'];
				$user=$_SESSION['u_id'];
				if($ans!=$opta && $ans!=$optb && $ans!=$optc && $ans!=$optd)
				{
					echo "Give Right Answer Also...!";
					header("Location: add_question.php");
				}
				

			    $qr="INSERT INTO `examination`.`question`(`qst_name`,`sub_id`) VALUES('$qstname',$subid)";
				if(mysqli_query($conn, $qr))
				{
					echo "Data into Question Is inserted syccessfully";
					
					$q2="SELECT sub_id from subject";
					$r=mysqli_query($conn,$q2);
					if($r)
					{
					while($res=mysqli_fetch_assoc($r))
					$subid=$res['sub_id'];
					}

					$q1="SELECT MAX(qst_id) FROM question";
					$r1=mysqli_query($conn,$q1);
					$res1=mysqli_fetch_assoc($r1);
					$qstid=$res1['MAX(qst_id)'];
					$qur="INSERT INTO `examination`.`option`(`qst_id`, `sub_id`, `op_a`, `op_b`, `op_c`, `op_d`, `op_true`) VALUES($qstid,$subid,'$opta','$optb','$optc','$optd','$ans')";
					if(mysqli_query($conn,$qur)) 
					{
						$q3="INSERT INTO user_qst(user_id,qst_id)VALUES($user,$qstid)";
						if(mysqli_query($conn,$q3))
						{
						header("Location: ../Admin/question.php");
						}
						else
							echo "Error";
					}
					else
						header("Location: ../Admin/question? ERROR.php");
					
				}
				else
				{
					echo "ERROR";
				}

	?>
