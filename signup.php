<head>
	<meta charset="UTF-8">
	<title>Welcome to | Admin Homepage</title>
	<link rel="stylesheet" type="text/css" href="style/style1.css">
</head>
<body>
	<header id="heading1">
		<div class="container">
			<h1><span class="current">eExamination</span> - Online Examination System</h1>
		</div>
	</header>
	
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
		<h2>Register</h2>
	</div>

	<form class="form" method="POST" action="./inc/register_inc.php">
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
			<label>Email</label><br>
			<input type="email" name="email" required>
		</div>
		
		<div class="input-group">
			<label>Password</label>
			<input type="Password" name="password_1" required>
		</div>
		
		<div class="input-group">
			<label>Confirm Password</label>
			<input type="Password" name="password_2" required>
		</div>

		<div class="input-group">
			<button type="submit" name="submit" class="btn">Register</button>
		</div>
		<div class="input-group">
		<p>  already a member? <a href="./index.php">Sign-in </a> </p>
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

