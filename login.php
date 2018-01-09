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
    $email=mysqli_real_escape_string($mysqli,$_POST['userEmail']);
    $password=mysqli_real_escape_string($mysqli,$_POST['password']);
    signin($email,$password);
    
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>login</title>
    <link rel="stylesheet" href="./styles/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="./styles/bootstrap_custom.css" type="text/css"/>
    <link rel="stylesheet" href="./styles/mainStyle.css" type="text/css"/>
</head>

<body>

<div id="upperPanel">
<?php
include_once('./layout/upperBar.php');
//include_once('./layout/searchPanel.php');
?>
</div>
<div class=" container">
<?php
include_once('./layout/searchPanel.php');
?>    
<div class="row">
<div class="col col-md-4 col-md-offset-4">
   <div class="panel panel-success">
    <div class="panel-heading">
        LogIn
    </div>
    <div class="panel-body">
     
<form id="loginForm" method="post" action="" class="form">
<div class="form-group alert-warning">
<?php
printError();
printSuccess();
?>
</div>
<div class="form-group">
<input type="email" class="form-control" name="userEmail" placeholder="type your email " <?php  if(isset($_COOKIE['userEmail'])){echo 'value="'.$_COOKIE['userEmail'].'"';}?> required />
</div>
<div class="form-group">
    <input type="password" class="form-control" name="password" placeholder="type your password " <?php  if(isset($_COOKIE['userPassword'])){echo 'value="'.$_COOKIE['userPassword'].'"';}?> required />
   </div> 
<div class="form-group">
<input type="checkbox" name="remember" <?php  if(isset($_COOKIE['userEmail'])){echo 'checked ';}?>/> remember me</div>
<div class="form-group">
<a href="resetPassword.php">forgot password</a></div>
<div class="form-group">
<input type="submit" name="login" value="sign in" class="btn btn-success" />
<input type="button" value="sign up" id="hrefBtn"  onclick="location.href='./signup.php'" class="btn btn-primary"/></div>


</form>
</div>
</div>
</div>
</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>