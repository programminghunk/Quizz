<?php

require 'connect.php';

$sql="SELECT `questionid`, `question`, `additional`, `optiona`,
		 `optionb`, `optionc`, `optiond`, `correct`, `category`, `marks` FROM `quizz_one` WHERE 1";
try {
$result=mysqli_query($con, $sql);

$count=mysqli_num_rows($result);
$i=0;
while ($i<$count) {
	$i++;
	$row=mysqli_fetch_row($result);
	echo 'Ques. ';
	echo $row[0].' ';
	echo $row[1];
	echo '<br>';
	echo 'A.'.$row[2];
	echo '<br>';
	echo 'B.'.$row[3];
	echo '<br>';
	echo 'C.'.$row[4];
	echo '<br>';
	echo 'D.'.$row[5];
	echo '<br>';
	

}
}
catch (Exception $e)
{
	echo 'Some Exception'.$e;
}
?>