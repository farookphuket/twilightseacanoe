<?php
//include "inc/connect_mysqli.php";

include("env.php");

$conn = new mysqli($hostname,$dbuser,$dbpass,$dbname);
mysqli_set_charset($conn, "utf8");

?>
