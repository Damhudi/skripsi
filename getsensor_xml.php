<?php

if(isset($_GET['val'])) {
	$interval = $_GET['val'];
}

else {
	$interval = "";
}

include 'dbconnect.php';

$pi_table = "sensor_asap";


if($interval === "" || $interval == "l6h") {
	$query = "SELECT waktu, asap FROM $pi_table WHERE waktu >= now() - INTERVAL 6 HOUR ORDER BY waktu ";
}
elseif($interval == "l12h"){
	$query = "SELECT waktu, asap FROM $pi_table WHERE waktu >= now() - INTERVAL 12 HOUR ORDER BY waktu ";
}
elseif($interval == "7d"){
	$query = "SELECT waktu, asap FROM $pi_table WHERE waktu >= now() - INTERVAL 7 DAY ORDER BY waktu ";
}
elseif($interval == "1m"){
	$query = "SELECT DATE(waktu) as waktu, ROUND(AVG(asap),2) as asap FROM $pi_table WHERE waktu >= now() - INTERVAL 1 MONTH GROUP BY DAY(waktu) ORDER BY waktu";
}

$result = mysql_query($query);

date_default_timezone_set("ASIA/Bangkok");

echo "<xport>\n";
echo "<meta>\n";
echo "<legend>\n";
echo "<entry>Kadar Asap di LAB 206 Fakultas Teknik, Universitas Darma Persada</entry>\n";
echo "</legend>\n";
echo "</meta>\n";
echo "<data>\n";

while ($row = mysql_fetch_array($result)) {
	$time = strtotime($row['waktu']);

	echo "<row>\n";
	echo "<t>".date("d-m-Y",$time)."</t>\n";
	echo "<v>".$row['asap']."</v>\n";
	echo "</row>\n";

	}


	echo "</data>\n";
	echo "</xport>";

	mysql_close($con);


?>