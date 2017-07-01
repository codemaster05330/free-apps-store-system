<?php
include_once('./includes/common.functions.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Registration Confirmation</title>
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


<?php
printError();
if(isset($_GET['x']) && isset($_GET['y']))
{
    $sql ="SELECT userKey,userState FROM users WHERE userID={$_GET['x']} ";
    $result=mysql_query($sql)or die("query failed ".mysql_error());
    if(mysql_num_rows($result)==1)
    {
         $row=mysql_fetch_assoc($result);
         $key=$row['userKey'];
         $state=$row['userState'];
         if($state==0 && $key==$_GET['y'])
         {
            $sql="UPDATE users SET userKey='NULL',userState=1 WHERE userID={$_GET['x']} ";
            $result=mysql_query($sql)or die("query failed ".mysql_error());
            echo '<div id="loginForm">
            your acount has successfully activated,you can  now <a href="./login.php"id="hrefBtn">login</a>
            </div>';
            
         }
    }
    
}
else if(isset($_GET['x']))
{
    echo '<form id="loginForm" action="" method="get"><p id="error">';
    echo '<strong>your accout has created successfully activation key has been sent to your email.</strong>';
    echo '</p><table id="form">';
    echo "<input type=\"hidden\" name=\"x\" value=\"{$_GET['x']}\" />";
echo '<tr><td><label>Activation Key :</label></td><td><input type="text" name="y" required /></td></tr>
<tr><td colspan="2"><input type="submit" name="activate" value="submit"/></td></tr>
</table>
</form>';
}
?> 

</div>
</div>
<?php
include_once('./layout/footerBar.php');
?>
</body>
</html>