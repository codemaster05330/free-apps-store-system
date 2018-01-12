<?php
include_once('../includes/common.functions.php');
include_once('../includes/login.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Edit User Profile</title>
    <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/bootstrap_custom.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/mainStyle.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/dashboard.css" type="text/css"/>
</head>

<body>
<div id="upperPanel">
<?php
include_once('./layout/userUpperBar.php');
?>
</div>

<div id="wrapper" class="row">

<div class="col col-md-2">
<?php
include_once('./layout/userMenu.php');
?>
</div>
<div class="col col-md-9 white-block">
<?php
printError();
printSuccess();
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