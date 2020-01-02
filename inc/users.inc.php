<?php

require_once "db_connection.inc.php";
$result_query_users = array();
$sql = "SELECT user_id, first_name, last_name, email, cell_number, employee_position, username,password,status FROM users";
$result = $conn->query($sql);

if($result->num_rows > 0){
    // retrieve data and store in 2d array
    while($row = $result->fetch_array()){
        $result_query_users[] = $row;
    }
}
else{
    echo "No data...";
}

$conn->close();