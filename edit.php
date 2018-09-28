<?php header('Access-Control-Allow-Origin: *'); ?>
<?php
	$connect = mysqli_connect("localhost", "root", "", "project_1");
	$id = $_POST["id"];
	$text = $_POST["text"];
	$columnName = $_POST["columnName"];
	$sql = "UPDATE students SET ".$columnName."='".$text."' WHERE id='".$id."';";
	if(mysqli_query($connect, $sql)) {
		echo "Data Updated";
	}
?>