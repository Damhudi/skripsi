<?php 

include 'dbconnect.php';

$masuk = mysql_query("INSERT INTO sensor (waktu,asap) VALUES ('2017-02-01 12:00:00','32.0','55.0')");

?>