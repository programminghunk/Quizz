<?php
session_start();


require 'connect.php';

$question=$_POST['question'];
$additional=$_POST['additional'];
$optiona=$_POST['optiona'];
$optionb=$_POST['optionb'];
$optionc=$_POST['optionc'];
$optiond=$_POST['optiond'];
$correct=$_POST['correct'];
$category=$_POST['category'];
$marks=$_POST['marks'];
try {
	$file   =$_FILES['fileToUpload']['tmp_name'];
	//$image_check = getimagesize($_FILES['fileToUpload']['tmp_name']);
	if(empty($file)){
		$image=null;
	}else{
	$image = addslashes(file_get_contents($_FILES['fileToUpload']['tmp_name']));
	}
$sql="INSERT INTO `quizz_one`(`question`, 
		`additional`, `optiona`, `optionb`, `optionc`, `optiond`, `correct`, `category`, `marks`,`support`) 
VALUES ('$question','$additional','$optiona','$optionb','$optionc','$optiond','$correct','$category','$marks','$image')";
$result=mysqli_query($con, $sql);
echo 'Question added successfully...';
}
catch (Exception $e)
{
	echo 'There is following exception'.$e;
}

?>