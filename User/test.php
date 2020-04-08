<?php
	session_start();
		$prv=$_SESSION['u_prvlge'];

	if(isset($_SESSION['u_uid']))
	{
		include "../inc/db.php";
	if(isset($_POST['quit']))
	{
		header("Location: examination.php");	
		exit;
	}

	if(isset($_POST['sub']))
	{
		$n=$_POST['tno'];
		$qstid=$_POST['qst-id'];
		$sub=$_POST['qst-subject'];	
		$i=$_POST['sno'];	
		$marks=$_POST['marks'];
		$ans='null';

		$user=$_SESSION['u_id'];

		if(isset($_POST['pick']))
		{
			$ans=$_POST['pick'];
			$qqq="select `op_true` from `option` where `option`.`qst_id`=$qstid";
			$rrr=mysqli_query($conn,$qqq);
			$res1=mysqli_fetch_assoc($rrr);
			$rans=$res1['op_true'];
			if($ans==$rans)
			{
				$marks=$marks+1;
				$result=($marks/$n)*100;
			}
			else
			{
			
			}
			
		}
			
		$q="SELECT * FROM subject WHERE sub_name='$sub'";
		$r=mysqli_query($conn,$q);
		if($r)
		{
			$subject=mysqli_fetch_assoc($r);
			$s1= $subject['sub_id'];
			$subpass=$subject['sub_pass'];
		}
		else
			echo "1st ERror";
		
		$qry="SELECT * from `subject`,`question`,`option`
			WHERE  `subject`.`sub_id`= `question`.`sub_id` AND `subject`.`sub_id`= $s1 AND `question`.`qst_id`>$qstid
			AND `question`.`qst_id`=`option`.`qst_id` AND `question`.`qst_status`='Active'" ;
			$run=mysqli_query($conn,$qry);
			if(!$run)
				echo "Error";

		/*
		$q1="SELECT *FROM question WHERE sub_id=$s1";
		$question=mysqli_fetch_assoc(mysqli_query($conn,$q1));
		$s2=$question['qst_id'];
		$q2="SELECT *FROM option WHERE qst_id=$s2";
		$option=mysqli_fetch_assoc(mysqli_query($conn,$q2));
		*/
		
		
		
		
}		

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Welcome to | Admin Homepage</title>
	<link rel="stylesheet" type="text/css" href="../style/style1.css">
</head>
<body>
	<header id="heading">
		<div class="container">
			<h1><span class="current">eExamination</span> - Online Examination System</h1>
		</div>
	</header>
	<nav>
			<ul>
				<li> Welcome <span>| <span class="highlight"><?php  echo $_SESSION['u_first'] ?></span> | </span> (<span>Member</span>)</li>
				<a href="../inc/logout_inc.php"><li>Logout</li></a>
				<a href="feedback.php"><li>Feedback</li> </a>
				<a href="users.php"><li>Edit Profile</li></a>
				<a href="result.php"><li>My Results</li> </a>
				<a href="examination.php"> <li><span class="highlight">Start Examination </span></li> </a>
				<?php if($prv=='Admin') { ?>
				<a href="../Admin/homepage.php"><li>Admin Panel</li></a>	
				<?php } ?>
			</ul>	
		</nav>
		

		<section style="margin-top: 40px;" id="ss">
			<form action="test.php" method="POST">
<?php
					if($i<=$n)
					{
	
	?>		
			<div class="container" style="margin: auto; width: 50%; border:3px solid #e8491d; background-color:#35424a;  border-radius: 15px; line-height: 2em;	">
		

					<div id="hd" style="border-bottom: 2px solid #e8491d; background-color: #35424a; color: white;padding: 5px;">
						<label for="" style="font-size: 18px;">Examination: </label><?php echo $sub; ?>
					</div> 	

					<?php
				
						 if($result=mysqli_fetch_assoc($run))
						{
							$qst_id=$result['qst_id'];
			 		?>
					<div id="data" style="margin: auto; padding: 10px;">

						<label  style="color:orange;"> <b>Question No:</b> </label><label style="color: orange;"><?php  echo " ".$i;  ?></label> <br>
						<label  style="color:orange;"> <b>Question : </b> </label> <label style="color: orange;"><?php echo $result['qst_name'];  ?></label><br>
					</div>

					<div class="container" style="margin:0; padding: 0px 20px 10px 10px; width: 100%;">
						<label style="color: orange; text-decoration: underline;">Options</label> <br>
						<label style="color: orange;">A.</label> <input type="radio" name="pick" value="<?php echo $result['op_a']; ?>" id='o'><label style="color: orange;"> <?php echo $result['op_a']; ?></label><br>

						<input type="hidden" name="qst-subject" value="<?php echo $sub; ?>">
						<input type="hidden" name="qst-id" value="<?php echo $qst_id; ?>">
						<input type="hidden" name="sno" value="<?php echo $i+1; ?>">
						<input type="hidden" name="tno" value="<?php echo $n; ?>">
						<input type="hidden" name="marks" value="<?php echo $marks; ?>">

						<label style="color: orange;">B.</label> <input type="radio" name="pick" value="<?php echo $result['op_b']; ?>" id='o1'> <label style="color: orange;"><?php echo $result['op_b']; ?></label><br>
						<label style="color: orange;">C.</label> <input type="radio" name="pick" value="<?php echo $result['op_c']; ?>" id='o2'> <label style="color: orange;"><?php echo $result['op_c']; ?></label><br>
						<label style="color: orange;">D.</label> <input type="radio" name="pick" value="<?php echo $result['op_d']; ?>" id='o3'> <label style="color: orange;"><?php echo $result['op_d']; ?></label><br>
					</div>

					<div class="container" style="margin:0; padding: 0px 20px 10px 25px;">
							<button class="btn1" name="quit"  style="width: 25%;">Quit</button>  
							<label style="color: orange;"><?php echo $i."/" .$n;   ?></label>
							<button type="submit" class="btn1" name="sub" style="width: 25%;">Submit</button> 
					</div>
					<?php 
												
					 }
					 }
						?>

			</div>
			</form>
		</section>

<?php
	if($i>$n)
	{	
	
		$result=($marks/$n)*100;
?>
		<section style="margin-top: 40px;" id="ss">
			<form action="../inc/add_result.php" method="POST">
			
			<div class="container" style="margin: auto; width: 30%; height: 30%; border:3px solid #e8491d; background-color:#35424a; width: 35%; border-radius: 15px;">
				
					<div id="hd" style="border-bottom: 2px solid #e8491d; background-color: #35424a; color: white;padding: 5px;">
						<label for="" style="font-size: 18px;">Examination Result</label>
					</div>
					
					<div id="data" style="margin: auto; padding: 30px;">
						<label  style="color:orange; margin-left: 12%;"><b> Thanks for giving the examination.</b></label> <br>
						<label  style="color:orange; margin-left: 25%;"> Exam Name: <b><?php echo $sub; ?></b> </label><br>
						<label  style="color:orange; margin-left: 25%;"> No. of Questions: <b><?php echo $n; ?></b> </label><br>
						<label  style="color:orange; margin-left: 25%;"> Right Answers: <b><?php echo $marks; ?></b> </label><br>
						<label  style="color:orange; margin-left: 25%;"> Result: <b><?php 
							if($result<$subpass){
							$perc='Failed';
							echo $perc;
							}
							else{
							$perc="Pass";
							echo $perc;
						}
						?></b> </label><br>
						<input type="hidden" name="qst-subject" value="<?php echo $sub; ?>">
						<input type="hidden" name="res-perc" value="<?php echo $perc; ?>">
						<input type="hidden" name="sid" value="<?php echo $s1; ?>">
						<input type="hidden" name="marks" value="<?php echo $marks; ?>">
						<input type="hidden" name="result" value="<?php echo $result; ?>">
	
					</div>

					<div class="container" style="margin-left:24%; padding: 5px 	5px 10px 25px;">
	
							<button type="submit" class="btn1" name="subs" >Go Back</button>
					</div>
					
			</div>
			</form>
		</section>

<?php
}
?>


			<footer id="f">
		<p> &copy; eExamination 2017 Developed by : M. Akhtar</p>
	</footer>

</body>
</html>
<?php
	}
	else
	{
		include 'logout_inc.php';
		header("Location: ../index.php?msg=Login First");
	}
?>

<?php 
	/*	if(isset($_POST['sub']))
		{
			if(isset($_POST['pick']))
				echo $_POST['pick'];
		}   */

 ?>