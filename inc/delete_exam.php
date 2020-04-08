<?php
	include_once 'db.php';
	$id=@$_GET['delete'];
	$q="delete from subject where sub_id=$id";
	if(mysqli_query($conn,$q))
	{
		header("Location: ../Admin/examination.php");
	}


?>