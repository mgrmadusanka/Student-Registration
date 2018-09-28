<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
	$firstName = $_POST["firstName"];
	$lastName = $_POST["lastName"];
	$connect = mysqli_connect("localhost", "root", "", "project_1");
	$sql = "INSERT INTO students(first_name, last_name) VALUES('".$firstName."', '".$lastName."');";
	if(mysqli_query($connect, $sql)) {
		echo "Data Inserted";
	}
?>