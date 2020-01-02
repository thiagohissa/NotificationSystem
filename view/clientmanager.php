<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Client Manager</title>
    <meta name="description" content="PHP Assignment 2">
    <meta name="author" content="Thiago Maciel Hissa">
    <link href="../public/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
include "../inc/nav.inc.php";
require "../inc/clients.inc.php"; // $result_query_clients returns the array of clients
include "../lib/functions.php";

if(!isset($_SESSION['user_status']) || $_SESSION['user_status'] != "user_logged_in"){
    $URL = "../public/index.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

if(isset($_GET['company_name'])){
    foreach ($_GET as $key => $content){
        $array_of_content[] = $content;
    }
    addContentToDatabase($array_of_content, 1);
    $URL = "clientmanager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

if(isset($_POST['edited'])){ // This will update any changes made to the database
    array_pop($_POST);
    $id = $_POST[0];
    $new_line = implode(",",$_POST);
    modifyContentInDatabase("clients",$_POST,$id);
//    header("Refresh:0.2; url=clientmanager.php");
    $URL = "clientmanager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}
?>

<h1>Client Manager</h1>
<h4>List of Clients:</h4>

<form method="post" action="editdatabaseitem.php">
    <table>
        <tr>
            <th>Client ID</th>
            <th>Company Name</th>
            <th>Business Number</th>
            <th>Contact's First Name</th>
            <th>Contact's Last Name</th>
            <th>Phone Number</th>
            <th>Cell Number</th>
            <th>Website</th>
            <th>Status</th>
        </tr>
        <?php
        $rows = databaseQueryToTable($result_query_clients);
        ?>
    </table>
</form>

<h4>Add New Client:</h4>
<form class="align" method="get" action="#">
    Company Name:<br>
    <input type="text" name="company_name"><br>
    Business Number:<br>
    <input type="text" name="business_number"><br>
    Contact's First Name:<br>
    <input type="text" name="contact_first_name"><br>
    Contact's Last Name:<br>
    <input type="text" name="contact_last_name"><br>
    Phone Number:<br>
    <input type="text" name="phone_number"><br>
    Cell Number:<br>
    <input type="text" name="cell_number"><br>
    Website:<br>
    <input type="text" name="website"><br>
    Status:<br>
    <input type="text" name="status"><br>
    <input type="submit" value="Add Client">
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