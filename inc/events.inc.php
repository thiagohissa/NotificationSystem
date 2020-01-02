<?php

require_once "db_connection.inc.php";
$result_query_events = array();
$sql = "SELECT event_id, client_id, notification_id, start_date, start_time, frequency, status FROM events";
$result = $conn->query($sql);

if($result->num_rows > 0){
    // retrieve data and store in 2d array
    while($row = $result->fetch_array()){
        $result_query_events[] = $row;
    }
}
else{
    echo "No data...";
}

$conn->close();