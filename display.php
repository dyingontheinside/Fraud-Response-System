<?php  
	require_once("final_functions.php"); 
	require_once("session.php");
?>
<?php
	new_header(); 
	$mysqli= db_connection();
 	echo "<style> table, th, td {border: 1px solid black;}</style>";
?>
<?php
	$acct=$_GET['acct'];
	$query = mysqli_query($mysqli,"select * from Customer where Account_Number = ".(int)$acct."");
	$result=mysqli_fetch_assoc($query);
	echo "<body>";
	echo "<table>";
	echo "
		<tr>
			<th>Account Number</th>
			<td>".$result['Account_Number']."</td>
		</tr>
		<tr>
			<th>Full Name</th>
			<td>".$result['Full_Name']."</td>
		</tr>
		<tr>
			<th>First Name</th>
			<td>".$result['First_Name']."</td>
		</tr>
		<tr>
			<th>Middle Name</th>
			<td>".$result['Middle_Name']."</td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td>".$result['Last_Name']."</td>
		</tr>
		<tr>
			<th>Suffix</th>
			<td>".$result['Suffix']."</td>
		</tr>
		<tr>
			<th rowspan='3'>Address</th>
			<td>".$result['Address_1']."</td>
			<td>".$result['Address_2']."</td>
			<td>".$result['Address_3']."</td>
		</tr>
		<tr>
			<th>City</th>
			<td>".$result['City']."</td>
		</tr>
		<tr>
			<th>State</th>
			<td>".$result['State']."</td>
		</tr>
		<tr>
			<th>Zip Code</th>
			<td>".$result['Zip_Code']."</td>
		</tr>
		<tr>
			<th rowspan='2'>Phone Number</th>
			<td>".$result['Phone_Number1']."</td>
			<td>".$result['Phone_Number2']."</td>
		</tr>";
	echo "</table>"; 
	echo "</body>";
?>
