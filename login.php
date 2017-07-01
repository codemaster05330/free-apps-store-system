<?php
include_once('./includes/common.functions.php');
include_once('./includes/login.functions.php');

if(isset($_POST['login']))
{
    $email=mysql_real_escape_string($_POST['userEmail']);
    $password=mysql_real_escape_string($_POST['password']);
    signin($email,$password);
    
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>download</title>
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
?>
</td></tr>
<tr><td><input type="email" name="userEmail" placeholder="type your email "  required /></td></tr>
<tr><td><input type="password" name="password" placeholder="type your password "  required /></td></tr>
<tr><td><input type="checkbox" name="remember"/> remember me</td></tr>
<tr><td><a href="resetPassword.php">forgot password</a></td></tr>
<tr><td><input type="submit" name="login" value="sign in" id="hrefBtn" />
<input type="button" name="logout" value="sign up" id="hrefBtn" /></td></tr>

</table>
</form>
</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>