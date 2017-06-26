<?php
include_once('../includes/common.functions.php');
include_once('devApps.functions.php');
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
if(isset($_GET['action']))
{
     switch ($_GET['action'])
    {
        case "publish":
        if(isset($_GET['id']))//redirect if id isn't defined
        {
         publishDevApp($_GET['id'],$_SESSION['id']);   
        }
        header("location:./devApps.php");
        exit();
        break;
    }
}
else
{
    $_SESSION['id']=1;
    displayDevApps($_SESSION['id']);
    
}
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