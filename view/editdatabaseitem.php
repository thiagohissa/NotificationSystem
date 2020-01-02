<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Database Item</title>
    <meta name="description" content="PHP Assignment 2">
    <meta name="author" content="Thiago Maciel Hissa">
    <link href="../public/style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
include "../inc/nav.inc.php";
include "../lib/functions.php";
$contents = key($_POST);
$contents = explode(",",$contents);
$action = "clientmanager.php";
echo "<h1>clientmanager</h1>";

if(count($contents) == 8){
    $action = "notificationmanager.php";
}
elseif(count($contents) == 14){
    $action = "eventmanager.php";
}
elseif(count($contents) == 18){
    $action = "usermanager.php";
}

?>

<h1>Edit Database Item</h1>
<h4>Please make the appropriate changes below:</h4>

<form class="align" method="post" action=<?php echo $action ?>>
    <?php
    displayItemToBeEdited($contents);
    ?>
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