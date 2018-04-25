<?php  
	require_once("final_functions.php"); 
	require_once("session.php");
?>
<?php
	new_header(); 
	$mysqli= db_connection();
?>
<?php
	if(isset($_POST['submit'])){
		$query=mysqli_query($mysqli, "Update Userlist set Access_level={$_POST['Access_level']} where Username='{$_POST['select']}';");
		redirect_to("admin.php");
	}
?>
 <form action='editUser.php' method='post'>
	<input type="radio" name="Access_level" value="0" checked> Employee<br>
	<input type="radio" name="Access_level" value="1"> Manager<br>
	<input type="radio" name="Access_level" value="2"> Admin
	<select name="select">
		<option selected="selected">Choose one</option>
		<?php
			$query= mysqli_query($mysqli,"SELECT Username from Userlist");
			foreach($query as $name) { ?>
				<option value="<?= $name['Username'] ?>"><?= $name['Username'] ?></option>
		<?php
		} ?>
	</select>
	<input type="submit" name="submit" value="Edit User" class="tiny round button" />
</form> 