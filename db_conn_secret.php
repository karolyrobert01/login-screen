<?php

$sname = "localhost";
$unmae = "tromoshe_teszt2";
$password = "TesztPass12";
//$password = "n0DGIkVVNE";

$db_name = "tromoshe_tt";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}
?>