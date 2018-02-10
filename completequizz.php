<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>
Complete Quizz
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="http://localhost/jobsnickers/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>

<script src="http://localhost/jobsnickers/jquery-1.12.0.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){

    $('select[name="classes"]').change(function(){
        $.get('get_ques_by_category.php', { classes : $("#classes").val()}, function(data){
            // use .append(data), if you don't want to remove the previous content
            $('#result').html(data);
//            $('#loadme').html(data);
            
        });
    });
});

</script>

<script type="text/javascript">
$(document).ready(function(){

    $('#add').click(function(){
        $.get('addedquestion.php', { question : $("input[type=radio][name=question]:checked" ).val(),
        	 quizzs : $('#quizzs').val() }, function(data){
            // use .append(data), if you don't want to remove the previous content
            $('#results').html(data);
            
        });
    });
});

</script>


<script type="text/javascript">
function myFunction() {
   location.reload();
   //alert("Question added successfully...");
}

</script>
</head>
<body style="background-color: #ababba">
<label style="background-color: #789012">Available questions questions</label><br>
<hr>
<!--  <form action="addedquestion.php" method="post">-->

<select name="classes" id="classes">
 <?php 
 require 'connect.php';
 $qry="Select * from `categories` Where 1";
 $cats=mysqli_query($con, $qry);
 $num=mysqli_num_rows($cats);
 $i=0;
 while($i<$num)
 {
 	$rowcat=mysqli_fetch_row($cats);
 	echo "<option value=$rowcat[1]>$rowcat[1]</option>";
 	$i++;
 }
 
 ?>
</select><br>
<div id="result" class="result"></div>
<div id="results" class="results"></div>
<?php

require 'connect.php';

session_start();

if(isset($_POST['quizzs']))
{
	$quizzs=$_POST['quizzs'];
	$_SESSION['quizzs']=$_POST['quizzs'];
}elseif (isset($_SESSION['quizzsnew']))
{
	$quizzs=$_SESSION['quizzs'];
	$_SESSION['quizzs']=$_SESSION['quizzsnew'];
}
else 
{
	$quizzs=$_SESSION['quizzs'];
}
$_SESSION['quizzs']=$quizzs;
echo '<input type="hidden" id="quizzs" value="'.$quizzs[0].'"> ';
//$_SESSION['quizzs']=$quizzs;
?>

<button id="add" >add</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button id="refresh" onclick="myFunction()">refresh</button>


<!-- </form> -->
<hr>
<label style="background-color: #789012">All Ready added questions</label><br>
<div id="quizzq">
<form action="del_ques_from_quizz.php" method="post">
<div id="loadme"></div>
<?php
//$quizzs=$_POST['quizzs'];
$_SESSION['quizzs']=$quizzs;
echo '<input type="hidden" id="quizzs" value="'.$quizzs[0].'"> ';
$sqladdedquestion="SELECT `list` from `quizz_data` WHERE `id` like '$quizzs[0]'";

$resultn=mysqli_query($con, $sqladdedquestion);
$ques_ids=mysqli_fetch_row($resultn);
$allquestions=explode("+", $ques_ids[0]);
$count=1;
$marks=0;
//$_SESSION['max']=$ques_ids[1];
foreach ($allquestions as $k)
{
	$getquestion="SELECT `question`,`category`,`marks` from `quizz_one` WHERE `questionid` like '$k'";
	$resultques=mysqli_query($con, $getquestion);
	$question=mysqli_fetch_row($resultques);

	
	if ($question[0]!='')
	{
		echo '<input type="radio" name="questions[]" id="questions" class="questions" value="'.$k.'" checked="checked">';
		echo $count;
		$count++;
	echo '.'.$question[0].' Category:'.$question[1].'Marks:'.$question[2].'<br>';
	}
	$marks=$marks+$question[2];
	
}
echo '<br>'.$marks;
$_SESSION['current']=$marks; 
?>

<input type="submit" value="Remove">
</form>
</div>
</body>
</html>