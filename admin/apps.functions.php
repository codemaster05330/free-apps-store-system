<?php

/**
 * apps management functions[approve,disapprove,del,display]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */
include_once('../includes/common.functions.php');


/**
 * approve app
 * @param int $id app id
 * @param int $revId reviewer id
 */
 function approveApp($id,$revId)
 {
    $sql="UPDATE apps SET approvedBy=$revId,approvalDate= NOW() WHERE appID=$id ";  
          mysql_query($sql) or die("query failed due to ".mysql_error());
          logSuccess("app approved successfully");
 }

/**
  * unapprove app
  * @param int $id app id
  */
  function unapproveApp($id)
 {
    $sql="UPDATE apps SET approvedBy=NULL WHERE appID=$id ";  
          mysql_query($sql) or die("query failed due to ".mysql_error());
          logSuccess("app unapproved successfully");
 }
 
  /**
  * delete app
  * @param int $id app id
  */
  function delApp($id)
  {
    $sql="DELETE FROM apps WHERE appID=$id ";
    mysql_query($sql) or die("query failed due to ".mysql_error());
    logSuccess("app deleted successfully");
  }
 
?>