<?php
include_once('./includes/common.functions.php');

if(isset($_GET['action']) && isset($_GET['id']))
{
    $id=$_GET['id'];
    
    if($_GET['action']=='activate')
    {
        $sql="SELECT userID,userEmail,userKey FROM users WHERE userID=$id ";
        $result=mysql_query($sql)or die("query failed ".mysql_error());
         if(mysql_num_rows($result)==1)
         {
           $row=mysql_fetch_assoc($result);
           $email=$row['userEmail'];
           $key=$row['userKey'];
           
           $to=$email;
           $subject="Registration Confirmation";
           $body="<p>Thank you for registering at Free App Store.</p>
			<p>To activate your account, please click on this link: <a href=\"./activate.php?x=$id&y=$key\">././activate.php?x=$id&y=$key</a></p>
			<p>your activation key is : $key</p>
            <p>Regards Site Admin</p>"; 
            
            $ret=mail($to,$subject,$body);
            if($ret==true)
            {
                header("location:./activate.php?x=$id");
                exit();
            }
            else
            {
                echo "something went wrong";
            }
         }
      }   
    elseif($_GET['action']=='reset')
    {
         $sql="SELECT userID,userEmail,userKey FROM users WHERE userID=$id ";
        $result=mysql_query($sql)or die("query failed ".mysql_error());
         if(mysql_num_rows($result)==1)
         {
           $row=mysql_fetch_assoc($result);
           $email=$row['userEmail'];
           $key=$row['userKey'];
           
           $to=$email;
           $subject="Password Reset";
           $body="<p>You requested that the password be reset.</p>
			<p>If this was a mistake, just ignore this email and nothing will happen.</p>
			<p>To reset your password, visit the following address: <a href=\"./resetPassword.php?x=$id&y=$key\">./resetPassword.php?x=$id&y=$key</a></p>
            <p>Regards Site Admin</p>"; 
            
            $ret=mail($to,$subject,$body);
            if($ret==true)
            {
                //echo "$body";
                logSuccess("Please check your inbox for a reset link.");
                header("location:./resetPassword.php");
                exit();
            }
            else
            {
                echo "something went wrong";
            }
         }
    }
    
}
else
{
    header('location:./index.php');
    exit();
} 
?>