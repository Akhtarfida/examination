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
	<title>Welcome to | Admin Homepage</title>
	<link rel="stylesheet" type="text/css" href="../style/style1.css">
	<style type="text/css">
		

	</style>
</head>
<body>
	<header id="heading">
		<div class="container">
			<h1><span class="current">eExamination</span> - Online Examination System</h1>
		</div>
	</header>
	<nav>
			<ul>
				<li>Welcome <span>| <span class="highlight"><?php  echo $_SESSION['u_first'] ?></span> | </span> (<span>Administrator</span>)</li>
				<a href="../inc/logout_inc.php"><li>Logout</li></a>
				<a href="feedback.php"><li>Feedback</li> </a>
				<a href="users.php"><li><span class="highlight">users</span></li></a>
				<a href="result.php"><li>Results</li> </a>
				<a href="question.php"><li>Questions</li> </a>
				<a href="examination.php"> <li>Examination</li> </a>
				<a href="../User/homepage.php"><li>My Account</li></a>	
			</ul>	
	</nav>
	<section>
			<table align="center" class="data-table">
				<tr bgcolor="#35424a">
					<td colspan="8" align="center"><span class="cur"> <?php 
						$query="SELECT COUNT(*) FROM users";
						$run=mysqli_query($conn, $query);
						$result=mysqli_fetch_assoc($run);
						echo $result['COUNT(*)']-1; 
					 	?> Members</span></td>
				</tr>
				<tr id="col">
					<th>S#</th>
					<th>Join Date</th>
					<th>Name</th>
					<th>Email</th>
					<th>Status</th>
					<th>Privilages</th>
				</tr>
				<?php
						
						$i=0;
						$q="SELECT distinct* FROM users where user_name!='Admin'";
						$r=mysqli_query($conn, $q);

						while($row=mysqli_fetch_assoc($r))
						{
							$nm=$row['user_name'];
							$em=$row['user_email'];
							$st=$row['user_status'];
							$pr=$row['user_privilages'];
							$date=$row['user_joindate'];
							$i++;
					?>	
				<tr>
				
						<td><?php echo  $i; ?></td>
						<td><?php echo $date ?></td>
						<td><?php echo  $nm; ?></td>
						<td><?php echo  $em; ?></td>
						<td><?php echo "<a href='../inc/update_inc.php?update=$nm'>".$st."</a>"; ?></td></a>
						<td><?php echo   "<a href='../inc/update_privil_inc.php?update=$nm'>".$pr."</a>"; ?></td>


				</tr>
				<?php } ?>
			</table>
			
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