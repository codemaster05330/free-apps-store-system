<?php
include_once('./includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>download</title>
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
<?php
if(isset($_GET['link'])&& isset($_GET['appID']))
{
    
}
elseif(isset($_GET['appID']))
{
    
}
else
{
    //no app id defined >> redirect
    header("location:./index.php");
    exit();
}
?>
</div>
<div id="sideBars">
<?php
//include_once('./layout/topDownloadsBar.php');
?>
</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>