<?php
include_once('platform.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Admin Dashboard</title>
</head>

<body>
<div id="wrapper">
<div id="upperPanel"></div>
<div id="navigationBar"></div>
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
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    if(mysql_num_rows($result)==0)
    {
        echo 'NO platforms defined yet , <a href="./platform.php?action=new" class="hrefBtn">add new platform</a>';
    }
    else
    {
        echo'<p><a href="./platform.php?action=new" class="hrefBtn">add new platform</a></p>';
        displayPlatforms($result);
    }
    
} 
?>
</div>
<div id="footer"></div>
</div>
</body>
</html>