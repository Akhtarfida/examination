<?php
	session_start();
	if(isset($_SESSION['u_uid']))
	{
		include '../inc/db.php';
		$user=$_SESSION['u_id'];
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
				<a href="users.php"><li>Edit Profile</li></a>
				<a href="result.php"><li><span class="highlight">My Results</span></li> </a>
				<a href="examination.php"> <li>Start Examination </span></li> </a>
				<?php if($prv=='Admin') { ?>
				<a href="../Admin/homepage.php"><li>Admin Panel</li></a>	
				<?php } ?>
			</ul>	
		</nav>
			<section>
			<table align="center" class="data-table">
				<tr bgcolor="#35424a">
					<td colspan="6" align="left"><span class="cur">  <?php 
						$query="SELECT COUNT(*) FROM `result` where user_id=$user";
						
						$run=mysqli_query($conn, $query);
						$result=mysqli_fetch_assoc($run);
						echo $result['COUNT(*)']; 
					 	?>, Result Found </span>
						</td>
				</tr>
				<tr id="col">
					<th >S#</th>
					<th >Exam</th>
					<th >Examination Date</th>
					<th >Result</th>
					<th>Percentage</th>
				</tr>
				<?php
						$i=0;
						$q="SELECT * FROM `users`,`result`,`subject` WHERE `users`.`user_id`=$user 
						AND `users`.`user_id`=`result`.`user_id` AND `result`.`sub_id`=`subject`.`sub_id`";

						$r=mysqli_query($conn, $q);
						if(mysqli_num_rows($run)>0)
						{
						while($row=mysqli_fetch_assoc($r))
						{
							$subname=$row['sub_name'];
							$res1=$row['result'];
							$date=$row['exam_date'];
							$perc=$row['res_perc'];
							$i++;
					?>	
				<tr>
				
						<td><?php echo  $i; ?></td>
						<td><?php echo  $subname; ?></td>
						<td><?php echo  $date; ?></td>
						<td><?php echo  $res1; ?></td>
						<td><?php echo $perc; ?></td>
				</tr>
				<?php } } ?>
			</table>
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
