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
	<title>Edit Questions</title>
	<link rel="stylesheet" type="text/css" href="../style/style1.css">
</head>
<body>
	<?php

	 $id=@$_GET['update'];
	 $q="SELECT * FROM question WHERE qst_id=$id";
	 $r=mysqli_query($conn, $q);
	 while($res=mysqli_fetch_assoc($r))
	 {
	
		 $id1=$res['qst_id'];
		 $name=$res['qst_name'];
		 $sid=$res['sub_id'];
		 $status=$res['qst_status'];
	
	 }	
	 $qr="SELECT sub_name from subject where sub_id=$sid";
	 $rr=mysqli_query($conn,$qr);
	 $res=mysqli_fetch_assoc($rr);
	 $sname=$res['sub_name'];
	 $q2="SELECT * FROM option where qst_id=$id1";
	 $r2=mysqli_query($conn,$q2);
	 while($res2=mysqli_fetch_assoc($r2))
	 {
	 	$a=$res2['op_a'];
	 	$b=$res2['op_b'];
	 	$c=$res2['op_c'];
 		$d=$res2['op_d'];
 		$t=$res2['op_true'];
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
				<a href="../Admin/question.php"><li><span class="highlight">Questions </span></li> </a>
				<a href="../Admin/examination.php"> <li>Examination</li></a>
			<a href="#"><li>My Account</li></a>	
 			</ul>	
	</nav>

	<section id="main">
	<div>
		<div class='header'>
		<h2>EDIT Question</h2>
	</div>

	<form class="form" method="POST" action="edit_question1.php">
		<div class="input-group">
			<label>Exam: </label>
			<select class="op" name="qst-subject">
				<option value='<?php echo $sname; ?>'><?php echo $sname; ?></option>
				<?php
				$q="select sub_id,sub_name from subject where sub_status='Active' and sub_name!='$sname'";
				$r=mysqli_query($conn,$q);
				 while($row=mysqli_fetch_assoc($r)) {
						echo "<option>".$row['sub_name']."</option>";
					} 
				?>		
			</select>
		</div>
		<div class="input-group">
			Question ID:
			<input type="text" name="qst-id" value="<?php echo $id1;  ?>">
		</div>
		<div class="input-group">
			<label>Question</label>
			<textarea name="qst-name"><?php echo $name;  ?></textarea>
		</div>
		
		<div class="st">	
			<input type="checkbox" name="qst-status" value="Active">Active
			<select class="op" name="qst-type">
				<option>SINGLE</option>
				<option>MULTIPLE</option>
			</select>
		</div>
		<div class="input-group">
			Options:
		</div>
		<div class="input-group">	
			<label>A.</label><br>
			<textarea name="a"><?php echo $a; ?></textarea>	
		</div>
		<div class="input-group">	
			<label>B.</label><br>
			<textarea name="b"> <?php echo $b; ?></textarea>	
		</div>

		<div class="input-group">	
			<label>C.</label><br>
			<textarea name="c"><?php echo $c; ?></textarea>	
		</div>

		<div class="input-group">	
			<label>D.</label> <br>
			<textarea name="d"><?php echo $d; ?></textarea>	
		</div>
		<div class="input-group">	
			<label>Answer. </label>
			<textarea name="ans"><?php echo $t; ?></textarea>	
		</div>


		<div class="input-group">
			<button type="submit" name="submit" class="btn">Update</button>
			<button type="reset" name="reset" class="btn">Reset</button>
			<button name="back" class="btn" value="Back"><a href="../Admin/question.php" style="color: white;">Back </a></button>
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
