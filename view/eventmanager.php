<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 1</title>
    <meta name="description" content="PHP Assignment 2">
    <meta name="author" content="Thiago Maciel Hissa">
    <link href="../public/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
include "../inc/nav.inc.php";
require "../inc/events.inc.php"; // $result_query_events returns the array of events
include "../lib/functions.php";

if(!isset($_SESSION['user_status']) || $_SESSION['user_status'] != "user_logged_in"){
    $URL = "../public/index.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

if(isset($_GET['client_id'])){
    foreach ($_GET as $key => $content){
        $array_of_content[] = $content;
    }
    addContentToDatabase($array_of_content, 3);
    $URL = "eventmanager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

if(isset($_POST['edited'])){ // This will update any changes made to the database
    array_pop($_POST);
    $id = $_POST[0];
    $new_line = implode(",",$_POST);
    modifyContentInDatabase("events",$_POST,$id);
    $URL = "eventmanager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

?>

<h1>Event Manager</h1>
<h4>List of Events:</h4>

<form method="post" action="editdatabaseitem.php">
    <table>
        <tr>
            <th>Event ID</th>
            <th>Client ID</th>
            <th>Notification ID</th>
            <th>Start Date</th>
            <th>Start Time</th>
            <th>Frequency</th>
            <th>Status</th>
        </tr>
        <?php
        $rows = databaseQueryToTable($result_query_events);
        ?>
    </table>
</form>


<h4>Add New Event:</h4>
<form class="align" method="get" action="#">
    Client ID:<br>
    <input type="text" name="client_id"><br>
    Notification ID:<br>
    <input type="text" name="notification_id"><br>
    Start Date (DD-MM-YYYY):<br>
    <input type="text" name="start_date"><br>
    Start Time (HH:MM:SS):<br>
    <input type="text" name="start_time"><br>
    Frequency:<br>
    <input type="text" name="frequency"><br>
    Status:<br>
    <input type="text" name="status"><br>
    <input type="submit" value="Add Event">
</form>

<br>
<br>
<br>

<script src=https://my.gblearn.com/js/loadscript.js></script>
</body>
</html>
<?php
date_default_timezone_set('America/Toronto');
echo "This page was last modified: " . date ("F d Y H:i", filemtime(__FILE__));
echo "<hr>";
show_source(__FILE__);
echo "<a href='/folder_view/vs.php?s=" . __FILE__ . "' target='_blank'>View Source</a>";
?>