<?php
//include_once('./common.functions.php');


/**
 *login if username and password match
 * @param string user email
 * @param string password
 * */
 
 function signin($email,$password)
 {
    $email=mysql_real_escape_string($email);
    $password=mysql_real_escape_string($password);
    
    //calculate md5 hash for password
    $password=md5($password);
    
    $sql="SELECT * FROM users WHERE userEmail ='$email' AND userPassword='$password'";

    $result=mysql_query($sql)or die("query failed ".mysql_error());
    if(mysql_num_rows($result)==1)
    {
         $row=mysql_fetch_assoc($result);
         
        if($row['userState']==0)//unactivated account
        {
          logError("This account hasn't activated yet.");  
        }
        else
        {
        $_SESSION['athorized']=true;
        $_SESSION['userID']=$row['userID'];
        $_SESSION['userLevel']=$row['userLevel'];
        $_SESSION['firstName']=$row['userFirstName'];
        $_SESSION['lastName']=$row['userLastName'];
        header("location:./");
        exit();
        }
    }
    else
    {
        logError("wrong username or password");
       
    }
    
 }
 
 /**
   * log out 
   * */
   function logout()
   {
     if(isset($_SESSION['athorized']))
    {
        unset($_SESSION['athorized']);
    }
   }
   
   /**
  * check if user signed in or not
  * @return boolean true if signed or false
  * */
   
  function isSignedIn()
  {
    if(isset($_SESSION['athorized']))
    {
        return true;
    }
    else
    {
        return false;
    }
  } 
?>