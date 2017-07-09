<?php
include_once('./includes/common.functions.php');
if(isset($_POST['signup']))
{
    $email=mysqli_real_escape_string($mysqli,$_POST['userEmail']);
    $password1=mysqli_real_escape_string($mysqli,$_POST['password1']);
    $password2=mysqli_real_escape_string($mysqli,$_POST['password2']);
    $firstName=mysqli_real_escape_string($mysqli,$_POST['fName']);
    $lastName=mysqli_real_escape_string($mysqli,$_POST['lName']);
    
    if($password1 != $password2)
    {
        logError("passwords aren't matched.");
    }
    else
    {
    $password1=md5($password1);
    
    $sql="SELECT * FROM users WHERE userEmail='$email'";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    if($result->num_rows==1)
    {
        logError("already registered email.");
    }
    else
    {
        $key=md5(uniqid(rand(),true));
        
        $sql ="INSERT INTO users (userEmail,userPassword,userFirstName,userLastName,userLevel,joinDate,userKey,userState) VALUES
                ('$email','$password1','$firstName','$lastName',2,NOW(),'$key',0)";
        $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
        logSuccess("account created succeffuly");
        $id=$mysqli->insert_id;
        header("location:./mailSender.php?action=activate&id=$id");
        exit();
    }
    
    }
    
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>sign up</title>
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