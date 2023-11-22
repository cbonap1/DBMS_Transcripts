<!DOCTYPE html>
<html>
<head>
	<title>List All Student</title>
	<style type="text/css">
		table, th, td {border: 1px solid black}
	</style>
</head>
<body>
	<h1>My School System</h2>
	<p><b>Step 1. Link HTML and PHP.</b></p>
	<p><i><?php  echo "PHP has been installed successfully!"; ?></i></p>
	<p><b>Step 2. Embedding SQL in Web Applications by using PHP.</b></p>
	<p><?php 
		$servername = "localhost";
		$username = "root"; // Mysql username
		$password = "1234";	// Mysql Password

		$dbname = "UNIVERSITY";	// database name
		 
		// Create connection
		// MySQLi is Object-Oriented method
		$conn = new mysqli($servername, $username, $password, $dbname);
		 
		// Check connection
		if ($conn->connect_error) {
		    die("onnection failed: " . $conn->connect_error ."<br>");
		} 
		echo "<i>DB Connected successfully...</i>";
		?>
	</p>
	<p><b>Step 3. Embedding SQL in Web Applications by using PHP. Print out all the student-info records</b></p>
	<p><?php 
		// Define a variable in PHP 
		// Assign the SQL(Select) statement to the variable;
		$sql = "SELECT studentid, firstname, lastname, dob FROM students";

		$result = $conn->query($sql);

		if ($result->num_rows >  0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
		    	echo "Student ID: " . $row["studentid"]. " - First Name: " . $row["firstname"]. " - Last Name: " . $row["lastname"]. " - DOB: " . $row["dob"]. "<br>";
		  	}
		} else {
		  	echo "0 results";
		}
		?>
	</p>
	<p><b>Step 4. Modify the layout of the records. Let's create a table for the data</b></p>
	<table>
		<!-- here is a HTML comments-->
		<!-- Create 1st row of the table for the header(relation attributes)-->
		<tr>
			<th>Student ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Birthday</th>
		</tr>
		<!-- Create some rows for the records-->
		<!-- We want the # of rows match the # of the records...How to do it? -->
		<!-- Let us try the PHP for loop -->
		<?php
			// Write the SQL Select statement from PHP
			$sql = "SELECT studentid, firstname, lastname, dob FROM students";
			$result = $conn->query($sql);

			// Make sure the relation is not empty
			if($result -> num_rows > 0){
				while($row = $result -> fetch_assoc()) {
					echo "<tr>
								<td>" . $row["studentid"] . "</td>
								<td>" . $row["firstname"] . "</td>
								<td>" . $row["lastname"] . "</td>
								<td>" . $row["dob"] . "</td>
						 </tr>" ;
				}
			} else {
				// empty list
				echo "<tr> 0 results </tr>";
			}
		?>
	</table>
	<p><b>Step 5. Add the CSS style for the table, th and td element.</b></p>
	<p><b>Step 6. Close the DB connection.</b></p>
	<p><?php 
		$conn->close();

		echo "<i>Seaching Completed. <br>...DB Disconnect. Done.</i>";
	?></p>
</body>
</html>
