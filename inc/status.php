<?php
	include 'db.php';

	$qstid=@$_GET['id'];
	$q="Select qst_status from question where qst_id=$qstid";
	$r=mysqli_query($conn,$q);
	if($r)
	{
	$res=mysqli_fetch_assoc($r);
	
		$qst=$res['qst_status'];
	
	if($qst=='Active')
		$qst="Inactive";
	else
		$qst="Active";

	$q1="update question set qst_status='$qst' where qst_id=$qstid";
	$r1=mysqli_query($conn,$q1);
	if($r1)
		header("Location: ../admin/question.php");
	else
		echo "Error";
}
else
echo "Bad";
?>