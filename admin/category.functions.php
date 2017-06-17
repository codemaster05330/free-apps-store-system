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
<label>Main Category <select name="mainCat"><option value="-1">none</option>';
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


/**
 * create html form for edit an existing category and assign category values to it 
 * @param int $id category id in categories table
 */
 function editCategoryForm($id)
 {
    $sql="SELECT * FROM categories WHERE catID=$id";
            $result=mysql_query($sql) or die("query failed due to ".mysql_error());
            if(mysql_num_rows($result)==0)//redirect if unknown id 
            {
                logError("unkown category id");
              header("location:./category.php");
            exit();  
            }
            else
            {//load category content to be edited
             $row=mysql_fetch_assoc($result);
             $name=$row['catName'];
             $parent= $row['catParent'];
             $id=$row['catID'];
             echo '<form action="category.php?action=update&id='.$id.'" method="post">
                <label>Main Category <select name="mainCat"><option value="-1">none</option>';
                
                $sql='SELECT * FROM categories WHERE catParent IS NULL ';
                $result=mysql_query($sql) or die("query failed due to ".mysql_error());
                 
                 while($row=mysql_fetch_assoc($result))
                 {
                
                    if($row['catID']==$parent)
                    {
                        echo "<option value=\"{$row['catID']}\" selected=\"selected\" >{$row['catName']}</option>";
                    }
                    else
                    {
                        echo "<option value=\"{$row['catID']}\">{$row['catName']}</option>";
                    }
                }
            
                
                echo '</select></label><br />
                <label>Category Name :</label><input type="text" name="name" value="'.$name.'"/><br />
                <input  type="submit" value="submit" name="submit"/>
                </form>';
            }
 }
    
/**
 * update an existing category record
 * @param int $id category id
 * @param string $name category name
 * @param int $parent category parent
 */
 function updateCategory($id,$name,$parent)
 {
   
          $sql="UPDATE categories SET catName='$name',catParent=$parent WHERE catID=$id ";  
          mysql_query($sql) or die("query failed due to ".mysql_error());
          logSuccess("category updated successfully");
 } 
 
  /**
  * delete category from categories table
  * @param int $id category id
  */
  function delCategory($id)
  {
    $sql="DELETE FROM categories WHERE catID=$id ";
    mysql_query($sql) or die("query failed due to ".mysql_error());
    logSuccess("category deleted successfully");
  }
  
  /**
   * add new category to categories table
   * @param string $name category name
   * @param int $icon category icon
   */
  function addcategory($name,$parent)
  {
    $sql="INSERT INTO categories (catName,catParent)VALUES('$name',$parent)";  
    mysql_query($sql) or die("query failed due to ".mysql_error());
    logSuccess("category added successfully");
  }
 /**
    * display all categories
    * @param result $result query result
    */
   function displayCategories($result)
    {
        echo '<table><tr><th>Category</th><th>Parent Category</th><th>actions</th></tr>';
        while($row=mysql_fetch_assoc($result))
        {
            echo '<tr><td>'.$row['catName'].'</td>';
            $name='None';
            if($row['catParent']!= NULL)
            {
                $sql="SELECT * FROM categories WHERE catID={$row['catParent']}";
            $result2=mysql_query($sql) or die("query failed due to ".mysql_error());
             $row2=mysql_fetch_assoc($result2);
             $name=$row2['catName'];
            }
            echo '<td>'.$name.'</td>';
            echo '<td><a href="./category.php?action=edit&id='.$row['catID'].'" class="hrefBtn">edit</a>';
            echo '<a href="./category.php?action=del&id='.$row['catID'].'" class="hrefBtn">delete</a></td></tr>';
        }
        echo '</table>';
    }
    
?>

