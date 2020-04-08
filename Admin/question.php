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
		if($uname=='Admin'){
	 ?>
	<nav>
			<ul>
				<li>Welcome <span>| <span class="highlight"><?php  echo $_SESSION['u_first'] ?></span> | </span> (<span>Administrator</span>)</li>
				<a href="../inc/logout_inc.php"><li>Logout</li></a>
				<a href="feedback.php"><li>Feedback</li> </a>
				<a href="users.php"><li>users</li></a>
				<a href="result.php"><li>Results</li> </a>
				<a href="question.php"><li><span class="highlight">Questions</span></li> </a>
				<a href="examination.php"> <li>Examination</li> </a>
				<a href="../User/homepage.php"><li>User Panel</li></a>	
			</ul>	
	</nav>
		<section>
			<table align="center" class="data-table">
				<tr bgcolor="#35424a">
					<td colspan="8" align="left"><span class="cur">  <?php 
						$query="SELECT COUNT(*) FROM question";
						$run=mysqli_query($conn, $query);
						$result=mysqli_fetch_assoc($run);
						echo $result['COUNT(*)']; 
					 	?> Questions </span>
						<a href="../inc/add_question.php" style="text-decoration:none; color:orange; margin-left:30%;"> Add New Question </a>
						</td>
				</tr>
				<tr id="col">
					<th >Qst ID</th>
					<th >Examination</th>
					<th >Question</th>
					<th>Member Name</th>
					<th>Status</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
						$q="SELECT * FROM `users`,`user_qst`,`question`,`subject` WHERE `users`.`user_id`=`user_qst`.`user_id` AND `user_qst`.`qst_id`=`question`.`qst_id` AND `subject`.`sub_id`=`question`.`sub_id`";
						$r=mysqli_query($conn, $q);
						while($row=mysqli_fetch_assoc($r))
						{
							$id=$row['qst_id'];
							$sub_name=$row['sub_name'];
							$qst=$row['qst_name'];
							$st=$row['qst_status'];
							$mnm=$row['user_name'];
			
					?>	
				<tr>
						<td><?php echo  $id; ?></td>
						<td><?php echo  $sub_name; ?></td>
						<td><?php echo  $qst; ?></td>
						<td><?php echo  $mnm; ?></td>
						
						<td><a href="../inc/status.php?id=<?php echo $id ?>"> <?php echo  $st; ?></a></td>
						<td><a href='../inc/edit_question.php?update=<?php echo $id ?>'>Edit</a></td>
						<td><a href='../inc/delete_question.php?delete=<?php echo $id ?>'>Delete</a></td>
				</tr>
				<?php } 
				 ?>
			</table>
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
				<a href="question.php"><li><span class="highlight">Questions</span></li> </a>
				<a href="examination.php"> <li>Examination</li> </a>
				<a href="../User/homepage.php"><li>User Panel</li></a>	
			</ul>	
	</nav>
		<section>
			<table align="center" class="data-table">
				<tr bgcolor="#35424a">
					<td colspan="6" align="left"><span class="cur">  <?php 
						$query="SELECT COUNT(*) FROM user_qst where user_id=$user";
						$run=mysqli_query($conn, $query);
						$result=mysqli_fetch_assoc($run);
						echo $result['COUNT(*)']; 
					 	?> Questions </span>
						<a href="../inc/add_question.php" style="text-decoration:none; color:orange; margin-left:30%;"> Add New Question </a>
						</td>
				</tr>
				<tr id="col">
					<th >Qst ID</th>
					<th >Examination</th>
					<th >Question</th>
					<th>Status</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<?php
						$q="SELECT * FROM `users`,`user_qst`,`question`,`subject` WHERE `users`.`user_id`=$user 
						AND `users`.`user_id`=`user_qst`.`user_id` AND `user_qst`.`qst_id`=`question`.`qst_id`
						AND `subject`.`sub_id`=`question`.`sub_id`";

						$r=mysqli_query($conn, $q);
						if(mysqli_num_rows($r)>0)
						{
						while($row=mysqli_fetch_assoc($r))
						{
							$id=$row['qst_id'];
							$sub_name=$row['sub_name'];
							$qst=$row['qst_name'];
							$st=$row['qst_status'];
					?>	
				<tr>
						<td><?php echo  $id; ?></td>
						<td><?php echo  $sub_name; ?></td>
						<td><?php echo  $qst; ?></td>
						<td><a href="../inc/status.php?id=<?php echo $id ?>"> <?php echo  $st; ?></a></td>
						<td><a href='../inc/edit_question.php?update=<?php echo $id ?>'>Edit</a></td>
						<td><a href='../inc/delete_question.php?delete=<?php echo $id ?>'>Delete</a></td>
				</tr>
				<?php } } }
				 ?>
			</table>
	</section>

<?php 

 ?>
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