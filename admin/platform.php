<?php
include_once('../includes/dbconfig.php');
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
       echo '<form action="./platform.php?action=add" method="post" enctype="multipart/form-data">
<label>Platform Name :</label><input type="text" name="name" /><br />
<label>Platform Icon :</label><input type="file" value="upload" name="icon" /><br />
<input  type="submit" name="submit" value="submit" />
</form>';
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