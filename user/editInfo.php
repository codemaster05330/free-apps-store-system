<?php
include_once('../includes/common.functions.php');
include_once('../includes/login.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" href="../styles/mainStyle.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/dashboard.css" type="text/css"/>
</head>

<body>
<div id="upperPanel">
<?php
include_once('./layout/userUpperBar.php');
?>
</div>

<div id="wrapper">

<div id="navigationBar">
<?php
include_once('./layout/userMenu.php');
?>
</div>
<div id="content">
<?php
echo '<p id="error">';
printError();
printSuccess();
echo'</p>';
include_once('./updateInfo.php');
?>
</div>

</div>
<div id="footer">
<?php
include_once('../layout/footerBar.php');
?>
</div>
</body>
</html>