<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>
Delete Quizz
</title>
</head>
<body style="background-color: #ababba">
<?php

require 'connect.php';
session_start();
$quizzs=$_SESSION['quizzs'];
$questiontoremove=$_POST['questions'];
$_SESSION['quizzsnew']=$quizzs[0];
try {
	
	$sqlo="SELECT  `list` FROM `quizz_data` WHERE `id` like '$quizzs[0]'";
	$res=mysqli_query($con, $sqlo);
	$r=mysqli_fetch_row($res);
	$setmessages=explode("+",$r[0]);
	$newarr=array_diff($setmessages, $questiontoremove);
	$length=count($newarr);
	$str='';
	if ($length>1) {
		//$getquestions="";
		foreach ($newarr as $k)
		{
			if($k!='')
			{
			$str=$str.'+'.$k;
			}
			
			
		}
		
	}
	$status_complete="UPDATE `quizz_data` SET `status`= 0 WHERE `id` like '$quizzs[0]'";
	$complete=mysqli_query($con, $status_complete);
		
//	$r[0]=$r[0].'+'.$question[0];
		$sql="UPDATE `quizz_data` SET `list`='$str' WHERE `id`='$quizzs[0]'";
		$result=mysqli_query($con, $sql);
		echo 'question removed from the quizz...';
	
}
catch (Exception $e)
{
	echo 'There is following exception'.$e;
}
?>
</body>
</html>