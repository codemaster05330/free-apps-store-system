<?php
include_once('./includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Apps</title>
     <link rel="stylesheet" href="./styles/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="./styles/bootstrap_custom.css" type="text/css"/>
    <link rel="stylesheet" href="./styles/mainStyle.css" type="text/css"/>
    <link rel="stylesheet" href="./styles/app.css" type="text/css"/>
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
<div id="wrapper">
<div id="content">
<?php
include_once('./appContent.php');
?>
</div>
<div class="row">
	<div class="col col-md-4 col-md-offset-4">
<?php
include_once('./layout/topDownloadsBar.php');
?>
</div></div>
</div></div>
<?php
include_once('./layout/footerBar.php');
?>
<script type="text/javascript" src="./js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.js"></script> 
</body>
</html>