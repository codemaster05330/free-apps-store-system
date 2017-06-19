<?php
include_once('dbconfig.php');
$id=$_POST['id'];
$sql="SELECT * FROM categories WHERE catParent=$id";
 $result=mysql_query($sql) or die("query failed due to ".mysql_error());
 if(mysql_num_rows($result)!=0)
 {
    echo"<select name='subCat'><option value='-1'>Select Sub Category</option>";
    while($row=mysql_fetch_assoc($result))
    {
         echo"<option value=\"{$row['catID']}\">{$row['catName']}</option>";
    }
    echo '</select>';
 }

?>