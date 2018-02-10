<html>
<head>
<title>
Enter Questions here
</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<script src="http://localhost/jobsnickers/jquery.mobile-1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="http://localhost/jobsnickers/assets/css/w3css.css">
<script src="http://localhost/jobsnickers/jquery-1.12.0.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){

    $('#submit').click(function(){
        
        $.get('quizzcreated.php', {
        	quizzname : $('#quizzname').val(),
        	maxmarks : $('#maxmarks').val(),
        	
			minmarks : $('#minmarks').val(),
			nos :$('#nos').val(),
			level : $('#level').val(),
			maxtime : $('#maxtime').val(),
			category : $('#category').val()
             }, function(data){
            // use .append(data), if you don't want to remove the previous content
            $('#result').html(data);
        });
    });
});

</script>

</head>
<body>

Create Quizz
<div id="result" class="w3-center w3-teal w3-large" ></div>
<div class="w3-hoverable w3-table-all w3-teal">

<table class="table">
<tr>
<td>
Quizz Name:
</td>
<td>
<input type="text" name="quizzname" id="quizzname" required="required" class="w3-text w3-input w3-round-large w3-border">
</tr>
<tr>
<td>
Max Marks:
</td>
<td>
<select name="maxmarks" id="maxmarks" class="w3-select w3-input w3-round-large w3-border" required="required">
<option value="" disabled selected>--Choose--</option>
	<option value="25">25</option>	
    <option value="30">30</option>
    <option value="50">50</option>
    <option value="100">100</option>
    <option value="200">200</option>
   
    
</select>
<label id="resultln" style="color: red;" ></label>
</td>
</tr>

<tr>
<td>
Min Marks:
</td>
<td>

<select name="minmarks" id="minmarks" class="w3-select w3-input w3-round-large w3-border">
	<option value="" disabled selected>--Choose--</option>	
    <option value="10">10</option>
    <option value="15">15</option>
    <option value="20">20</option>
    <option value="25">25</option>
    <option value="30">30</option>
    <option value="35">35</option>
    <option value="40">40</option>
    <option value="45">45</option>
    <option value="50">50</option>
    <option value="55">55</option>
    <option value="60">60</option>
    <option value="65">65</option>
    <option value="70">70</option>
    <option value="75">75</option>
    <option value="80">80</option>
    <option value="85">85</option>
    <option value="90">90</option>
    <option value="95">95</option>
   <option value="100">100</option>
   <option value="105">105</option>
   <option value="110">110</option>
   <option value="115">115</option>
   <option value="120">120</option>
   <option value="125">125</option>
   <option value="130">130</option>
   <option value="135">135</option>
   <option value="140">140</option>
   <option value="145">145</option>
   <option value="150">150</option>
   <option value="155">155</option>
   <option value="160">160</option>
   <option value="165">165</option>
   <option value="170">170</option>
   <option value="175">175</option>
   <option value="180">180</option>
   <option value="185">185</option>
   <option value="190">190</option>
   <option value="195">195</option>
    
</select>

</td>
</tr>



<tr>
<td>

Number of Sections:
</td>
<td>
<select name="nos" id="nos" class="w3-select w3-input w3-round-large w3-border">
<option value="" disabled selected>--Choose--</option>
	<option value="1">1</option>	
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    
   
    
</select>

</td>
</tr>

<tr>
<td>
Level:
</td>
<td>
<select name="level" id="level" class="w3-select w3-input w3-round-large w3-border">
 <option value="" disabled selected>--Choose--</option>
    <option value="1">beginer</option>
    <option value="2">moderate</option>
    <option value="3">expert</option>
    
</select>
</td>
</tr>


<tr>
<td>
Category:
</td>
<td>
<select name="category" id="category" class="w3-select w3-input w3-round-large w3-border">
<option value="" disabled selected>--Choose--</option>
 <?php 
 require 'connect.php';
 $qry="Select * from `categories` Where 1";
 $cats=mysqli_query($con, $qry);
 $num=mysqli_num_rows($cats);
 $i=0;
 while($i<$num)
 {
 	$rowcat=mysqli_fetch_row($cats);
 	echo "<option value='$rowcat[0]'>$rowcat[1]</option>";
 	$i++;
 }
 ?>
</select>
</td>
</tr>
<tr>
<td>
Max Time:
</td>
<td>
<select name="maxtime" id="maxtime" class="w3-select w3-input w3-round-large w3-border">
	<option value="" disabled selected>--Choose--</option>	
    <option value="15">15min</option>
    <option value="20">20min</option>
    <option value="30">30min</option>
    <option value="45">45min</option>
    <option value="60">60min</option>
   <option value="75">75min</option>
   <option value="90">90min(1.5hrs)</option>
   <option value="120">120min(2hrs)</option>
   <option value="150">15min(2.5hrs)</option>
   <option value="180">180min3hrs()</option>
    
</select>
</td>
</tr>


</table>

</div>

<input type="submit" value="save" id="submit" class="w3-button w3-blue w3-round-large w3-border">

</body>

</html>