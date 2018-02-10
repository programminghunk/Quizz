<?php

require 'connect.php';
//session_start();
//$quizzs=$_SESSION['quizzs'];
session_start();

//echo $_GET['classes'];
$cat=$_GET['classes'];
//echo <select id=>
try {
	$sql="SELECT * FROM `quizz_one` WHERE `category` like '$cat'";
	$result=mysqli_query($con, $sql);

	$i=1;

	while($i<=mysqli_num_rows($result))
	{
		$row=mysqli_fetch_row($result);
		$_SESSION['take']=$row;
		echo '<input type="radio" name="question" id="question" class="question" class="question" value="'.$row[0].'" checked="checked">';
		echo $i.' '.$row[0].' '.$row[1].'<br>';
		$i++;
	}


}
catch (Exception $e)
{
	echo 'There is following exception'.$e;
}



?>