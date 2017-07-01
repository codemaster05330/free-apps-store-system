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
    <title>Reset Password</title>
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
if(isset($_POST['sendLink']))
{
    //send reset link to user
    $email=$_POST['userEmail'];
    $sql="SELECT * FROM users WHERE userEmail='$email'";
    $result=mysql_query($sql)or die("query failed ".mysql_error());
    if(mysql_num_rows($result)==1)
    {
        $key=md5(uniqid(rand(),true));
        $row=mysql_fetch_assoc($result);
        $id=$row['userID'];
        
        $sql="UPDATE users SET userKey='$key' WHERE userID=$id ";
        $result=mysql_query($sql)or die("query failed ".mysql_error());
            
        header("location:./mailSender.php?action=reset&id=$id");
        exit();
    }
    else
    {
        logError("unregistered email ");
        header("location:./resetPassword.php");
        exit();
    }
        
        
}
elseif(isset($_GET['x']) && isset($_GET['y']))
{
    //show reset form 
    
}
elseif(isset($_POST['reset']))
{
    //update new password
    
}
else
{
 //show email form 
   echo '</td></tr>
<tr><td><input type="email" name="userEmail" placeholder="type your email "  required /></td></tr>
<tr><td><input type="submit" name="sendLink" value="submit" id="hrefBtn" /></td></tr>';
}

?>

</table>
</form>
</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>