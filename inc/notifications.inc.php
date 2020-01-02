<?php

require_once "db_connection.inc.php";
$result_query_notifications = array();
$sql = "SELECT notification_id, notification_name, notification_type, status FROM notification";
$result = $conn->query($sql);

if($result->num_rows > 0){
    // retrieve data and store in 2d array
    while($row = $result->fetch_array()){
        $result_query_notifications[] = $row;
    }
}
else{
    echo "No data...";
}

$conn->close();