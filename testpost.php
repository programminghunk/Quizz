<html>
<head>

</head>
<body>
<form action="test.php" method="post">
<?php 
date_default_timezone_set("Asia/Kolkata");
$date = time();
?>
<input type="text" name="time" value="<?php echo $date ?>">  
<input type="datetime-local" name="bdaytime" required="required">
<input type="submit" value="submit">
</form>

</body>
</html>