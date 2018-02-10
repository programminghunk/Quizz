<?php 
session_start();

?>

<!DOCTYPE html>
<html>
<head>
<title>Start Quizz</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://localhost/jobsnickers/assets/css/w3css.css">
<link rel="stylesheet" href="http://localhost/jobsnickers/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://localhost/jobsnickers/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="http://localhost/jobsnickers/jquery-ui-1.12.1/jquery-ui.min.js"></script>
<script src="http://localhost/jobsnickers/jquery-1.12.0.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  
  <script src="http://localhost/jobsnickers/bootstrap-4.0.0-alpha.6-dist/js/bootstrap.min.js"></script>
  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  h3{color:green;
  text-align: center;
  }
  h4{color:red;
  text-align: center;
  }
  p {font-size: 16px;
  margin-left:20px; 
  }
  .margin {margin-bottom: 45px;}
  .bg-1 { 
      background-color: #1abc9c; /* Green */
      color: #ffffff;
  }
  .bg-2 {
  	 
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 {
  		
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 { 
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 14px;
      background-color: #333;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>

<script type="text/javascript">
$(document).ready(function(){
    $(".divs div").each(function(e) {
        if (e != 0)
            $(this).hide();
    });

    $("#next").click(function(){
        if ($(".divs div:visible").next().length != 0)
            $(".divs div:visible").next().show().prev().hide();
        else {
            $(".divs div:visible").hide();
            $(".divs div:first").show();
        }
        return false;
    });

    $("#prev").click(function(){
        if ($(".divs div:visible").prev().length != 0)
            $(".divs div:visible").prev().show().next().hide();
        else {
            $(".divs div:visible").hide();
            $(".divs div:last").show();
        }
        return false;
    });
});

</script>
<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-border-red";
}
</script>

</head>
<body>
<div class="w3-panel w3-green w3-card-4 w3-center">
  <h3 style="color:purple;">Job Sneakers</h3>
</div>
  <div class="w3-container">
  <div class="w3-row">
    <a href="javascript:void(0)" onclick="openCity(event, 'London');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Quizz</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'Paris');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Answer Sheet</div>
    </a>
    <a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');">
      <div class="w3-third tablink w3-bottombar w3-hover-light-grey w3-padding">Instructions</div>
    </a>
  </div>
  <div id="London" class="w3-container city" style="display:none">
 <form name="refreshForm" action="onsubmit.php" method="post">
<input type="hidden" name="visited" value="" />
<div class="divs">
  <span id="demo" class="w3-badge w3-xlarge w3-text-red w3-white"></span>
<script type="text/javascript">
// Set the date we're counting down to

var countDownDate = new Date().getTime();
//var timeelapsed=0;

var x = setInterval(function() {

		  // Get todays date and time
		  var now = new Date().getTime();

		  var distance = (countDownDate) + ($("#test").val() * 60 * 1000) - now; 
		 var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
 				document.getElementById("demo").innerHTML = minutes + "m " + seconds + "s "; //+ timeelapsed;
			 if (distance < 0) {
			  
		    clearInterval(x);
		    document.getElementById("demo").innerHTML = "EXPIRED";
		    $('#sucks').trigger('click');

				  }
		}, 1000);

							

</script>

<?php

require 'connect.php';
date_default_timezone_set("Asia/Kolkata");
$date = time();

//echo time();
if (isset($_POST['choosequizz']) & isset($_SESSION['starting']))
 {
		$quizz_id=$_POST['choosequizz'];
	if($_SESSION['starting']==1)
	{
	$sqlstartquizz="SELECT `maxtime`,`maxmarks`,`list` from `quizz_data` WHERE `id` like '$quizz_id'";
	$result=mysqli_query($con, $sqlstartquizz);
	
	$row=mysqli_fetch_row($result);
	echo '<span class="w3-text-red" style="float:right; border:2px;">Quizz Max Time::'.$row[0].'<br>
		 Quizz Max Marks::'.$row[1].'</span><br><br><br>';
	
	echo '<input type="hidden" id="test" value='.$row[0].'>';

	$question_ids=explode("+", $row[2]);
	shuffle($question_ids);
	
	$i=1;
	foreach ($question_ids as $k)
	{
		if($k!='')
		{
			$sqlget_question="SELECT * FROM `quizz_one` WHERE `questionid` like '$k' ";
			$result_question=mysqli_query($con, $sqlget_question);
	
			$rownew=mysqli_fetch_row($result_question);
			echo '<div class="container-fluid bg-2 cls'.$i.'">';
			echo $rownew[2].'<br>';
			echo '<br>';
			echo $i.'.'.$rownew[1].'<br>';
			echo '(A).'.$rownew[3].'<br>';
			echo '(B).'.$rownew[4].'<br>';
			echo '(C).'.$rownew[5].'<br>';
			echo '(D).'.$rownew[6].'<br>';
			
			echo '<br>';
			$correct[$i]=$rownew[7];
			$marks[$i]=$rownew[9];
			
			if($rownew[10]!=null)
			{
			echo '<br><img src="data:image/jpeg;base64,'.base64_encode( $rownew[10] ).'"  width=200 height=200 />';
			}
			echo '</div>';
			$i++;
		}
	}
	
	$_SESSION['fetch']=$i;
	$_SESSION['ques']=$rownew[1];
	$_SESSION['correct']=$correct;
	$_SESSION['marks']=$marks;




?>
</div>
 <button id="prev" class="btn btn-success btn-lg" style="float: left">prev</button>
 <button id="next" class="btn btn-success btn-lg" style="float: right">next</button>
 </div>
 
 </div>
<div id="Paris" class="w3-container city" style="display:none"> 
<br>
<div class="w3-hoverable w3-table-all">
<table class="table" style="color:blue;">
<tr>
<td align="center">Q</td><td align="center">A</td>
<td align="center">B</td><td align="center">C</td>
<td align="center">D</td><td align="center">E</td>
</tr>



<?php

$temp=$i;
$k=1; 
while($k<$temp)
{
echo '<tr><td align="center">'.$k.'</td>';
echo '<td align="center"><input type="radio" name="rad'.$k .'" value="1"></radio></td>';
echo '<td align="center"><input type="radio" name="rad'.$k .'" value="2"></radio></td>';
echo '<td align="center"><input type="radio" name="rad'.$k .'" value="3"></radio></td>';
echo '<td align="center"><input type="radio" name="rad'.$k .'" value="4"></radio></td>';
echo '<td align="center"><input type="radio" name="rad'.$k .'" value="5"></radio></td>';
echo '</tr>';
$k++;
}
$_SESSION['starting']=0;
echo '</table></div><br>
		<input id = "sucks" type="submit" value="submit" class="w3-button w3-teal w3-border w3-border-red w3-round-large w3-block"><br>';
	}
else
{
echo 'You can not press BACK and REFRESH button...';
	
}
}
else
{
	echo 'Either you are an intruder or trying to intersect the quizz';
}
?>

</div>
</div>
<div id="Tokyo" class="container-fluid bg-3 w3-container city">
    <h2>Read the instructions carfully before taking the exam.</h2>
    <ul>
    <li>All the questions are cumpulsory.</li>
    <li>Each question carries +1 mark for correct and -0.33 for incorrect attempt.</li>
    <li>Not Attempted questions does not carry any marks .</li>
    </ul>
  </div>
</form>
</div>
  
<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Powered By <a href="#">Job Sneakers</a></p> 
</footer>



</body>
</html>
