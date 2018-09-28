<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
	$connect = mysqli_connect("localhost", "root", "", "project_1");
	$id = $_POST["id"];
	$sql = "DELETE FROM students WHERE id = '".$id."';";
	if(mysqli_query($connect, $sql)) {
		echo "Data Deleted.";
	}
?>