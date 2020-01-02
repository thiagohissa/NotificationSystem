<?php

// Read and display database
function databaseQueryToTable($query){
    $rows = array();
    $line_count = 0;
    for($i =0; $i<count($query); $i++) {
        $dataArray = $query[$i];
        $rows[] = implode($dataArray,",");
        echo "<tr>";
        for($j =0; $j<count($dataArray); $j++) {
            if(empty($dataArray[$j])) { continue; }
            echo "<td>" . $dataArray[$j] . "</td>";
        }
        echo "<td><input type='submit' name=$rows[$line_count] value='Edit'></td>";
        echo "</tr>";
        $line_count++;
    }
    return $rows;
}

// Add item to database
function addContentToDatabase($values, $code){
    $conn = new mysqli("server.f9176085.gblearn.com","f9176085_root1","root1","f9176085_assignment") or die(mysqli_error($conn));
    if(!empty($values) && $code == 1){ // 1 for client DB
        $sql = "INSERT INTO clients (company_name,business_number,contact_firstname,contact_lastname,phone_number,cell_number,website,status) 
        VALUES ('$values[0]','$values[1]','$values[2]','$values[3]','$values[4]','$values[5]','$values[6]','$values[7]')";
        $conn->query($sql) or die(mysqli_error($conn));
    }
    elseif (!empty($values) && $code == 2){ // 2 for notifications DB
        $sql = "INSERT INTO notification (notification_name,notification_type,status) 
        VALUES ('$values[0]','$values[1]','$values[2]')";
        $conn->query($sql) or die(mysqli_error($conn));
    }
    elseif (!empty($values) && $code == 3) { // 3 for events DB
        $sql = "INSERT INTO events (client_id,notification_id,start_date,start_time,frequency,status) 
        VALUES ('$values[0]','$values[1]','$values[2]','$values[3]','$values[4]','$values[5]')";
        $conn->query($sql) or die(mysqli_error($conn));
    }
    elseif (!empty($values) && $code == 4) { // 4 for users DB
        $sql = "INSERT INTO users (first_name, last_name, email, cell_number, employee_position, username,password,status) 
        VALUES ('$values[0]','$values[1]','$values[2]','$values[3]','$values[4]','$values[5]','$values[6]','$values[7]')";
        $conn->query($sql) or die(mysqli_error($conn));
    }
    $conn->close();
}

function modifyContentInDatabase($tableName, $values, $primaryKey){
    $conn = new mysqli("server.f9176085.gblearn.com","f9176085_root1","root1","f9176085_assignment") or die(mysqli_error($conn));
    if($tableName == "clients"){
        $sql = "UPDATE $tableName SET company_name = '$values[1]', business_number = '$values[2]',contact_firstname = '$values[3]', contact_lastname = '$values[4]', phone_number = '$values[5]',cell_number = '$values[6]',website = '$values[7]',status = '$values[8]'
        WHERE client_id =  '$primaryKey'";
    }
    else if($tableName == "notification"){
        $sql = "UPDATE $tableName SET notification_name = '$values[1]', notification_type = '$values[2]',status = '$values[3]'
        WHERE notification_id =  '$primaryKey'";
    }
    else if($tableName == "events"){
        $sql = "UPDATE $tableName SET client_id = '$values[1]', notification_id = '$values[2]',start_date = '$values[3]', start_time = '$values[4]', frequency = '$values[5]',status = '$values[6]'
        WHERE event_id =  '$primaryKey'";
    }
    else if($tableName == "users"){
        $sql = "UPDATE $tableName SET first_name = '$values[1]', last_name = '$values[2]',email = '$values[3]', cell_number = '$values[4]', employee_position = '$values[5]',username = '$values[6]',password = '$values[7]',status = '$values[8]'
        WHERE user_id =  '$primaryKey'";
    }
    $conn->query($sql) or die(mysqli_error($conn));
    $conn->close();
}

// Edit Item in Database
function displayItemToBeEdited($contents){
    echo "<br>";
    $count = 0;
    for($i = 0; $i<count($contents); $i+=2){
        if(empty($contents[$i])){ continue; }
        echo "<input type='text' name=$count value=$contents[$i]><br>";
        $count++;
    }
    echo "<input type='submit' name='edited' value='Apply Changes'>";
}

// Login
function login($username, $password){
    $conn = new mysqli("server.f9176085.gblearn.com","f9176085_root1","root1","f9176085_assignment") or die(mysqli_error($conn));
    $sql = "SELECT password FROM users WHERE username='$username' AND password = '$password'";
    $result = $conn->query($sql) or die(mysqli_error($conn));
    if($result->num_rows > 0){
        return true;
    }
    else {
        return false;
    }
    $conn->close();
}

echo "<a href='/folder_view/vs.php?s=" . __FILE__ . "' target='_blank'>View Source</a>";

