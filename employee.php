<?php  
	require_once("final_functions.php"); 
	require_once("session.php");
?>
<?php
	new_header(); 
	$mysqli= db_connection();
?>
<?php
	if(isset($_POST["submit"])){
		redirect_to("display.php?acct=".$_POST['select']);
	}
?>

<form action="employee.php" method="post">
	<select name="select">
		<option selected="selected">Choose one</option>
		<?php
			$query= mysqli_query($mysqli,"SELECT * from Customer where (Success_Contact = FALSE || Request_Contact = TRUE)");
			foreach($query as $name) { ?>
				<option value="<?= $name['Account_Number'] ?>"><?= $name['Full_Name'] ?></option>
		<?php
		} ?>
	</select>
	<input type="submit" name="submit" value="View Customer" class="tiny round button" />
</form>