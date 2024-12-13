<?php
$servername = "localhost";
$user = "root";
$pwd = "";
$db = "voyage";

$DBconnect = mysqli_connect($servername, $user, $pwd, $db);

if (!$DBconnect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>