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
		if (isset($_POST["username"]) && $_POST["username"] !== "" && isset($_POST["password"]) && $_POST["password"] !== "" && isset($_POST["fname"]) && $_POST["fname"] !== "" && isset($_POST["lname"]) && $_POST["lname"] !== "") {
			$username = $_POST["username"];
			$password = $_POST["password"];
			$fname = $_POST["fname"];
			$lname = $_POST["lname"];
			$query = "SELECT username from Userlist where Username='{$username}';";
			$result = $mysqli->query($query);
			if ($result->num_rows > 0) {
				$_SESSION["message"] = "Username already taken.  Please choose another";
				redirect_to("createAccount.php");		
			}		
			else {
				if(strlen($username)>=6){
					if(strlen($password)>=10){
						if(preg_match("/\d/",$password)==true){
							if(preg_match("/([^\da-zA-Z])/",$password)==true){
								$q2 = "SELECT username from Userlist where (Fname='{$fname}' && Lname='{$lname}');";
								$r2=mysqli_query($mysqli,$q2);
								if($r2 && $r2->num_rows > 0) {
									$_SESSION["message"] = "The name listed here is already associated with a Login.  Please contact the System Administrator if this is incorrect or needs to be fixed";
									redirect_to("homepage.php");
								}
								else {
									$password = password_encrypt($_POST["password"]);
									$q3 = "Insert into Userlist values('{$username}','{$password}',0,'{$fname}','{$lname}')";
									$r3 = mysqli_query($mysqli,$q3);
									redirect_to("employee.php");
								}
							}																					
							else{
								$_SESSION["message"] = "Password requires at least one non-letter non-number character.";
								redirect_to("createAccount.php");
							}
						}
						else{
							$_SESSION["message"] = "Password requires at least one number";
							redirect_to("createAccount.php");
						}
					}
					else{
						$_SESSION["message"] = "Password is too short.  It must be 10 or more characters.";
						redirect_to("createAccount.php");
					}
				}
				else{
					$_SESSION["message"] = "Username is too short.  It must be 6 or more characters.";
					redirect_to("createAccount.php");
				}
			}
		}
	}
?>
			<h3>Create a new Login</h3>
			<label  for='center-label' class='center'>

			<form action="createAccount.php" method="post">
				<p>&nbsp;&nbsp;Username:&nbsp;&nbsp;
				<input type="text" name="username"  />
				</p>
				<p>&nbsp;&nbsp;Password:&nbsp;&nbsp;
				<input type="password" name="password" value="" />
				</p>
				<p>&nbsp;&nbsp;First Name:&nbsp;&nbsp;
				<input type="text" name="fname"  />
				</p>
				<p>&nbsp;&nbsp;Last name:&nbsp;&nbsp;
				<input type="text" name="lname" value="" />
				</p>
				<input type="submit" name="submit" value="Submit" class="tiny round button" />
			</form>
			<p>For access above Employee level, Contact your System Administrator(s) and they will set it appropriately.</p>
			</label>

			</div>
			
	</div>
</div>