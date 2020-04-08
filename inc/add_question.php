<?php
	session_start();

	if(isset($_SESSION['u_uid']))
	{
		include_once '../inc/db.php';
		$user=$_SESSION['u_id'];
		$uname=$_SESSION['u_uid'];
		
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Add Question</title>
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
				<a href="../Admin/question.php"><li><span class="highlight">Questions </span></li> </a>
				<a href="../Admin/examination.php"> <li>Examination</li></a>
				<a href="#"><li>My Account</li></a>	
 			</ul>	
	</nav>
	<section id="main">
	<div>
		<div class='header'>
		<h2>ADD Question</h2>
	</div>

	<form class="form" method="POST" action="add_question1.php">
		<div class="input-group">
			<label>Exam: </label>
			<select class="op" name="qst-subject">
				<?php
				$q="SELECT * FROM `user_sub`,`subject` where  `user_sub`.`sub_id`=`subject`.`sub_id` AND `user_sub`.`user_id`=$user";
				$r=mysqli_query($conn,$q);
				
				if(mysqli_num_rows($r)<1) 
					header("Location: ../Admin/examination.php? Add Subject ");
				
				 while($row=mysqli_fetch_assoc($r)) {
						echo "<option>".$row['sub_name']."</option>";
					}

				?>		
			</select>
		</div>
		<div class="input-group">
				Question ID:
				<?php
					$qry="SELECT MAX(qst_id) FROM `question`";
					$run=mysqli_query($conn,$qry);
					$res=mysqli_fetch_assoc($run);
			
				?>
			<input type="text" name="qst-id" value="<?php echo $res['MAX(qst_id)']+1;  ?>">
		</div>
		<div class="input-group">
			<label>Question</label>
			<textarea name="qst-name" ></textarea>
		</div>
		
		<div class="input-group">
			Options:
		</div>
		<div class="input-group">	
			<label>A.</label><br>
			<textarea name="a"></textarea>	
		</div>
		<div class="input-group">	
			<label>B.</label><br>
			<textarea name="b"></textarea>	
		</div>

		<div class="input-group">	
			<label>C.</label><br>
			<textarea name="c"></textarea>	
		</div>

		<div class="input-group">	
			<label>D.</label> <br>
			<textarea name="d"></textarea>	
		</div>
		<div class="input-group">	
			<label>Answer. </label>
			<textarea name="ans"></textarea>	
		</div>


		<div class="input-group">
			<button type="submit" name="submit" class="btn">ADD</button>
			<button type="reset" name="reset" class="btn">Reset</button>
			<button name="back" class="btn" value="Back"><a href="../Admin/question.php" style="color: white">Back </a></button>
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
