<?php
	include 'db.php';
	
	$sub=@$_GET['qst-subject'];
	$i=$_POST['sno'];
	$n=$_POST['tno'];
	$qstid=$_POST['qstid'];
	
	$q="update question set qst_seen='read' where qst_id=$qstid";
	$r=mysqli_query($conn,$q);
	if($i>$n)
	{
		$q1="update question set qst_seen='unread';";
		$r1=mysqli_query($conn,$q1);
		$i=1;
		header("Location: ../user/result.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SET EXAM</title>
</head>
<body>
	<form method="POST" action="../user/start_exam.php"> 
			<input type="hidden" name="qst-subject" value="<?php echo $sub; ?>">
			<input type="hidden" name="sno" value="<?php echo $i; ?>">
			<input type="submit" name="submit" value="<?php echo $_POST['next']; ?>">
	</form>
</body>
</html>