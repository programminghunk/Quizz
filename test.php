<!DOCTYPE script PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<head>

<script type="text/javascript">
// Set the date we're counting down to
function show()
{
var countDownDate = new Date().getTime();
document.getElementById('demo').innerHTML=countDownDate;


}						

</script>
</head>
<body>
<?php 
date_default_timezone_set("Asia/Kolkata");
$date = time();
?>
<button id="test" onclick="show()">click</button>
javascript time stamp:<div id="demo"></div>
php time:<div><?php echo ($_POST['time'])?></div>
future time stamp<div><?php 
echo strtotime($_POST['bdaytime']);
$me=strtotime($_POST['bdaytime']);
?>

<br>again converted<?php  echo date('Y-m-d H:i:s', $me);?>

</div>
</body>
</html>