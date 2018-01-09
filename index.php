<?php
include_once('./includes/common.functions.php');
include_once('./includes/login.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Free Apps Store</title>

    <link rel="stylesheet" href="./styles/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="./styles/bootstrap_custom.css" type="text/css"/>
    <link rel="stylesheet" href="./styles/mainStyle.css" type="text/css"/>
</head>

<body>

<div id="upperPanel">
<?php
include_once('./layout/upperBar.php');
//include_once('./layout/searchPanel.php');
?>
</div>
<div class=" container">
<?php
include_once('./layout/searchPanel.php');
?>	
<div id="wrapper" class="row">
<div id="leftSideBar" class="col col-md-2">
<?php
include_once('./platforms.php');
include_once('./categories.php');
?>
</div>
<div id="content" class="col col-md-7">

<?php
include_once('./appsProvider.php');
?>
</div>
<div id="sideBars" class="col col-md-3">
<?php
include_once('./layout/topDownloadsBar.php');
include_once('./layout/recentAppsList.php');
?>
</div>
</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>

<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.js"></script>
</body>
</html>