<?php

$con=mysqli_connect("","root","","quizz");
//$conn=mysqli_connect("","root","","test");
if (mysqli_connect_errno($con))
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
