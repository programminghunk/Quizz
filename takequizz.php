<!DOCTYPE html>
<html>
<head>
<title>Start Quizz</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="http://localhost/jobsnickers/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="http://localhost/jobsnickers/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="http://localhost/jobsnickers/jquery-1.12.0.min.js"></script>
<script type="text/javascript">

function preventBack(){window.history.forward();}
setTimeout("preventBack()", 0);
window.onunload=function(){null};

</script>
</head>
<body style="background-color: #ababba">
<form action="startquizz.php" method="post">
<label> SELECT QUIZZ</label><br>
<select name="choosequizz">
<?php
require 'connect.php';
session_start();
$_SESSION['starting']=1;
$sqlfetchquizz="SELECT `id`,`name` FROM `quizz_data` WHERE 1";
try {
	$result=mysqli_query($con, $sqlfetchquizz);
	$num_of_quizzes=mysqli_num_rows($result);
	$i=0;
	
	while ($i<$num_of_quizzes)

	{
		$row=mysqli_fetch_row($result);
		
		echo "<option value='$row[0]'>";
		echo $row[1].'</option>';
		$i++;
		
	}
	
} catch (Exception $e) {
	
	echo "there is some connection issue::".$e;
}

?>
</select>
<input type="submit" value="Start Quizz" style="outline-color: red; background-color: green;">
</form>
</body>
</html>