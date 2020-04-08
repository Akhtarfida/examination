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
	<?php

	 $id=@$_GET['update'];
	 $q="SELECT * FROM subject WHERE sub_id=$id";
	 $r=mysqli_query($conn, $q);
	 while($res=mysqli_fetch_assoc($r))
	 {
	
		 $id1=$res['sub_id'];
		 $name=$res['sub_name'];
		 $qst=$res['sub_qst'];
		 $pass=$res['sub_pass'];
		 $status=$res['sub_status'];
	
	 }	
?>
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

				$id=@$_GET['eid'];
				$ename=$_POST['e-name'];
				$eqst=$_POST['e-qst'];
				$eperc=$_POST['e-perc'];
				$estatus=$_POST['e-status'];
				if($estatus=='on')
					$estatus="Active";
				else
					$estatus="Inactive";

				$qu="UPDATE `subject` SET `sub_name`='$ename',`sub_qst`=$eqst,`sub_pass`=$eperc,`sub_status`='$estatus' WHERE sub_id=$id";
				if(mysqli_query($conn, $qu))
				{
					header("Location: ../Admin/examination.php");
				}

			}
	?>
	<section id="main">
	<div>
		<div class='header'>
		<h2>Edit Exam</h2>
	</div>

	<form class="form" method="POST" action="edit_exam.php?eid=<?php echo $id1; ?>">
		<div class="input-group">
		<!-- 	<label>Exam ID</label>
			<input type="number" name="e-id" value="<?php  $id1; ?>"> -->
		</div>
		<div class="input-group">
			<label>Exam Name</label>
			<input type="text" name="e-name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Exam Questions</label>
			<input type="Number" name="e-qst"  value="<?php echo $qst; ?>">
		</div>
		
		<div class="input-group">
			<label>Exam Pass Percentage</label>
			<input type="number" name="e-perc" value="<?php echo $pass; ?>">
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
