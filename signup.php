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
<form id="loginForm" method="post" action="">
<table id="form">
<tr><td id="error" colspan="2">
<?php
printError();
?> 
</td></tr>
<tr><td><label>First Name :</label></td><td><input type="text" name="fName" required /></td></tr>
<tr><td><label>Last Name :</label></td><td><input type="text" name="lName" required /></td></tr>
<tr><td><label>Email :</label></td><td><input type="email" name="userEmail" required /></td></tr>
<tr><td><label>Password :</label></td><td><input type="password" name="password1" required /></td></tr>
<tr><td><label>Password again :</label></td><td><input type="password" name="password2" required /></td></tr>
<tr><td colspan="2"><input type="submit" name="signup" value="sign up"/></td></tr>
</table>
</form>
</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>