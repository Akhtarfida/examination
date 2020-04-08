
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
				<a href="examination.php"> <li><span class="highlight">Examination</li></span> </a>
				<a href="../User/homepage.php"><li>User Panel</li></a>	
			</ul>	
	</nav>

		<section>
			<table align="center" class="data-table">
				<tr bgcolor="#35424a">
					<td colspan="7" align="left"><span class="cur">  <?php 
						$query="SELECT COUNT(*) FROM subject";
						$run=mysqli_query($conn, $query);
						$result=mysqli_fetch_assoc($run);
						echo $result['COUNT(*)']; 
					 	?> Exams </span>
						<a href="../inc/add_exam.php" style="text-decoration:none; color:orange; margin-left:30%;"> Add New Examination </a>
						</td>
				</tr>
				<tr id="col">
					<th >S#</th>
					<th >Name</th>
					<th>Member Name</th>
					<th >Status</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
						$i=0;
						$q="SELECT * FROM `users`,`user_sub`,`subject` where `users`.`user_id`=`user_sub`.user_id and `user_sub`.`sub_id`=`subject`.`sub_id`";
						$r=mysqli_query($conn, $q);
						while($row=mysqli_fetch_assoc($r))
						{
							$id=$row['sub_id'];
							$nm=$row['sub_name'];
							$qst=$row['sub_qst'];
							$st=$row['sub_status'];
							$mnm=$row['user_name'];
							$i++;
					?>	
				<tr>
				
						<td><?php echo  $i; ?></td>
						<td><?php echo  $nm; ?></td>
						<td><?php echo  $mnm; ?></td>
						<td><?php echo  $st; ?></td>
						<td><a href='../inc/edit_exam.php?update=<?php echo $id ?>'>Edit</a></td>
						<td><a href='../inc/delete_exam.php?delete=<?php echo $id ?>'>Delete</a></td>
				</tr>
				<?php }  
					
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
				<a href="feedback.php"><li>Feedback</li> </a>
				<a href="result.php"><li>Results</li> </a>
				<a href="question.php"><li>Questions</li> </a>
				<a href="examination.php"> <li><span class="highlight">Examination</li></span> </a>
				<a href="../User/homepage.php"><li>User Panel</li></a>	
			</ul>	
	</nav>
	<section>
			<table align="center" class="data-table">
				<tr bgcolor="#35424a">
					<td colspan="6" align="left"><span class="cur">  <?php 
						$query="SELECT COUNT(*) FROM user_sub where user_id=$user";
						$run=mysqli_query($conn, $query);
						$result=mysqli_fetch_assoc($run);
						echo $result['COUNT(*)']; 
					 	?> Exams </span>
						<a href="../inc/add_exam.php" style="text-decoration:none; color:orange; margin-left:30%;"> Add New Examination </a>
						</td>
				</tr>
				<tr id="col">
					<th >S#</th>
					<th >Name</th>
					<th >Questions</th>
					<th >Status</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
						$i=0;
						$q="SELECT * FROM `users`,`user_sub`,`subject` WHERE `users`.`user_id`=$user 
						AND `users`.`user_id`=`user_sub`.`user_id` AND `user_sub`.`sub_id`=`subject`.`sub_id`";

						$r=mysqli_query($conn, $q);
						if(mysqli_num_rows($r)>0)
						{
						while($row=mysqli_fetch_assoc($r))
						{
							$id=$row['sub_id'];
							$nm=$row['sub_name'];
							$qst=$row['sub_qst'];
							$st=$row['sub_status'];
							$i++;
					?>	
				<tr>
				
						<td><?php echo  $i; ?></td>
						<td><?php echo  $nm; ?></td>
						<td><?php echo  $qst; ?></td>
						<td><?php echo  $st; ?></td>
						<td><a href='../inc/edit_exam.php?update=<?php echo $id ?>'>Edit</a></td>
						<td><a href='../inc/delete_exam.php?delete=<?php echo $id ?>'>Delete</a></td>
				</tr>
				<?php }  
					}
				}
					?>
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






