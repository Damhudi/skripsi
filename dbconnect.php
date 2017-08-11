<?php

$myhost	= 'localhost';
$myuser = 'root';
$mypass	= '';
$mydb 	= 'dbasap';

$con = mysql_connect($myhost, $myuser, $mypass);
mysql_select_db($mydb);
if (!$con) {
	echo "die";
}

?>