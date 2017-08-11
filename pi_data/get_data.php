<?php
	
	date_default_timezone_set("Asia/Bangkok");

	$host = "127.0.0.1";
	$username = "root";
	$password = "";
	$database = "db_greenhouse";

	$connect = mysqli_connect($host,$username,$password,$database);

	$hum = $_POST['hum'];
	$temp = $_POST['temp'];

	$date = date('Y-m-d H:i:s');

	$query = "INSERT INTO sensor (waktu,temperatur,kelembaban) VALUES ('$date','$temp','$hum')";
	$sql = mysqli_query($connect,$query);

	echo $hum."/".$temp;


?>