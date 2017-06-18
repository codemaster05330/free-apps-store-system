<?php

/**
 * reviews management functions[approve,disapprove,del,display]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */
include_once('../includes/common.functions.php');
/**
 * approve developer
 * @param int $id developer id
 * @param int $revId reviewer id
 */
 function approveDeveloper($id,$revId)
 {
    $sql="UPDATE developers SET approvedBy=$revId,approvalDate= NOW() WHERE developerID=$id ";  
          mysql_query($sql) or die("query failed due to ".mysql_error());
          logSuccess("developer approved successfully");
 }
 /**
  * unapprove developer
  * @param int $id developer id
  */
  function unapproveDeveloper($id)
 {
    $sql="UPDATE developers SET approvedBy=NULL WHERE developerID=$id ";  
          mysql_query($sql) or die("query failed due to ".mysql_error());
          logSuccess("developer unapproved successfully");
 }

?>