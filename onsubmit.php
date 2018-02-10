<!DOCTYPE html>
<html>
<head>
<title>Start Quizz</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="http://localhost/jobsnickers/jquery-1.12.0.min.js"></script>
<script src="http://localhost/jobsnickers/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page">
  <div data-role="main" class="ui-content">
<div data-role="header">
    <h2><font color=green>JobSneakers</font></h2>
    <h3><font color=orange>Result</font></h3>
  </div>
<label style="background-color: #accad2;"><font color=green>Do not REFRESH or BACK BUTTON</font></label>
<?php
session_start();
$fetched=$_SESSION['fetch'];
$correct=$_SESSION['correct'];
$marks=$_SESSION['marks'];

$i=1;
while($i<$fetched){
	
	if(isset($_POST['rad'.$i]))
	{
	$getanswerss[$i]=$_POST['rad'.$i];
	
	}
	else {
		$getanswerss[$i]=20;
	}
	$i++;
}
$count=1;
$addmarks=0;
echo '<table border="2" style="background-color:#ccbbaa;">
  		<tr><td style="color:blue;">Q No.</td><td style="color:blue;>Answer
  		</td><td style="color:blue;">Answer</td><td style="color:blue;">Choice</td><td style="color:blue;">Marks Obtained</td></tr>';
foreach ($getanswerss as $answers)
{
	$j=0;
	switch ($answers)
	{
		case 1:
			$right='A';
			break;
		case 2:
			$right='B';
			break;
		case 3:
			$right='C';
			break;
		case 4:
			$right='D';
			break;
		default:
			$right="NF";
			break;
	
	}
	if($answers==$correct[$count])
	{
		
		echo '<tr><td style="color:blue;">'.$count.'</td><td align="center">'.$right.'</td><td style="color:green;">Correct</td>';
		echo '<td align="center">'.$marks[$count].'</td></tr>';
		$addmarks=$addmarks+$marks[$count];
	}
	else 
	{
		if($right=='NF')
		{
			
			echo '<tr><td style="color:blue;">'.$count.'</td><td align="center">'.$right.'</td><td style="color:red;">
					Not Attempted</td>';
			echo '<td align="center"> 0 </td></tr>';
		}
		else {
		$addmarks=$addmarks - 0.33;
		echo '<tr><td style="color:blue;">'.$count.'</td><td align="center">'.$right.'</td><td style="color:red;">Wrong</td>';
		echo '<td align="center"> -0.33</td></tr>';
		}
		}
	$j++;
	$count++;
}
echo '</table>';
echo '<br>You have got TOTAL '.$addmarks. ' marks';
echo '<br>Thank you for taking the quizz';

?>

  </div>

  <div data-role="footer">
   <h4 >Developed By<font color=red> #JobSneakers</font></h4>
  </div>

</div>


</body>
</html>
