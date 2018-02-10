<?php

require 'connect.php';
if (isset($_GET['maxmarks']) && $_GET['maxmarks']=='') {
	$mmerr='Choose max marks option';
}else {
	$mmerr='';
}
if (isset($_GET['minmarks']) && $_GET['minmarks']=='') {
	$minerr='Choose min marks option';
}
else {
	$minerr='';
}
if (isset($_GET['maxtime']) && $_GET['maxtime']=='') {
	$mterr='Choose max max time option';
}else {
	$mterr='';
}
if (isset($_GET['nos']) && $_GET['nos']=='') {
	$noserr='Choose number of sections option';
}
else {
	$noserr='';
}
if (isset($_GET['level']) && $_GET['level']=='') {
	$lerr='Choose level of assessment option';
}
else {
	$lerr='';
}
if (isset($_GET['category']) && $_GET['category']=='') {
	$cerr='Choose category option';
}
else{
	$cerr='';
}
$totalerr=$mmerr.$minerr.$mterr.$noserr.$lerr.$cerr;

if (isset($_GET['quizzname']) && ($_GET['quizzname']!='') && ($totalerr == '')) {
	$quizzname=$_GET['quizzname'];
	$maxmarks=$_GET['maxmarks'];
	$minmarks=$_GET['minmarks'];
	$maxtime=$_GET['maxtime'];
	$nos=$_GET['nos'];
	$level=$_GET['level'];
	$category=$_GET['category'];

try {
$sql="INSERT INTO `quizz_data`(`name`, `maxtime`, `maxmarks`, `minmarks`,
		 `nos`, `level`, `category`) VALUES ('$quizzname','$maxtime','$maxmarks',
		'$minmarks','$nos','$level','$category')";
$result=mysqli_query($con, $sql);
echo '<div class="w3-green w3-panel">Quizz '.$quizzname.' created successfully</div>';
//echo "maxmarks=".$maxmarks;
}
catch (Exception $e)
{
	echo 'There is following exception'.$e;
}
}else 
{
	$totalerr=$mmerr.'<br>'.$minerr.'<br>'.$mterr.'<br>'.$noserr.'<br>'.$lerr.'<br>'.$cerr;
	echo '<div class="w3-red w3-panel">Quizz name must be specified...<br>'.$totalerr.'</div>';
}
?>