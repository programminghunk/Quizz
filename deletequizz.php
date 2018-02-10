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

$quizz=$_POST['quizz'];



try {
$sql="DELETE FROM `quizz_data` WHERE `id` like '$quizz[0]'";
$result=mysqli_query($con, $sql);
echo 'quizz has been deleted...';
}
catch (Exception $e)
{
	echo 'There is following exception'.$e;
}
?>
</body>
</html>