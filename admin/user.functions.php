<?php

/**
 * users managment functions[new,change Privilege,del,display]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */

include_once('../includes/dbconfig.php');
include_once('../includes/common.functions.php');

/**
 * delete user
 * @param int $id user id to be deleted
 */
 function delUser($id)
 {
    $sql="DELETE FROM users WHERE userID=$id ";
    mysql_query($sql) or die("query failed due to ".mysql_error());
    logSuccess("user deleted successfully");
 }
 
 /**
  * change user privilege form
  * @param int $id user id
  */
  function privilegeForm($id)
  {
    $sql="SELECT * FROM users WHERE userID=$id";
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    if(mysql_num_rows($result)==0)//redirect if unknown id 
    {
        logError("unkown user id");
        header("location:./user.php");
        exit();  
    }
     else
    {//load user content to be edited
    $row=mysql_fetch_assoc($result);
    $level=$row['userLevel'];
    if($level==0)
    {
        $level="Admin";
    }
    elseif($level==1)
    {
        $level="Developer";
    }
    else
    {
        $level="Normal User";
    }
    echo '<form action="user.php?action=updateLevel&id='.$id.'" method="post">
<label>Current Privilege : <strong>'.$level.'</strong></label> <br />
<label>New Privilege :</label><select name="level">
<option value="0">Admin</option>
<option value="1">Developer</option>
<option value="2">Normal User</option>
</select><br />
<input type="submit" name="submit" value="submit" />
</form>';
    }
  }
  
  /**
   * update user privilege 
   * @param int $id user id
   * @param int $level new privilege
   */
   function updatePrivilege($id,$level)
   {
    $sql="UPDATE users SET userLevel=$level WHERE userID=$id ";  
    mysql_query($sql) or die("query failed due to ".mysql_error());
    logSuccess("user privilege updated successfully");
   }
  
?>
