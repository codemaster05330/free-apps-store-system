<?php
include_once('./includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Free Apps Store</title>
    <link rel="stylesheet" href="./styles/mainStyle.css" type="text/css"/>
</head>

<body>

<div id="upperPanel">
<?php
include_once('./layout/upperBar.php');
include_once('./layout/searchPanel.php');
?>
</div>
<div id="wrapper">
<div id="content">
<div id="leftSideBar">
<?php
include_once('./platforms.php');
include_once('./categories.php');
?>
</div>
<?php
include_once('./appsProvider.php');
?>
</div>
<div id="sideBars">
<?php
include_once('./layout/topDownloadsBar.php');
include_once('./layout/recentAppsList.php');
?>
</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>