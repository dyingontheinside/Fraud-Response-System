<?php  
	require_once("final_functions.php"); 
	require_once("session.php");
?>
<?php
	new_header(); 
	$mysqli = db_connection();
	if (($output = message()) !== null) {
		echo $output;
	}

	if (isset($_POST["submit"])) {
	  if (isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== "") {
	    $username = $_POST["username"];
	    $password = $_POST["password"];
		
		$query = "SELECT username from Userlist where Username='{$username}';";
		$result = $mysqli->query($query);
        if ($result && $result->num_rows > 0) {
			$row = $result->fetch_assoc();			
			if (password_check($password,password_encrypt($_POST["password"]))) {
				$_SESSION['username'] = $username;
				$query = "select Access_Level from Userlist where Username='{$username}'";
				$result = $mysqli->query($query);
				
				if ($result && $result->num_rows > 0) {
					$row = $result->fetch_assoc();
					
					if($row["Access_Level"] == 0){
						
						redirect_to("employee.php");
					}
					elseif($row["Access_Level"] == 1){
						$_POST["management"]=$username;
						redirect_to("manager.php");
					}
					elseif($row["Access_Level"] == 2){
						$_POST["management"]=$username;
						redirect_to("admin.php");
					}
					else{
						$_SESSION["message"] = "Value Not Found!";
					}
				}
			}
			else {
			  $_SESSION["message"] = "Username/Password combination not found";
			  redirect_to("homepage.php");
			}		
		}		
		else {
			$_SESSION["message"] = "Username/Password not found";
			redirect_to("homepage.php");
		}
	}
}
?>

	
			<h3>Welcome to the FNB Fraud Contact Database!</h3>
			<label  for='center-label' class='center'>

			<form action="homepage.php" method="post">
			  <p>&nbsp;&nbsp;Username:&nbsp;&nbsp;
				<input type="text" name="username"  />
			  </p>
			  <p>&nbsp;&nbsp;Password:&nbsp;&nbsp;
				<input type="password" name="password" value="" />
			  </p>
			  <input type="submit" name="submit" value="Submit" class="tiny round button" />
			</form>
			</label>

			</div>
			
	</div>
</div>

<?php new_footer($mysqli); ?>
