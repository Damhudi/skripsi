<?php
include "dbconnect.php";

$query = mysql_query("SELECT waktu, asap FROM sensor_asap ORDER BY waktu DESC LIMIT 1");
$result = mysql_fetch_array($query);

$lastsmoke = $result['asap'];


if($lastsmoke > 30){
  $tanda = "Kemungkinan Terjadi Kebakaran";
}
elseif ($lastsmoke >= 25) {
  $tanda = "Ada Yang Merokok";
}
else {
  $tanda = "Aman";
}

?>