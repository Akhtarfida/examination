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
				<li>Welcome <span>| <span class="highlight"><?php  echo $_SESSION['u_first'] ?></span> | </span> (<span>Member</span>)</li>
				<a href="../inc/logout_inc.php"><li>Logout</li></a>
				<a href="feedback.php"><li>Feedback</li> </a>
				<a href="users.php"><li><span class="highlight">Edit Profile</span></li></a>
				<a href="result.php"><li>My Results</li> </a>
				<a href="examination.php"> <li>Start Examination</li> </a>
				<?php if($prv=='Admin') { ?>
				<a href="../Admin/homepage.php"><li>Admin Panel</li></a>	
				<?php } ?>
			</ul>	
		</nav>
	<section>
		<br>
		<font color="red" size="3"><center>
			<?php 
				$er=@$_GET['signup'];
				echo $er;
			 ?>
				
			</center></font>
	</section>
	
	<section id="main">
	<div>
		<div class='header'>
		<h2>Edit Profiles</h2>
	</div>

	<form class="form" method="POST" action="../inc/edit_profile.php">
		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="first" placeholder= "" required>
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="last" required>
		</div>
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required>
		</div>
		
		
		<div class="input-group">
			<label>Old Password</label>
			<input type="Password" name="password_1" required>
		</div>
		
		<div class="input-group">
			<label>New Password</label>
			<input type="Password" name="password_2" required>
		</div>

		<div class="input-group">
			<button type="submit" name="submit" class="btn">Submit</button>
		</div>
		<div class="input-group">
		<p>  Go Back? <a href="homepage.php">Click Here! </a> </p>
		<div>
	</form>
	</div>
	</section>


		<br><br><br>





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