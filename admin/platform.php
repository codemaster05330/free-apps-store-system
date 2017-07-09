<?php
include_once('platform.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Platforms</title>
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
    if($_GET['action']=='new')
    {
        newPlatformForm();
    }
elseif($_GET['action']=='edit')
    {
        if(!isset($_GET['id']))//redirect if id isn't defined
        {
            header("location:./platform.php");
            exit();
        }
        else
        {//get platfrom record from db
        
            editPlatformForm($_GET['id']);
            
        }
    }
elseif($_GET['action']=='update')
{
    if(isset($_GET['id'])&&isset($_POST['submit']))//redirect if id  or no submit isn't defined
    {
        $name=$_POST['name'];
        $icon=$_FILES['icon']['tmp_name'];
        $id=$_GET['id']; 
        updatePlatform($id,$name,$icon);
    }
    
    header("location:./platform.php");
    exit();    
}
elseif($_GET['action']=='del')
{
    if(isset($_GET['id']))//redirect if id isn't defined
    {
        $id=$_GET['id'];
        delPlatform($id);
         
    }
     header("location:./platform.php");
     exit();
}
elseif($_GET['action']=='add')
{
    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $icon=$_FILES['icon']['tmp_name'];
        addPlatform($name,$icon);
    }
  header("location:./platform.php");
  exit();
    
}
    
}
else
{
    $sql="SELECT * FROM platforms";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    if($result->num_rows==0)
    {
        echo 'NO platforms defined yet , <a href="./platform.php?action=new" id="hrefBtn">add new platform</a>';
    }
    else
    {
        echo'<p><a href="./platform.php?action=new" id="hrefBtn">add new platform</a></p>';
        displayPlatforms($result);
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