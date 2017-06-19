<?php
include_once('../includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard</title>
</head>

<body>
<div id="upperPanel">
<?php
include_once('./layout/devUpperPanel.php');
?>
</div>

<div id="wrapper">

<div id="navigationBar">
<?php
include_once('./layout/devMenu.php');
?>
</div>
<div id="content">
<?php
printError();
printSuccess();
?>
</div>

</div>
<div id="footer">
<?php
include_once('./layout/devFooter.php');
?>
</div>
</body>
</html>