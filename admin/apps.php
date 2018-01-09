<?php
include_once('apps.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Apps</title>
    <link rel="stylesheet" href="../styles/mainStyle.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/dashboard.css" type="text/css"/>
</head>

<body>

<div id="upperPanel">
<?php
include_once('./layout/upperPanel.php');
?>
</div>
<div id="wrapper">
<div id="navigationBar">
<?php
include_once('./layout/menu.php');
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
        case "approve":
        if(isset($_GET['id']))//redirect if id isn't defined
        {
         approveApp($_GET['id'],$_SESSION['userID']);   
        }
        header("location:./apps.php");
        exit();
        break;
        case "unapprove":
         if(isset($_GET['id']))//redirect if id isn't defined
        {
            unapproveApp($_GET['id']);
           
        }
         header("location:./apps.php");
            exit();
        break;
        case "del":
        if(isset($_GET['id']))//redirect if id isn't defined
        {
            delApp($_GET['id']);
           
        }
         header("location:./apps.php");
            exit();
        break;
        case "pending":
        $sql='select apps.appID ,apps.appName ,apps.appShortDesc ,apps.appMainCatID,apps.appSubCatID,apps.appState,
        developers.developerName ,categories.catName from apps,developers,categories where 
        apps.developerID=developers.developerID and apps.appMainCatID=categories.catID AND apps.appState=0' ;
        $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
        if($result->num_rows==0)
        {
            echo "no apps pending requests";
        }
        else
        {
           displayApps($result);    
        }        
        break;
    }
}
else
{
 $sql='select apps.appID ,apps.appName ,apps.appShortDesc ,apps.appMainCatID,apps.appSubCatID,apps.appState,
        developers.developerName ,categories.catName from apps,developers,categories where 
        apps.developerID=developers.developerID and apps.appMainCatID=categories.catID';
        $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
        if($result->num_rows==0)
        {
            echo "no apps added yet";
        }
        else
        {
           displayApps($result);    
        }        
}   
?>
</div>
</div>

<?php
include_once('./layout/footer.php');
?>

</body>
</html>