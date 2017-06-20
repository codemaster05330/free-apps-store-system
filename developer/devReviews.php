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
include_once('devReviews.functions.php');
if(isset($_GET['appID']))
{
     
    printAppReviews($_GET['appID']);
       
}
else
{
     $_SESSION['id']=1;
    $sql="SELECT appID FROM apps WHERE developerID={$_SESSION['id']} AND appState=1";
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    if(mysql_num_rows($result)==0)
    {
        echo "you havn't added apps yet.";
        echo '<a href="./newApp.php" class="hrefBtn"> new App</a>';
    }
    else
    {
      while($row=mysql_fetch_assoc($result))
        {
          printAppReviews($row['appID']);  
        }
    }
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