<?php
		session_start();
           
 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Signin page</title>
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
                
				$er= @$_GET['login'];
				echo "<b>".$er."</b>";
                             
                               
			 ?>
				
			</center></font>
	</section>
	<section id="main">
	<div>
		<div class='head'>
		<h2>Sign in</h2>
            
	</div>

	<form class="form1" method="POST" action="inc/login_inc.php">
		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Username/Email">
		</div>
		
		
		<div class="input-group">
			<label>Password</label>
			<input type="Password" name="password_1" placeholder="Enter Password">
		</div>
		
		<div class="input-group">
			<button type="submit" name="login" class="btn">Login</button>
		</div>
		<div class="input-group">
		<p> Not yet a member <a href="signup.php">Sign-up</a>
			<br>
			<a href="inc/forget.php">Forgot Password?</a>
		</div>
	</form>
	</div>
	</section>
	
	
	<br><br>
	<footer id="f">
		<p> &copy; eExamination 2017 Developed by : M. Akhtar</p>
	</footer>

</body>
</html>