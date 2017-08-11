<?php
	
	date_default_timezone_set("Asia/Bangkok");

	$host = "127.0.0.1";
	$username = "root";
	$password = "";
	$database = "db_greenhouse";

	$connect = mysqli_connect($host,$username,$password,$database);

	$light = $_POST['light'];

	$date = date('Y-m-d H:i:s');

	$query = "INSERT INTO sensor_cahaya (waktu,cahaya) VALUES ('$date','$light')";
	$sql = mysqli_query($connect,$query);


?>