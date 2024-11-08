<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=file.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");

	require_once 'conn.php';
	
	$output = "";
	
	$output .="
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Date of Birth</th>
					<th>Details</th>
					<th>Patient</th>
				</tr>
			<tbody>
	";
	
	$query = $conn->query("SELECT * FROM tblregistration") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
		
	$output .= "
				<tr>
					<td>".$fetch['RegId']."</td>
					<td>".$fetch['RegFullName']."</td>
					<td>".$fetch['RegEmail']."</td>
					<td>".$fetch['RegPassword']."</td>
					<td>".$fetch['RegGender']."</td>
					<td>".$fetch['RegProfile']."</td>
				</tr>
	";
	}
	
	$output .="
			</tbody>
			
		</table>
	";
	
	echo $output;
	
	
?>