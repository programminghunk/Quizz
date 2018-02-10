<?php require 'connect.php';?>
<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>
Enter Questions here
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="http://localhost/jobsnickers/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>

<script src="http://localhost/jobsnickers/jquery-1.12.0.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

    $('#submit').click(function(){
        
        $.get('validatequizz.php', {
        	question : $('#question').val(),
			optiona : $('#optiona').val(),
			optionb :$('#optionb').val(),
			optionc : $('#optionc').val(),
			optiond : $('#optiond').val()
             }, function(data){
            // use .append(data), if you don't want to remove the previous content
            $('#result').html(data);
        });
    });
});

</script>


</head>
<body>
<form action="putquestion.php" method="post" enctype="multipart/form-data">
<center>
Include Question Console
<label id="result" style="color: red;" ></label></center>
<div align="center" style="background-color: orange;">

<table>
<tr>
<td>
Question:
</td>
<td>
<input type="text" name="question" id="question" class="names">*</td><td>
<div id="resultfn" style="color: red;" >&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
</td>
</tr>
<tr>
<td>
Additional:
</td>
<td>
<input type="text" name="additional" id="additional" class="names">*</td><td>
<label id="resultln" style="color: red;" ></label>
</td>
</tr>

<tr>
<td>
Option A:
</td>
<td>
<input type="text" name="optiona" id="optiona">*</td><td>
<label id="resultpa" style="color: red;" ></label>
</td>
</tr>

<tr>
<td>
Option B:
</td>
<td>
<input type="text" name="optionb" id="optionb">*</td><td>
<label id="resultpa" style="color: red;" ></label>
</td>
</tr>

<tr>
<td>
Option C:
</td>
<td>
<input type="text" name="optionc" id="optionc">*</td><td>
</td>
</tr>

<tr>
<td>
Option D:
</td>
<td>
<input type="text" name="optiond" id="optiond">*</td><td>
<label id="resultem" style="color: red;" ></label>
</td>
</tr>
<tr>
<td>
Correct Answer:
</td>
<td>
<select name="correct" id="correct">
 
    <option value="1">A</option>
    <option value="2">B</option>
    <option value="3">C</option>
    <option value="4">D</option>
</select>
</td>
</tr>

<tr>
<td>
Category:
</td>
<td>

 	<?php 
 	$sql='SELECT * from `categories` WHERE 1';
 	$result=mysqli_query($con, $sql);
 	$length=mysqli_num_rows($result);
 	
 	$i=0;
 	echo '<select name="category" id="category">';
 	while($i<$length)
 	{
 		$row=mysqli_fetch_row($result);
 		echo "<option value='$row[1]'>$row[1]</option>";
 		$i++;
 		
 	}

 	echo '</select>';
 	?>
   
    

</td>
<td>
<label id="resultfa" style="color: red;" ></label>
</td>
</tr>
<tr>
<td>
Marks:
</td>
<td>
<select name="marks" id="marks">
		
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
   
    
</select>
</td>
</tr>
<tr>
<td>Upload Supporting Image</td><td><input type="file" name="fileToUpload" id="fileToUpload"></td></tr>
<tr>
<td>
</td><td>
</td>

<td>

<input type="submit" value="save" id="submit">
</td>
</tr>

</table>
<br>


</div>
</form>
</body>

</html>