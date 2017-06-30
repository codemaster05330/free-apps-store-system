<?php
include_once('user.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Users</title>
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
        case "updateLevel":
        if(isset($_GET['id'])&&isset($_POST['submit']))//redirect if id  or no submit isn't defined
        {
        $level=$_POST['level'];
        $id=$_GET['id']; 
        updatePrivilege($id,$level);
        }
    
        header("location:./user.php");
        exit();  
        break;
        case "del":
        if(isset($_GET['id']))//redirect if id isn't defined
        {
        $id=$_GET['id'];
        delUser($id);
         
        }
     header("location:./user.php");
     exit();
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
</div>
<?php
include_once('./layout/footer.php');
?>


</body>
</html>