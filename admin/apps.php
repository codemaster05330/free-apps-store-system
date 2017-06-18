<?php
include_once('apps.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard</title>
</head>

<body>
<div id="wrapper">
<div id="upperPanel">
<?php
include_once('./layout/upperPanel.php');
?>
</div>
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
         approveApp($_GET['id'],$_SESSION['id']);   
        }
        header("location:./apps.php");
        exit();
        break;
        case "unapprove":
         if(isset($_GET['id']))//redirect if id isn't defined
        {
            unapproveApp($_GET['id']);
           
        }
         header("location:./reviews.php");
            exit();
        break;
    }
}
else
{
 $sql='select apps.appID ,apps.appName ,apps.appShortDesc ,apps.appMainCatID,apps.appSubCatID,apps.approvedBy,
        developers.developerName ,categories.catName from apps,developers,categories where 
        apps.developerID=developers.developerID and apps.appMainCatID=categories.catID';
        $result=mysql_query($sql) or die("query failed due to ".mysql_error());
        if(mysql_num_rows($result)==0)
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
<div id="footer">
<?php
include_once('./layout/footer.php');
?>
</div>
</div>
</body>
</html>