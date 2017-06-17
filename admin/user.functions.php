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
 
?>