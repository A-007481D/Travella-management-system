<?php 
    require_once ('dbConnect.php');

    $clientID = $_GET['id'];

    $DelReq = "DELETE FROM client WHERE ClientID=$clientID";
    $delRes = mysqli_query($DBconnect,$DelReq);

    if ($delRes) {
        header("location: dashboard.php");
    }else{
        echo "failed !";
    }

?>