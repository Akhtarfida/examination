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
	<title>Welcome to | Admin Homepage</title>
	<link rel="stylesheet" type="text/css" href="../style/style1.css">
</head>
<body>
	<header id="heading">
		<div class="container">
			<h1><span class="current">eExamination</span> - Online Examination System</h1>
		</div>
	</header>
	<?php  
	if($uname=='Admin')
	{
		?>
	<nav>
			<ul>
				<li>Welcome <span>| <span class="highlight"><?php  echo $_SESSION['u_first'] ?></span> | </span> (<span>Administrator</span>)</li>
				<a href="../inc/logout_inc.php"><li>Logout</li></a>
				<a href="feedback.php"><li>Feedback</li> </a>
				<a href="users.php"><li>users</li></a>
				<a href="result.php"><li>Results</li> </a>
				<a href="question.php"><li>Questions</li> </a>
				<a href="examination.php"> <li>Examination</li> </a>
				<a href="../User/homepage.php"><li>User Panel</li></a>	
			</ul>	
		</nav>
	
	<section id="main">
		<div class="middle">
			<h3>Welcome to eExamination</h3>
			<img src="exam.png" alt="exam pic">
			<h3>Online Examination System</h3>
		</div>
	</section>
	<?php 
			}
			else{
	 ?>
	<nav>
			<ul>
				<li>Welcome <span>| <span class="highlight"><?php  echo $_SESSION['u_first'] ?></span> | </span> (<span>Administrator</span>)</li>
				<a href="../inc/logout_inc.php"><li>Logout</li></a>
				<a href="feedback.php"><li>Feedback</li> </a>
				<a href="result.php"><li>Results</li> </a>
				<a href="question.php"><li>Questions</li> </a>
				<a href="examination.php"> <li>Examination</li> </a>
				<a href="../User/homepage.php"><li>User Panel</li></a>	
			</ul>	
		</nav>

	<section id="main">
		<div class="middle">
			<h3>Welcome to eExamination</h3>
			<img src="exam.png" alt="exam pic">
			<h3>Online Examination System</h3>
		</div>
		<?php } ?>
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