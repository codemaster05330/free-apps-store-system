<div id="upperBar">
<?php
if(!isset($Dir))
{
    $Dir="./";
}
include_once( $Dir.'includes/login.functions.php');
echo '<a href="'.$Dir.'/index.php"><h2>Free Apps Store</h2></a>';
?>
<div id="rightPanel">
<?php
//include_once('./includes/login.functions.php');
if(isset($_GET['logout']))
{
    logout();
    header("location:./");
    exit();
}
if(isSignedIn())
{
    echo 'wellcome '. $_SESSION['firstName'];
    echo '<a href="'.$Dir.'user/index.php" id="hrefBtn">Profile</a>';
    if($_SESSION['userLevel']==0)
    {
        echo '<a href="'.$Dir.'admin/index.php" id="hrefBtn">Admin Dashboard</a>';
    }
    elseif($_SESSION['userLevel']==1)
    {
        echo '<a href="'.$Dir.'developer/index.php" id="hrefBtn">Developer Dashboard</a>';
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