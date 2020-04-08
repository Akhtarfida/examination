<?php
	include 'db.php';
	$id=@$_GET['delete'];
	$q="delete from question where qst_id=$id";
	if(mysqli_query($conn,$q))
	{
		header("Location: ../admin/question.php");
	}
	else
		echo "Error";



?>