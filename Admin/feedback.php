<?php
	session_start();
	if(isset($_SESSION['u_uid']))
	{
		include '../inc/db.php';
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
		if($uname=='Admin'){
 ?>		
	<nav>
			<ul>
				<li>Welcome <span>| <span class="highlight"><?php  echo $_SESSION['u_first'] ?></span> | </span> (<span>Administrator</span>)</li>
				<a href="../inc/logout_inc.php"><li>Logout</li></a>
				<a href="feedback.php"><li><span class="highlight">Feedback </span></li> </a>
				<a href="users.php"><li>users</li></a>
				<a href="result.php"><li>Results</li> </a>
				<a href="question.php"><li>Questions</li> </a>
				<a href="examination.php"> <li>Examination</li></a>
				<a href="../User/homepage.php"><li>User Panel</li></a>	
			</ul>	
	</nav>

		<section>
			<table align="center" class="data-table">
				<tr bgcolor="#35424a">
					<td colspan="6" align="left"><span class="cur"> FeedBacks </span>
						</td>
				</tr>
				<tr id="col">
					<th >S#</th>
					<th >Subject</th>
					<th >FeedBack</th>
					<th >From</th>
				</tr>
				<?php
						$i=0;
						$q="SELECT * FROM `users`,`feedback` WHERE `users`.`user_id`=`feedback`.`user_id`";
						$r=mysqli_query($conn, $q);
						if(mysqli_num_rows($r)>0)
						{
						while($row=mysqli_fetch_assoc($r))
						{
							$id=$row['fdb_id'];
							$nm=$row['fdb_subject'];
							$qst=$row['fdb'];
							$st=$row['user_name'];
							$i++;
					?>	
				<tr>
				
						<td><?php echo  $i; ?></td>
						<td><?php echo  $nm; ?></td>
						<td><?php echo  $qst; ?></td>
						<td><?php echo  $st; ?></td>
				</tr>
				<?php } 
						}
				
					?>
			</table>
	</section>


		<?php }
			else{
		 ?>
	<nav>
			<ul>
				<li>Welcome <span>| <span class="highlight"><?php  echo $_SESSION['u_first'] ?></span> | </span> (<span>Administrator</span>)</li>
				<a href="../inc/logout_inc.php"><li>Logout</li></a>
				<a href="feedback.php"><li><span class="highlight">Feedback </span></li> </a>
				<a href="result.php"><li>Results</li> </a>
				<a href="question.php"><li>Questions</li> </a>
				<a href="examination.php"> <li>Examination</li></a>
				<a href="../User/homepage.php"><li>User Panel</li></a>	
			</ul>	
	</nav>
		<section>
			<table align="center" class="data-table">
				<tr bgcolor="#35424a">
					<td colspan="6" align="left"><span class="cur"> FeedBacks </span>
						</td>
				</tr>
				<tr id="col">
					<th >S#</th>
					<th >Subject</th>
					<th >FeedBack</th>
					<th >From</th>
				</tr>
				<?php
						$i=0;
						$q="SELECT * FROM `users`,`feedback` WHERE `users`.`user_id`=`feedback`.`user_id`";
						$r=mysqli_query($conn, $q);
						if(mysqli_num_rows($r)>0)
						{
						while($row=mysqli_fetch_assoc($r))
						{
							$id=$row['fdb_id'];
							$nm=$row['fdb_subject'];
							$qst=$row['fdb'];
							$st=$row['user_name'];
							$i++;
					?>	
				<tr>
				
						<td><?php echo  $i; ?></td>
						<td><?php echo  $nm; ?></td>
						<td><?php echo  $qst; ?></td>
						<td><?php echo  $st; ?></td>
				</tr>
				<?php } 
						}
				
					?>
			</table>
	</section>



<?php } ?>
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