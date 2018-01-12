<?php
include_once('../includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Developer Dashboard</title>
   <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/bootstrap_custom.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/mainStyle.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/dashboard.css" type="text/css"/>

<body>
<div id="upperPanel">
<?php
include_once('./layout/devUpperPanel.php');
?>
</div>

<div id="wrapper" class="row">

<div class="col col-md-2">
<?php
include_once('./layout/devMenu.php');
?>
</div>
<div class="col col-md-10" id="content">
<?php
printError();
printSuccess();
include_once('devQuickActions.php');
include_once('devInfo.php');
?>
</div>

</div>
<div id="footerBar">
<?php
include_once('./layout/devFooter.php');
?>
</div>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script> 
</body>
</html>