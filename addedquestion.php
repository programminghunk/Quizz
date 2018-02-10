<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>
Delete Quizz
</title>
</head>
<body style="background-color: #ababba">
<?php
session_start();
$current=$_SESSION['current'];
require 'connect.php';
//session_start();
$quizzs=$_GET['quizzs'];
$question=$_GET['question'];
//$max=$_SESSION['maxmarks'];
//$sqlmaxmarks="";

$f=$question;
//echo $f;
$flag=0;
try {

	$sqlo="SELECT  `list`,`maxmarks` FROM `quizz_data` WHERE `id` like '$quizzs'";
	$res=mysqli_query($con, $sqlo);
	$r=mysqli_fetch_row($res);
	$maxmarks=$r[1];
	$setmessages=explode("+",$r[0]);
	$length=count($setmessages);
	
	if ($length>0) {
		
		foreach ($setmessages as $k)
		{
			if($k==$question)
			{
				$flag=1;
				//echo 'flag set';
				break;
			}
				
		}
		
		

	}
	if($flag==1)
	{
		
		echo 'This question is already added...';

	}
	else
	{
		
		$sqlfindmarks_on_this_ques="SELECT `marks` from `quizz_one` WHERE `questionid` like '$f'";	
		$resmarks=mysqli_query($con, $sqlfindmarks_on_this_ques);
		$qmarks=mysqli_fetch_row($resmarks);
	//echo 'i m alright'.$qmarks[0];
		if (($current+$qmarks[0])>$maxmarks) {
			echo "<div style='background-color: orange;'><font color='blue'>This question
				 can't be added as the Max marks for this quizz ".$maxmarks." are set";
			echo "<br> This question has ".$qmarks[0].".You can add only ".($maxmarks-$current)."question/s.</font></div>";
		}
		elseif (($current+$qmarks[0])==$maxmarks)
		{
			$status_complete="UPDATE `quizz_data` SET `status`= 1 WHERE `id` like '$quizzs'";
			$complete=mysqli_query($con, $status_complete);
			echo 'Quizz is completed successfuly...';

			$r[0]=$r[0].'+'.$f;
			//echo $r[0];
			$sql="UPDATE `quizz_data` SET `list`='$r[0]' WHERE `id` like '$quizzs'";
			$result=mysqli_query($con, $sql);
			echo '<label style="background-color:green;">question added successfully...</label>';
		}
		else {
			
		$r[0]=$r[0].'+'.$f;
		//echo $r[0];
		$sql="UPDATE `quizz_data` SET `list`='$r[0]' WHERE `id` like '$quizzs'";
		$result=mysqli_query($con, $sql);
		echo '<label style="background-color:green;">question added successfully...</label>';
		}
	
	}
	
}
catch (Exception $e)
{
	echo 'There is following exception'.$e;
}
?>
</body>
</html>





