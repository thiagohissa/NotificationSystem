<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 1</title>
    <meta name="description" content="PHP Assignment 1">
    <meta name="author" content="Thiago Maciel Hissa">
    <link href="../public/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
include "../inc/nav.inc.php";
require "../inc/notifications.inc.php"; // $result_query_notifications returns the array of notifications
include "../lib/functions.php";

if(!isset($_SESSION['user_status']) || $_SESSION['user_status'] != "user_logged_in"){
    $URL = "../public/index.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

if(isset($_GET['name'])){
    foreach ($_GET as $key => $content){
        $array_of_content[] = $content;
    }
    addContentToDatabase($array_of_content, 2);
    $URL = "notificationmanager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

if(isset($_POST['edited'])){ // This will update any changes made to the database
    array_pop($_POST);
    $id = $_POST[0];
    $new_line = implode(",",$_POST);
    modifyContentInDatabase("notification",$_POST,$id);
    $URL = "notificationmanager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

?>

<h1>Notification Manager</h1>
<h4>List of Notifications:</h4>

<form method="post" action="editdatabaseitem.php">
    <table>
        <tr>
            <th>Notification ID</th>
            <th>Name</th>
            <th>Type</th>
            <th>Status</th>
        </tr>
        <?php
        $rows = databaseQueryToTable($result_query_notifications);
        ?>
    </table>
</form>

<h4>Add New Notification:</h4>
<form class="align" method="get" action="#">
    Name:<br>
    <input type="text" name="name"><br>
    Type:<br>
    <input type="text" name="type"><br>
    Status:<br>
    <input type="text" name="status"><br>
    <input type="submit" value="Add Notification">
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