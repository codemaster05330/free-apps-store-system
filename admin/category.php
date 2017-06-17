<?php
include_once('category.functions.php');
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
    switch ($_GET['action'])
    {
        case "new":
        newCatForm();
        break;
        case "edit":
        if(!isset($_GET['id']))//redirect if id isn't defined
        {
            header("location:./category.php");
            exit();
        }
        else
        {//get category record from db
        
            editCategoryForm($_GET['id']);
            
        }
        break;
        
        case "update":
        if(isset($_GET['id'])&&isset($_POST['submit']))//redirect if id  or no submit isn't defined
        {
        $name=$_POST['name'];
        $parent=$_POST['mainCat'];
        if($parent=="-1")
        {
            $parent='NULL';
        }
        $id=$_GET['id']; 

        updateCategory($id,$name,$parent);
        }
    
        header("location:./category.php");
        exit();  
        break;
    }
}
else
{
   $sql="SELECT * FROM categories";
   $result=mysql_query($sql) or die("query failed due to ".mysql_error());
   if(mysql_num_rows($result)==0)
    {
        echo 'NO categories defined yet , <a href="./category.php?action=new" class="hrefBtn">add new category</a>';
    }
    else
    {
        echo '<p><a href="./category.php?action=new" class="hrefBtn">add new category</a></p>';
        displayCategories($result);
    }
    
}
?>
</div>
<div id="footer"></div>
</div>
</body>
</html>