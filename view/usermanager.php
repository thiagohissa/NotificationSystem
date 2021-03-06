<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Manager</title>
    <meta name="description" content="PHP Assignment 2">
    <meta name="author" content="Thiago Maciel Hissa">
    <link href="../public/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
include "../inc/nav.inc.php";
require "../inc/users.inc.php"; // $result_query_users returns the array of users
include "../lib/functions.php";

if(!isset($_SESSION['user_status']) || $_SESSION['user_status'] != "user_logged_in"){
    $URL = "../public/index.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

if(isset($_GET['first_name'])){
    foreach ($_GET as $key => $content){
        $array_of_content[] = $content;
    }
    addContentToDatabase($array_of_content, 4);
    $URL = "usermanager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}

if(isset($_POST['edited'])){ // This will update any changes made to the database
    array_pop($_POST);
    $id = $_POST[0];
    $new_line = implode(",",$_POST);
    modifyContentInDatabase("users",$_POST,$id);
    $URL = "usermanager.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
}
?>

<h1>User Manager</h1>
<h4>List of Users:</h4>

<form method="post" action="editdatabaseitem.php">
    <table>
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Cell Number</th>
            <th>Position</th>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
        </tr>
        <?php
        $rows = databaseQueryToTable($result_query_users);
        ?>
    </table>
</form>

<h4>Add New User:</h4>
<form class="align" method="get" action="#">
    First Name:<br>
    <input type="text" name="first_name"><br>
    Last Name:<br>
    <input type="text" name="last_name"><br>
    Email:<br>
    <input type="text" name="email"><br>
    Cell Number:<br>
    <input type="text" name="cell_number"><br>
    Position:<br>
    <input type="text" name="position"><br>
    Username:<br>
    <input type="text" name="username"><br>
    Password:<br>
    <input type="password" name="password"><br>
    Status:<br>
    <input type="text" name="status"><br>
    <input type="submit" value="Add User">
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