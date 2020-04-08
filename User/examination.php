<?php
	session_start();

	if(isset($_SESSION['u_uid']))
	{
		include "../inc/db.php";
		$prv=$_SESSION['u_prvlge'];
	
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
			<form action="start_exam.php" method="POST">
			
			<div class="container" style="margin: auto; width: 30%; height: 30%; border:3px solid #e8491d; background-color:#35424a; width: 35%; border-radius: 15px;">
				
					<div id="hd" style="border-bottom: 2px solid #e8491d; background-color: #35424a; color: white;padding: 5px;">
						<label for="" style="font-size: 18px;">Start Examination</label>
					</div>
					
					<div id="data" style="margin: auto; padding: 30px;">
						<label  style="color:orange;"> Select Examination</label> <br>
						<select class="op" name="qst-subject" style="	 color:black; margin-top: 10px; margin-left: 0px; padding: 2px;">
						<?php
							$q="select sub_id,sub_name from subject where sub_status='Active'";
							$r=mysqli_query($conn,$q);
			     			 while($row=mysqli_fetch_assoc($r)) {
								echo "<option>".$row['sub_name']."</option>";
							} 
						?>		
						</select>
					</div>

					<div class="container" style="margin:0; padding: 0px 20px 10px 25px;">
							<input type="hidden" name="sno" value="<?php  echo "1"; ?>">
							<button class="btn1" name="start" type="submit">Start Exam</button>
					</div>
					
			</div>
			</form>
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