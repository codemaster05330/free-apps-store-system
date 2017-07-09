<?php
include_once('dbconfig.php');
$id=$_GET['id'];
$sql="SELECT * FROM categories WHERE catParent=$id";
 $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
 if($result->num_rows!=0)
 {
    echo" Sub Category: <select name='subCat' required><option value='-1'>Select Category</option>";
    while($row=$result->fetch_assoc())
    {
         echo"<option value=\"{$row['catID']}\">{$row['catName']}</option>";
    }
    echo '</select>';
 }

?>