<div id="upperBar">
<a href="./index.php"><h2>Free Apps Store</h2></a>
<div id="rightPanel">
<?php
include_once('./includes/login.functions.php');
if(isset($_GET['logout']))
{
    logout();
}
if(isSignedIn())
{
    echo 'wellcome '. $_SESSION['firstName'];
    if($_SESSION['userLevel']==0)
    {
        echo '<a href="./admin/index.php" id="hrefBtn">Admin Dashboard</a>';
    }
    elseif($_SESSION['userLevel']==1)
    {
        echo '<a href="./developer/index.php" id="hrefBtn">Developer Dashboard</a>';
    }
    echo '<a href="?logout" id="hrefBtn">logout</a>';
}
else
{
    echo 'wellcome Guest,<a href="./login.php" id="hrefBtn">LogIn</a> <a href="./signup.php" id="hrefBtn">SignUp</a>';
}
?>
</div>
</div>