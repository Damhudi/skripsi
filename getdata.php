<?php

include 'dbconnect.php';

$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($mydb, $con);

$page = isset($_GET['page']) ? $_GET['page'] : "";
switch ($page) {
	case 'asap':
		$result = mysql_query("SELECT * FROM sensor_asap");

		if($result === FALSE) {
			die(mysql_error());
			}

		while($row = mysql_fetch_array($result)) {
  			echo $row['waktu'] . "\t" . $row['asap']. "\n";
			}
	break;
	
	case 'foto' :
			$result = mysql_query("SELECT * FROM gambar");

		if($result === FALSE) {
			die(mysql_error());
			}

		while($row = mysql_fetch_array($result)) {
  			echo $row['nama'] . "\t" . $row['ukuran']. "\n" . $row['tipe']. "\n" . $row['folder']. "\n" . $row['waktu']. "\n";
			}
	break;

	case 'asap6jam':
			$result = mysql_query("SELECT * FROM sensor_asap WHERE waktu >= now() - INTERVAL 6 HOUR ORDER BY waktu");

		if($result === FALSE) {
			die(mysql_error());
			}

		while($row = mysql_fetch_array($result)) {
  			echo $row['waktu'] . "\t" . $row['asap']. "\n";
			}
		break;

	case 'asap12jam':
		$result = mysql_query("SELECT * FROM sensor_asap WHERE waktu >= now() - INTERVAL 12 HOUR ORDER BY waktu");

		if($result === FALSE) {
			die(mysql_error());
			}

		while($row = mysql_fetch_array($result)) {
  			echo $row['waktu'] . "\t" . $row['asap']. "\n";
			}
		break;

	case 'asap7hari':
		$result = mysql_query("SELECT * FROM sensor_asap WHERE waktu >= now() - INTERVAL 7 DAY ORDER BY waktu");

		if($result === FALSE) {
			die(mysql_error());
			}

		while($row = mysql_fetch_array($result)) {
  			echo $row['waktu'] . "\t" . $row['asap']. "\n";
			}
		break;

	case 'asap1bulan':
		$result = mysql_query("SELECT waktu as waktu, ROUND(AVG(asap),9) as asap FROM sensor_asap WHERE waktu >= now() - INTERVAL 1 MONTH GROUP BY DAY(waktu) ORDER BY waktu");

		if($result === FALSE) {
			die(mysql_error());
			}

		while($row = mysql_fetch_array($result)) {
  			echo $row['waktu'] . "\t" . $row['asap']. "\n";
			}
		break;

	default:
		# code...
		break;
}



mysql_close($con);
?>
