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
    echo 'redirect to '.$_GET['link'];
    $sql="SELECT appDownloads FROM apps WHERE appState=1 AND appID={$_GET['appID']}";
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    if(mysql_num_rows($result)==0)
    {
       //no app id defined >> redirect
        header("location:./index.php");
        exit(); 
    }
    else
    {
       $row=mysql_fetch_assoc($result);
       $downCount=$row['appDownloads'];
       $downCount++;
       $sql ="UPDATE apps SET appDownloads=$downCount WHERE appID={$_GET['appID']}";
       $result=mysql_query($sql) or die("query failed due to ".mysql_error());
       header("location:{$_GET['link']}");
       exit();
    }
}
elseif(isset($_GET['appID']))
{
    $sql="SELECT appID,appName,appIcon,appShortDesc,appVersion,appPrimaryLink,appSecondaryLink FROM apps WHERE appState=1 AND appID={$_GET['appID']}";
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    if(mysql_num_rows($result)==0)
    {
       //no app id defined >> redirect
        header("location:./index.php");
        exit(); 
    }
    else
    {
        $row=mysql_fetch_assoc($result);
        
        echo '<table id="mediumIcon"><tr><td><img id="mediumIcon" src="data:image;base64,'.$row['appIcon'].'"></td>';
    echo '<td><a href="../app.php?appID='.$row['appID'].'"><strong>'.$row['appName'].' '.$row['appVersion'].'</strong></a>';
    echo '<p><small>'.$row['appShortDesc'].'</small></p></td></tr>';
    echo '<tr id="downloadLinks"><td colspan="2"><a href="./download.php?appID='.$row['appID'].'&link='.$row['appPrimaryLink'].'">Download Link 1</a></td></tr>';
    if($row['appSecondaryLink']!="")
    {
         echo '<tr id="downloadLinks"><td colspan="2"><a href="./download.php?appID='.$row['appID'].'&link='.$row['appSecondaryLink'].'">Download Link 2</a></td></tr>';
    }
    echo '<table>';
    }
    
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