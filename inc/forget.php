<head>
	<meta charset="UTF-8">
	<title>Welcome to | Admin Homepage</title>
	<link rel="stylesheet" type="text/css" href="../style/style1.css">
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
		<h2>Change Password</h2>
	</div>

	<form class="form" method="POST" action="forget_inc.php">

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
				<p> Not yet a member <a href="signup.php">Sign-up</a>


	</form>
	</div>
	</section>
	
	<br><br><br>
	<footer id="f">
		<p> &copy; eExamination 2017 Developed by : M. Akhtar</p>
	</footer>

</body>
</html>

