<?php
include_once('developers.functions.php');
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