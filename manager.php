<?php  
	require_once("final_functions.php"); 
	require_once("session.php");
?>
<?php
	new_header(); 
	$mysqli= db_connection();
?>
<?php
	$value=$_POST['option'];
	if(isset($_POST['option'])){
		if($value==1){
			redirect_to('upload.php');
		}
		else if($value==0){
			redirect_to('employee.php');
		}
	}
?>
 <form action='admin.php' name='value' method='POST'>
	<input type="radio" name="option" value="0" checked> View Customers<br>
	<input type="radio" name="option" value="1"> Upload File<br>
	<input type="submit" name="submit" value="Enter" class="button" />
</form> 