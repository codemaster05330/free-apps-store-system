<?php
include_once('./includes/common.functions.php');
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
<form id="loginForm">
<p id="error">
<?php
printError();
?> 
</p>
<input type="email" name="userEmail" placeholder="type your email "  required /><br/>
<input type="password" name="password" placeholder="type your password "  required /><br/>
<input type="checkbox" name="remember"/> <label>remember me </label><br/>
<input type="submit" name="login" value="sign in" />
<input type="button" name="login" value="sign up"/>
</form>
</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>