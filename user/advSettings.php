<?php
include_once('../includes/common.functions.php');
include_once('../includes/login.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Advanced Settings</title></title>
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
if(isset($_GET['action']))
{
    $id=$_SESSION['userID'];
    if($_GET['action']=="deluser")
    {
        
        $sql ="DELETE FROM users WHERE userID=$id"; 
        $result=mysql_query($sql);
        logout();
        header("location:../index.php");
        exit();
    }
    
}
else
{
  echo '<table id="editInfo">
<tr><td><a href="./advSettings.php?action=deluser" id="hrefBtn">Delete User Account</a></td></tr>';
    if($_SESSION['userLevel']==1)
    {
        echo '<tr><td><a href="./advSettings.php?action=deldev" id="hrefBtn">Delete Developer Account</a></td></tr>';
    }
    elseif($_SESSION['userLevel']==2)
    {
      echo '<tr><td><a href="./newDev.php" id="hrefBtn">Create Developer Account</a></td></tr>';
  
    }
echo '</table> ';
}
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