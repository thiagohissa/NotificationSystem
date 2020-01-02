<?php

require_once "db_connection.inc.php";
$result_query_clients = array();
$sql = "SELECT client_id, company_name, business_number, contact_firstname, contact_lastname, phone_number, cell_number, website, status FROM clients";
$result = $conn->query($sql);

if($result->num_rows > 0){
    // retrieve data and store in 2d array
    while($row = $result->fetch_array()){
        $result_query_clients[] = $row;
    }
}
else{
    echo "No data...";
}

$conn->close();