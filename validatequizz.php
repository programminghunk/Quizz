<?php
		
//session_start();
$qerr='';
$oaerr='';
$oberr='';
$ocerr='';
$oderr='';

	
			if(isset($_GET['question']))
		{
			if ($_GET['question']=='') {
				$qerr='Question field is required<br>';
				
				
			}
			else{
				$qerr="";
				
				
			}
			
		}
		if(isset($_GET['optiona']))
		{
			if ($_GET['optiona']=='') {
				$oaerr='Option A field is required<br>';
				
			}
			else{
				$oaerr="";
				
			}
			
		}
		if(isset($_GET['optionb']))
		{
			if ($_GET['optionb']=='') {
				$oberr='Option B field is required<br>';
				
			}
			else{
				$oberr="";
				
			}
			
		}
		if(isset($_GET['optionc']))
		{
			if ($_GET['optionc']=='') {
				$ocerr='Option C is required<br>';
				
			}else{
				$ocerr="";
				
			}
			
		}
		
		if(isset($_GET['optiond']))
		{
			$mob=$_GET['optiond'];
			if ($_GET['optiond']=='') 
			{
				$oderr='Option D is required<br>';
				
			}	
			else{
				$oderr="";
				
			}
			
		}
		
			echo $qerr;
			echo $oaerr;
			echo $oberr;
			echo $ocerr;
			echo $oderr;
			 /* if($qerr=='' && $oaerr='' && $oberr='' && $ocerr='' && $oderr='')
			{
				echo '<input type="hidden" name="in" value="1">';
				
			}
			else {
				echo '<input type="hidden" name="in" value="0">';
			} */
?>