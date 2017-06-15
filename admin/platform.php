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
    if(!(isset($_GET['id'])&&isset($_POST['submit'])))//redirect if id  or no submit isn't defined
    {
            header("location:./platform.php");
            exit();
    }
    else
    {
          $name=$_POST['name'];
          $icon=$_FILES['icon']['tmp_name'];
          $icon=addslashes($icon);
          $icon=file_get_contents($icon);
          $icon=base64_encode($icon);
          $id=$_GET['id']; 
          
          $sql="UPDATE platforms SET platformName='$name',platformIcon='$icon' WHERE platformID=$id ";  
          mysql_query($sql) or die("query failed due to ".mysql_error());
          header("location:./platform.php");
          exit();
    }
    
}
elseif($_GET['action']=='del')
{
    if(isset($_GET['id']))//redirect if id isn't defined
    {
        $id=$_GET['id'];
        $sql="DELETE FROM platforms WHERE platformID=$id ";
        mysql_query($sql) or die("query failed due to ".mysql_error());
         
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
        $icon=addslashes($icon);
        $icon=file_get_contents($icon);
        $icon=base64_encode($icon);
        $sql="INSERT INTO platforms (platformName,platformIcon)VALUES('$name','$icon')";  
        mysql_query($sql) or die("query failed due to ".mysql_error());
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
        echo '<table><tr><th>Platform</th><th>actions</th></tr>';
        while($row=mysql_fetch_assoc($result))
        {
            echo '<tr><td><img id="smallIcon" src="data:image;base64,'.$row['platformIcon'].'">'.$row['platformName'].'</td>';
            echo '<td><a href="./platform.php?action=edit&id='.$row['platformID'].'" class="hrefBtn">edit</a>';
            echo '<a href="./platform.php?action=del&id='.$row['platformID'].'" class="hrefBtn">delete</a></td></tr>';
        }
        echo '</table>';
    }
    
} 
?>
</div>
<div id="footer"></div>
</div>
</body>
</html>