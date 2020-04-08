<?php 
	session_start(); 

	if(isset($_SESSION['u_uid']))
	{
				$prv=$_SESSION['u_prvlge'];

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Welcome to | Homepage</title>
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
				<a href="examination.php"> <li>Start Examination</li> </a>
				<?php if($prv=='Admin') { ?>
				<a href="../Admin/homepage.php"><li>Admin Panel</li></a>	
				<?php } ?>
		</ul>	
		</nav>
	
	<section id="main">
		<div class="middle">
			<h3>Welcome to eExamination</h3>
			<img src="exam.png" alt="exam pic">
			<h3>Online Examination System</h3>
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