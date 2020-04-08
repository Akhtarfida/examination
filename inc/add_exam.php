<?php
	session_start();

	if(isset($_SESSION['u_uid']))
	{
		include_once '../inc/db.php';
		
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
				<li>Welcome <span>| <span class="highlight"><?php  echo $_SESSION['u_first'] ?></span> | </span> (<span>Administrator</span>)</li>
				<a href="../inc/logout_inc.php"><li>Logout</li></a>
				<a href="../Admin/feedback.php"><li>Feedback</li> </a>
				<a href="../Admin/users.php"><li>users</li></a>
				<a href="../Admin/result.php"><li>Results</li> </a>
				<a href="../Admin/question.php"><li>Questions</li> </a>
				<a href="../Admin/examination.php"> <li><span class="highlight">Examination</li></span> </a>
				<a href="#"><li>My Account</li></a>	
 			</ul>	
	</nav>
	<?php
			if(isset($_POST['back']))
				header("Location: ../Admin/examination.php");
			
			if(isset($_POST['submit']))
			{
				$user=$_SESSION['u_id'];
				$ename=$_POST['e-name'];
				$eqst=$_POST['e-qst'];
				$eperc=$_POST['e-perc'];
				$estatus=$_POST['e-status'];
				if($estatus=='on')
					$estatus="Active";
				else
					$estatus="Inactive";

				$qu="INSERT INTO subject(sub_name,sub_qst,sub_pass,sub_status) VALUES('$ename',$eqst,$eperc,'$estatus')";
				if(mysqli_query($conn, $qu))
				{	
					$q2="SELECT sub_id from subject";
					$r=mysqli_query($conn,$q2);
					if($r)
					{
					while($res=mysqli_fetch_assoc($r))
					$subid=$res['sub_id'];
				
					$qu1="INSERT INTO user_sub(user_id,sub_id) VALUES($user,$subid)";
					$r2=mysqli_query($conn,$qu1);
					if($r2)
					header("Location: ../Admin/examination.php");
					else
						echo "Error3";
					}
					else
						echo "Error2";		
				}
				else
				{
					echo "Error1";
				}

			}
	?>
	<section id="main">
	<div>
		<div class='header'>
		<h2>New Exam</h2>
	</div>

	<form class="form" method="POST" action="add_exam.php">
		<div class="input-group">
			<label>Exam ID</label>
			<input type="number" name="e-id" placeholder= "">
		</div>
		<div class="input-group">
			<label>Exam Name</label>
			<input type="text" name="e-name">
		</div>
		<div class="input-group">
			<label>Exam Questions</label>
			<input type="Number" name="e-qst" >
		</div>
		
		<div class="input-group">
			<label>Exam Pass Percentage</label>
			<input type="number" name="e-perc" >
		</div>
		
		<div class="st">	
			<input type="checkbox" name="e-status"> Exam is Active
		</div>

		<div class="input-group">
			<button type="submit" name="submit" class="btn">Submit</button>
			<button type="reset" name="reset" class="btn">Reset</button>
			<button name="back" class="btn" value="Back"><a href="../Admin/examination.php" style="color: white">Back </a></button>
		</div>
	</form>
	</div>
	</section>



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
