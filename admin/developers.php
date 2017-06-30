<?php
include_once('developers.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Developers</title>
    <link rel="stylesheet" href="../styles/mainStyle.css" type="text/css"/>
    <link rel="stylesheet" href="../styles/dashboard.css" type="text/css"/>
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
         approveDeveloper($_GET['id'],$_SESSION['id']);   
        }
        header("location:./developers.php");
        exit();
        break;
        case "unapprove":
         if(isset($_GET['id']))//redirect if id isn't defined
        {
            unapproveDeveloper($_GET['id']);
           
        }
         header("location:./developers.php");
            exit();
        break;
        case "del":
        if(isset($_GET['id']))//redirect if id isn't defined
        {
            delDeveloper($_GET['id']);
           
        }
         header("location:./developers.php");
            exit();
        break;
        case "pending":
        
        $sql='select developers.developerID,developers.developerName,developers.developerEmail,developers.approvedBy,developers.developerWebsite
        ,users.userFirstName,users.userLastName from developers,users where developers.authorID=users.userID AND developers.approvedBy IS NULL';
         $result=mysql_query($sql) or die("query failed due to ".mysql_error());
         if(mysql_num_rows($result)==0)
        {
            echo "no developers pending requests ";
        }
        else
        {
            displayDevelopers($result);
        }
        break;
        }
}
else
{
      $sql='select developers.developerID,developers.developerName,developers.developerEmail,developers.approvedBy,developers.developerWebsite
        ,users.userFirstName,users.userLastName from developers,users where developers.authorID=users.userID';
         $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    if(mysql_num_rows($result)==0)
    {
        echo "no developers acounts till now";
    }
    else
    {
        displayDevelopers($result);
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