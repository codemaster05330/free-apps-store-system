<?php
include_once('./includes/common.functions.php');
include_once('./includes/login.functions.php');

if(isset($_POST['login']))
{
    if(isset($_POST['remember']))
    {
        setcookie("userEmail",$_POST['userEmail'],time()+ (10 * 365 * 24 * 60 * 60));
        setcookie('userPassword',$_POST['password'],time()+ (10 * 365 * 24 * 60 * 60));
    }
    else
    {
        
        $past=time()-100;
        if(isset($_COOKIE['userEmail']))
        {
            setcookie("userEmail","",$past);
        } 
        if(isset($_COOKIE['userPassword']))
        {
            setcookie('userPassword',"",$past);
        }
        
        
    }
    $email=mysql_real_escape_string($_POST['userEmail']);
    $password=mysql_real_escape_string($_POST['password']);
    signin($email,$password);
    
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="./styles/mainStyle.css" type="text/css"/>
</head>

<body>

<div id="upperPanel">
<?php
include_once('./layout/upperBar.php');
include_once('./layout/searchPanel.php');
?>
</div>
<div id="wrapper">
<div id="loginContent">
<form id="loginForm" method="post" action="">
<table>
<tr><td id="error">
<?php
printError();
printSuccess();
?>
</td></tr>
<tr><td><input type="email" name="userEmail" placeholder="type your email " <?php  if(isset($_COOKIE['userEmail'])){echo 'value="'.$_COOKIE['userEmail'].'"';}?> required /></td></tr>
<tr><td><input type="password" name="password" placeholder="type your password " <?php  if(isset($_COOKIE['userPassword'])){echo 'value="'.$_COOKIE['userPassword'].'"';}?> required /></td></tr>
<tr><td><input type="checkbox" name="remember" <?php  if(isset($_COOKIE['userEmail'])){echo 'checked ';}?>/> remember me</td></tr>
<tr><td><a href="resetPassword.php">forgot password</a></td></tr>
<tr><td><input type="submit" name="login" value="sign in" id="hrefBtn" />
<input type="button" value="sign up" id="hrefBtn"  onclick="location.href='./signup.php'"/></td></tr>

</table>
</form>
</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>