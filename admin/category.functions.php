<?php

/**
 * categories management functions[new,edit,del,display]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */
include_once('../includes/common.functions.php');

/**
 * create new category form
 */
 function newCatForm()
 {
    echo '<form action="category.php?action=add" method="post">
<label>Main Category <select name="mainCat"><option value="-1">noune</option>';
$sql='SELECT * FROM categories WHERE catParent IS NULL ';
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
while( $row=mysql_fetch_assoc($result))
{
    echo "<option value=\"{$row['catID']}\">{$row['catName']}</option>";
}
echo '</select></label><br />
<label>Category Name :</label><input type="text" name="name"/><br />
<input  type="submit" value="submit" name="submit"/>
</form>';
 }

?>

