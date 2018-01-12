<?php
include_once('../includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>new a app</title>
    <link rel="stylesheet" href="../styles/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/bootstrap_custom.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/mainStyle.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/dashboard.css" type="text/css"/>
</head>

<body>
<div id="upperPanel">
<?php
include_once('./layout/devUpperPanel.php');
?>
</div>

<div id="wrapper" class="row">

<div class="col col-md-2">
<?php
include_once('./layout/devMenu.php');
?>
</div>
<div id="content" class="col col-md-10">
<?php
printError();
printSuccess();
if(isset($_POST['submit']))
{
    $appName=$_POST['name'];
    $shortDesc=$_POST['shortDesc'];
    $longDesc=$_POST['longDesc'];
    $appReq=$_POST['requirement'];
    $icon=$_FILES['icon']['tmp_name'];
    $icon=addslashes($icon);
    $icon=file_get_contents($icon);
    $icon=base64_encode($icon);
    
    $appVer=$_POST['version'];
    
    $appRelease=$_POST['release'];
    $appSize=$_POST['fileSize'];
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
    $appPlatform=$_POST['platform'];
    $mainCat=$_POST['mainCat'];
    $subCat='NULL';
    if(isset($_POST['subCat']))
    {
        $subCat=$_POST['subCat'];
    }
    $appLang=$_POST['lang'];
    
    $screenshots=$_POST['screenShots'];
    
    $Links=$_POST['links'];
    
    $vedioLink=$_POST['video'];
    
    //print_r($screenshots);
    //print_r($Links);
    //$id=$_SESSION['id'];
    $id=$_SESSION['devID'];
    $sql= "INSERT INTO apps(appName,appShortDesc,applongDesc,appIcon,developerID,appVersion,appReleaseDate,
            appLanguage,appMainCatID,appSubCatID,appPlatformID,appSysRequirements,appSize,appPrimaryLink,
             appSecondaryLink,appVideoLink,appScreenshot1,appScreenshot2,appScreenshot3,appScreenshot4,appScreenshot5,
              appState) VALUES ('$appName','$shortDesc','$longDesc','$icon',$id,$appVer,'$appRelease',
              '$appLang',$mainCat,$subCat,$appPlatform,'$appReq',$appSize,'$Links[0]','$Links[1]','$vedioLink',
              '$screenshots[0]','$screenshots[1]','$screenshots[2]','$screenshots[3]','$screenshots[4]',0)";
            $mysqli->query($sql)or die("query failed due to ".$mysqli->error);
            logSuccess($appName."app added successfuly ");
            header("location:./newApp.php");
            exit();
}else
{
    include_once('newAppForm.php');
}
?>
</div>

</div>
<div id="footer">
<?php
include_once('./layout/devFooter.php');
?>
</div>
<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.js"></script>
</body>
</html>