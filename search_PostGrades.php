<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
	<title>List All Student</title>
	<style type="text/css">
		table, th, td {border: 1px solid black}
	</style>
</head>
<body>
	<p><?php 
		$servername = "localhost";
		$username = "root"; // Mysql username
		$password = "Krishmesh4";	// Mysql Password

		$dbname = "UNIVERSITY";	// database name
		 
		// Create connection
		// MySQLi is Object-Oriented method
		$conn = new mysqli($servername, $username, $password, $dbname);
		 
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error ."<br>");
		}
		?>
	</p>
	<h1><?php 
		// Define a variable in PHP 
		// Assign the SQL(Select) statement to the variable;
		$sql = "SELECT firstname, lastname
				FROM students
				WHERE studentid =" . $_POST["sid"] . ";";

		$result = $conn->query($sql);

		if ($result->num_rows >  0) {
		// output data of each row
			while($row = $result->fetch_assoc()) {
		    	echo "Post Grade - " . $row["firstname"]. " " . $row["lastname"]. "<br>";
		  	}
		} else {
		  	echo "0 results";
		}
		?></h2>
	<p><?php 
		// Define a variable in PHP 
		// Assign the SQL(Select) statement to the variable;
		$sql = "SELECT studentid, courseid, term, grade
				FROM grades
				WHERE studentid =" . $_POST["sid"] . ";";

		$result = $conn->query($sql);

		$studentid = $_POST["sid"];
		$courseid = $_POST["cid"];
		$term = $_POST["term"];
		$grade = $_POST["grade"];

		echo "Submitted: Student ID = " . $studentid . ", Course ID = " . $courseid . ", Term = " . $term . ", Grade = " . $grade . "<br>";

		?>
	</p>
	<table>
		<!-- here is a HTML comments-->
		<!-- Create 1st row of the table for the header(relation attributes)-->
		<tr>
			<th>Course ID</th>
			<th>Student ID</th>
			<th>Term</th>
			<th>Grade</th>
		</tr>
		<!-- Create some rows for the records-->
		<!-- We want the # of rows match the # of the records...How to do it? -->
		<!-- Let us try the PHP for loop -->
		<?php
			$studentid = $_POST["sid"];
            $courseid = $_POST["cid"];
			$term = $_POST["term"];
            $grade = $_POST["grade"];

			$insert_sql = "INSERT INTO grades (studentid, courseid, term, grade)
						   VALUES ('$studentid', $courseid, '$term', '$grade');";

			if ($conn->query($insert_sql) === FALSE) {
				echo "Error: " . $insert_sql . "<br>" . $conn->error;
			}

			// Write the SQL Select statement from PHP
			$sql = "SELECT courseid, studentid, term, grade
				FROM grades
				WHERE studentid =" . $_POST["sid"] . ";";

			$result = $conn->query($sql);

			// Make sure the relation is not empty
			if($result -> num_rows > 0){
				while($row = $result -> fetch_assoc()) {
					echo "<tr>
								<td>" . $row["courseid"] . "</td>
								<td>" . $row["studentid"] . "</td>
								<td>" . $row["term"] . "</td>
								<td>" . $row["grade"] . "</td>
						 </tr>" ;
				}
			} else {
				// empty list
				echo "<tr> 0 results </tr>";
			}
		?>
	</table>
	<p><?php 
		$conn->close();
	?></p>

	<nav>
        <ul>
            <li><a href="Home.html">Return Home</a></li>
			<li><a href="PostGrades.html">Post Grades</a></li>
        </ul>
    </nav>

</body>
</html>
