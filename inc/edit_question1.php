	<?php
					include "db.php";

				
				$qstsubject=$_POST['qst-subject'];
				echo $qstsubject;
				$qu="select * from subject where sub_name='$qstsubject'";
				$ru=mysqli_query($conn,$qu);
				$rec=mysqli_fetch_assoc($ru);
				$subid=$rec['sub_id'];
				
				$qstid=$_POST['qst-id'];
				$qstname=$_POST['qst-name'];
				
				if(isset($_POST['qst-status'])=='Active')
				$qststatus="Active";
				else
					$qststatus="Inactive";
				$qsttype=$_POST['qst-type'];
				$opta=$_POST['a'];
				$optb=$_POST['b'];
				$optc=$_POST['c'];
				$optd=$_POST['d'];
				$ans=$_POST['ans'];
				if($ans!=$opta && $ans!=$optb && $ans!=$optc && $ans!=$optd)
				{
					echo "Give Right Answer Also...!";
				//	header("Location: add_question.php");
				}
			
			    $qr="update `examination`.`question` SET `qst_name`='$qstname',`sub_id`=$subid,`qst_status`='$qststatus' where qst_id=$qstid";
				if(mysqli_query($conn, $qr))
				{
					echo "Data into Question Is inserted syccessfully";
					$qur="update `examination`.`option` set `qst_id`=$qstid,`op_a`='$opta',`op_b`='$optb',`op_c`='$optc',`op_d`='$optd',`op_true`='$ans' where qst_id=$qstid";
					if(mysqli_query($conn,$qur)) 
					header("Location: ../Admin/question.php");
					else
						echo "<br> Option Table ERROR";
				}
				else
				{
					echo "ERROR";
				}

	?>
