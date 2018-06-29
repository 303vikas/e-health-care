
<?php

$servername = "localhost";
$username = "nik";
$password = "iwp"; 

$conn = mysqli_connect($servername, $username, $password,'project');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());}
else
	echo"connected";

?>
