<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Assignment 2</title>
    <meta name="description" content="PHP Assignment 2">
    <meta name="author" content="Thiago Maciel Hissa">
    <link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
include "../lib/functions.php";

if(isset($_POST['login'])){
    if(login($_POST['username'],$_POST['key'])){
//        session_start();
        $_SESSION['user_status'] = "user_logged_in";
        $URL="../view/clientmanager.php";
        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    }
    else{
        $warning = "Username and/or password don't match.";
    }
}

if(isset($_GET["logged_out"])){
//    session_start();
    session_destroy();
    session_unset();
}
?>

<h1>Home</h1>
<h4>Please login to manage the database:</h4>

<div class="align">
<form method="post" action="#">
    Username <input type="text" name="username" value="johndoe" required>
    <br>
    <br>
    Password <input type="password" name="key" value="johndoerules" required>
    <br>
    <br>
    <?php echo $warning; ?>
    <br>
    <br>
    <input type="submit" name="login" value="Login">
</form>
</div>


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