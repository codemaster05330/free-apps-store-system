<?php
include_once('../includes/common.functions.php');
include_once('devApps.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>apps list</title>
    <link rel="stylesheet" href="../styles/mainStyle.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/dashboard.css" type="text/css"/>
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
        case "unpublish":
        if(isset($_GET['id']))//redirect if id isn't defined
        {
         unpublishDevApp($_GET['id'],$_SESSION['id']);   
        }
        header("location:./devApps.php");
        exit();
        break;
        case "delete":
        if(isset($_GET['id']))//redirect if id isn't defined
        {
         delDevApp($_GET['id'],$_SESSION['id']);   
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
<div id="footerBar">
<?php
include_once('./layout/devFooter.php');
?>
</div>
</body>
</html>