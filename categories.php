<?php
include_once('./includes/common.functions.php');
include_once('./appsfilter.php'); 
?>
<div id="categoriesBar">
<table>
<tr><th>Categories</th></tr>
<?php
$sql="SELECT * FROM categories WHERE catParent IS NULL";
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
while($row=mysql_fetch_assoc($result))
{
    
    if(isset($_SESSION['mCat']) &&$_SESSION['mCat']==$row['catID'] )
    {
         echo '<tr><td><a href="?mc='.$row['catID'].'">'.$row['catName'].'</a>';
        $sql2="SELECT * FROM categories WHERE catParent ={$_SESSION['mCat']}";
        $result2=mysql_query($sql2) or die("query failed due to ".mysql_error());
        if(mysql_num_rows($result2) != 0)
        {
            
        
        
        echo '<ul>';
        while($row2=mysql_fetch_assoc($result2))
        {
             echo '<li><a href="?sc='.$row2['catID'].'">'.$row2['catName'].'</a></li>'; 
        }
        echo '</ul></td></tr>'; 
        }
    }
    else
    {
     echo '<tr><td><a href="?mc='.$row['catID'].'">'.$row['catName'].'</a></td></tr>';   
    }   
}
?>
</table>
</div>