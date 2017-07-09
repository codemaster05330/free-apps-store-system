<?php
include_once('./includes/common.functions.php');
include_once('./includes/login.functions.php');

if(isset($_POST['login']))
{
    $email=mysqli_real_escape_string($mysqli,$_POST['userEmail']);
    $password=mysqli_real_escape_string$mysqli($mysqli,$_POST['password']);
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
<form id="loginForm" method="post" action="./resetPassword.php">
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
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    if($result->num_rows==1)
    {
        $key=md5(uniqid(rand(),true));
        $row=$result->fetch_assoc();
        $id=$row['userID'];
        
        $sql="UPDATE users SET userKey='$key' WHERE userID=$id ";
        $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
            
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
    $sql ="SELECT userKey,userState FROM users WHERE userID={$_GET['x']} ";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    if($result->num_rows==1)
    {
       
         $row=$result->fetch_assoc();
         $key=$row['userKey'];
         $state=$row['userState'];
         if($key==$_GET['y'])
         { 
            echo '</td></tr>
         <tr><td><input type="hidden" name="id" value="'.$_GET['x'].'" /></td></tr>   
        <tr><td><input type="password" name="password1" required placeholder="type your new password " /></td></tr>
        <tr><td><input type="password" name="password2" required  placeholder="type your new password again "/></td></tr>
        <tr><td><input type="submit" name="reset" value="submit" id="hrefBtn" /></td></tr>';
            
         }
         else
         {
          logError("unknown reset link");
          header("location:./resetPassword.php");
          exit();  
         }
    }
    else
    {
        logError("unknown reset link");
         header("location:./resetPassword.php");
        exit();
    }
    
    
}
elseif(isset($_POST['reset']))
{
    //update new password
     $password1=mysqli_real_escape_string($mysqli,$_POST['password1']);
    $password2=mysqli_real_escape_string($mysqli,$_POST['password2']);
    $id=$_POST['id'];
    if($password1 == $password2)
    {
        $password=md5($password1);
         $sql="UPDATE users SET userKey='NULL',userState=1,userPassword='$password' WHERE userID=$id ";
         $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
         logSuccess("your password has been reseted successfully");
          header("location:./login.php");
                exit();   
    }
    
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