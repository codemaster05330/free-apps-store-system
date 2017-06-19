<?php
include_once('dbconfig.php');
$id=$_GET['id'];
$sql="SELECT * FROM categories WHERE catParent=$id";
 $result=mysql_query($sql) or die("query failed due to ".mysql_error());
 if(mysql_num_rows($result)!=0)
 {
    echo" Sub Category: <select name='subCat' required><option value='-1'>Select Category</option>";
    while($row=mysql_fetch_assoc($result))
    {
         echo"<option value=\"{$row['catID']}\">{$row['catName']}</option>";
    }
    echo '</select>';
 }

?>