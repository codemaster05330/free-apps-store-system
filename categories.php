<?php
include_once('./includes/common.functions.php');
include_once('./appsfilter.php'); 
?>
<div id="categoriesBar">
    <p class="text-center"><span class="label label-primary label-main">Categories</span></p>
<table class="table table-condensed">
<?php
$sql="SELECT * FROM categories WHERE catParent IS NULL";
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
while($row=$result->fetch_assoc())
{
    
    if(isset($_SESSION['mCat']) &&$_SESSION['mCat']==$row['catID'] )
    {
         echo '<tr><td><a href="?mc='.$row['catID'].'">'.$row['catName'].'</a>';
        $sql2="SELECT * FROM categories WHERE catParent ={$_SESSION['mCat']}";
        $result2=$mysqli->query($sql2)or die("query failed due to ".mysqli_error());
        if($result2->num_rows != 0)
        {
            
        
        
        echo '<ul>';
        while($row2=$result2->fetch_assoc())
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