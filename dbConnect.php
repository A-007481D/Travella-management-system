<?php

require_once('dashboard.php');

$servername = "localhost";
$user = "root";
$pwd = "";
$db = "voyage";

$F_name = $_POST['GuestName'];
$L_name = $_POST['GuestLastName'];
$Email = $_POST['GuestEmail'];
$Telephone = $_POST['GuestTelephone'];
$Address = $_POST['GuestAddress'];
$Birthday = $_POST['GuestBirthD'];

$DBconnect = mysqli_connect($servername, $user, $pwd, $db);

if (!$DBconnect) {
    die("Connection failed: " . mysqli_connect_error());
}

$insertData = "INSERT INTO client (First_name, Last_name, Email, Telephone, Address, Birth_date)
        VALUES ('$F_name', '$L_name', '$Email', '$Telephone', '$Address', '$Birthday')";

if (mysqli_query($DBconnect, $insertData)) {
    echo "Client added";
} else {
    echo "Error: " . mysqli_error($DBconnect);
}


?>