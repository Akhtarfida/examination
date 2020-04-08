<?php
	session_start();
	

	if(isset($_SESSION['u_uid']))
	{
		include '../inc/db.php';
		$prv=$_SESSION['u_prvlge'];
		$prv=$_SESSION['u_prvlge'];
		
		$user=$_SESSION['u_id'];
		$uname=$_SESSION['u_uid'];
		if(isset($_POST['back']))
		{
			header("Location: homepage.php");
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
				<a href="feedback.php"><li><span class="highlight">Feedback</span>	</li> </a>
				<a href="users.php"><li>Edit Profile</li></a>
				<a href="result.php"><li>My Results</li> </a>
				<a href="examination.php"> <li>Start Examination</li> </a>
				<?php if($prv=='Admin') { ?>
				<a href="../Admin/homepage.php"><li>Admin Panel</li></a>	
				<?php } ?>
			</ul>	
		</nav>

		<section style="margin-top: 40px;" id="ss">
			<form action="feedback.php" method="POST">
			
			<div class="container" style="margin: auto; width: 30%; height: 30%; border:3px solid #e8491d; background-color:#35424a; width: 35%; border-radius: 15px;">
				
					<div id="hd" style="border-bottom: 2px solid #e8491d; background-color: #35424a; color: white;padding: 5px;">
						<label for="" style="font-size: 18px;">Send Feedback</label>
					</div>
					
					<div id="data" style="margin: auto; padding: 20px; line-height:25px;">
						<label  style="color:orange; margin-left: 0%;"><b> Subject</b></label> <br>
						<input type="text" name="subject" style="border-radius: 5px;  width: 70%;"> <br>
						<label  style="color:orange; margin-left: 0%;"><b> Your Feedback </b> </label><br>
						<textarea name="feed"></textarea>
					</div>

				<div class="container" style="margin:0; padding: 0px 20px 10px 25px;">
							<button class="btn1" name="back" style="width: 25%;">Back</button> 
							<button type="submit" class="btn1" name="sub"  style="width: 25%;">Submit</button>  
					</div>
					
			</div>
			</form>
		</section>


		<br><br><br>





			<footer id="f">
		<p> &copy; eExamination 2017 Developed by : M. Akhtar</p>
	</footer>

</body>
</html>
<?php
if(isset($_POST['sub']))
{
	$sub=$_POST['subject'];
	$feed=$_POST['feed'];
	if(!empty($sub)||!empty($feed))
	{
		$q="INSERT INTO `feedback`(fdb_subject,fdb,user_id)VALUES('$sub','$feed',$user)";
		$r=mysqli_query($conn,$q);
		if($r)
		header("Location: homepage.php?msg= Feedback Received!!");
		else
			header("Location: feedback.php?msg=Error");		
		
	}
 }
}
	else
	{
		include 'logout_inc.php';
		header("Location: ../index.php?msg=Login First");
	}
?>