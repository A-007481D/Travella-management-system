<?php 
    require_once ('dbConnect.php');

    $activityID = $_GET['id'];

    $DelReq = "DELETE FROM activity WHERE ActivityID=$activityID";
    $delRes = mysqli_query($DBconnect,$DelReq);

    if ($delRes) {
        header("location: activity.php");
    }else{
        echo "failed !";
    }

?>