<?php 
    require_once ('dbConnect.php');

    $reservaID = $_GET['id'];

    $DelReq = "DELETE FROM reservation WHERE ReservationID=$reservaID";
    $delRes = mysqli_query($DBconnect,$DelReq);

    if ($delRes) {
        header("location: reservation.php");
    }else{
        echo "failed !";
    }

?>