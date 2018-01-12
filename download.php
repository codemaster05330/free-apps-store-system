<?php
include_once('./includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>download</title>
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
<div id="wrapper" class="row">
<div id="content">
<?php
if(isset($_GET['link'])&& isset($_GET['appID']))
{
    echo 'redirect to '.$_GET['link'];
    $sql="SELECT appDownloads FROM apps WHERE appState=1 AND appID={$_GET['appID']}";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    if($result->num_rows==0)
    {
       //no app id defined >> redirect
        header("location:./index.php");
        exit(); 
    }
    else
    {
       $row=$result->fetch_assoc();
       $downCount=$row['appDownloads'];
       $downCount++;
       $sql ="UPDATE apps SET appDownloads=$downCount WHERE appID={$_GET['appID']}";
       $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
       header("location:{$_GET['link']}");
       exit();
    }
}
elseif(isset($_GET['appID']))
{
    $sql="SELECT appID,appName,appIcon,appShortDesc,appVersion,appPrimaryLink,appSecondaryLink FROM apps WHERE appState=1 AND appID={$_GET['appID']}";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    if($result->num_rows==0)
    {
       //no app id defined >> redirect
        header("location:./index.php");
        exit(); 
    }
    else
    {
        $app=$result->fetch_assoc();
        
       echo '<div class="row white-block">
            <div class="col col-md-2">';
     echo '<img class="app-img-big" src="data:image;base64,'.$app['appIcon'].'">';
    echo '</div><div class="col-md-10">';
    echo '<h1>'.$app['appName'].' '.$app['appVersion'].'</h1>';
        echo '<p class="well app-short-desc">';
        echo $app['appShortDesc'];
        echo '</p></div></div>';
        
     echo '<div class="row">
    <div class="col col-md-6 col-md-offset-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                Download Links
            </div>
            <div class="panel-body">';
      echo '<p><a href="./download.php?appID='.$app['appID'].'&link='.$app['appPrimaryLink'].'" class="btn btn-link">Download Link 1</a></p>';         
    if($app['appSecondaryLink']!="")
    {
         echo '<p><a href="./download.php?appID='.$app['appID'].'&link='.$app['appSecondaryLink'].'" class="btn btn-link">Download Link 2</a></p>';
    }
    echo '</div></div></div></div>';
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
<div class="row">
<div class="col col-md-4 col-md-offset-4">
   <?php
include_once('./layout/topDownloadsBar.php');
?> 
</div>
</div>
</div></div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>

                
            