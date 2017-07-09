<?php
include_once('../includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Edit app</title>
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
if(isset($_POST['update'])&&isset($_POST['appID']))
{
    $updateSql="";
    $devID=$_SESSION['id'];
    $devID=1;
    $appName=$_POST['name'];
     if($appName != "")
     {
        $updateSql .="appName='$appName',";
     }
     
    $shortDesc=$_POST['shortDesc'];
    if($shortDesc !="")
    {
        $updateSql .="appShortDesc='$shortDesc',";
    }
    
    $longDesc=$_POST['longDesc'];
    if($longDesc !="")
    {
        $updateSql .="applongDesc='$longDesc',";
    }
    
    $appReq=$_POST['requirement'];
    if($appReq !="")
    {
        $updateSql .="appSysRequirements='$appReq',";
    }
    
    $icon=$_FILES['icon']['tmp_name'];
    if($icon !="")
    {
        $icon=addslashes($icon);
    $icon=file_get_contents($icon);
    $icon=base64_encode($icon);
        $updateSql .="appIcon='$icon',";
    }
    
    $appVer=$_POST['version'];
    if($appVer !="")
    {
        $updateSql .="appVersion=$appVer,";
    }
    
    $appRelease=$_POST['release'];
     if($appRelease !="")
    {
        $updateSql .="appReleaseDate='$appRelease',";
    }
    
    $appSize=$_POST['fileSize'];
    if($appSize !="")
    {
        switch($_POST['sizeType'])
    {
        case "mb":
            $appSize *=1024;
            break;
         case "gb":
         $appSize *=1024;
         $appSize *=1024;
         break;   
    }
        $updateSql .="appSize=$appSize,";
    }
    
    $appPlatform=$_POST['platform'];
    
    if($appPlatform !="0")
    {
        $updateSql .="appPlatformID=$appPlatform,";
    }
    
    $mainCat=$_POST['mainCat'];
    if($mainCat !="0")
    {
        $updateSql .="appMainCatID=$mainCat,";
    }
    
   // $subCat='NULL';
    if( isset($_POST['subCat']))
    {
        $subCat=$_POST['subCat'];
        $updateSql .="appSubCatID=$subCat,";
    }
    
    $appLang=$_POST['lang'];
    
    if($appLang !="")
    {
        $updateSql .="appLanguage='$appLang',";
    }
    
    $screenshots=$_POST['screenShots'];
    if($screenshots[0] !="")
    {
        $updateSql .="appScreenshot1='$screenshots[0]',";
        $updateSql .="appScreenshot2='$screenshots[1]',";
        $updateSql .="appScreenshot3='$screenshots[2]',";
        $updateSql .="appScreenshot4='$screenshots[3]',";
        $updateSql .="appScreenshot5='$screenshots[4]',";
    }
    
    $links=$_POST['links'];
    if($links[0] !="")
    {
        $updateSql .="appPrimaryLink='$links[0]',";
        $updateSql .="appSecondaryLink='$links[1]',";
    }
    
    $vedioLink=$_POST['video'];
    
    $updateSql .="appVideoLink='$vedioLink',appState=0,approvalMsg='update the app'";
    
    $sql ="UPDATE apps SET $updateSql WHERE appID={$_POST['appID']} AND developerID=$devID";
     $mysqli->query($sql)or die("query failed due to ".mysqli_error());
     logSuccess($appName."app updated successfuly ");
     header("location:./devApps.php");
     exit();
    
    
}else
{
    include_once('editAppForm.php');
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