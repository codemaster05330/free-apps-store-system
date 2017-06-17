<?php
include_once('user.functions.php');
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
        case "privilge":
         if(!isset($_GET['id']))//redirect if id isn't defined
        {
            header("location:./user.php");
            exit();
        }
        else
        {//get category record from db
        
            privilegeForm($_GET['id']);
            
        }
        break;
    }
}
else
{
    $sql="SELECT * FROM users";
   $result=mysql_query($sql) or die("query failed due to ".mysql_error());
   displayUsers($result);
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