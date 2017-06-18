<?php

/**
 * reviews management functions[approve,disapprove,del,display]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */
include_once('../includes/common.functions.php');

/**
 * approve review
 * @param int $id review id
 * @param int $revId reviewer id
 */
 function approveReview($id,$revId)
 {
    $sql="UPDATE reviews SET approvedBy=$revId,approvalDate= NOW() WHERE reviewID=$id ";  
          mysql_query($sql) or die("query failed due to ".mysql_error());
          logSuccess("review approved successfully");
 }
 
 /**
  * disapprove review
  * @param int $id review id
  */
  function disapproveReview($id)
 {
    $sql="UPDATE reviews SET approvedBy=NULL WHERE reviewID=$id ";  
          mysql_query($sql) or die("query failed due to ".mysql_error());
          logSuccess("review disapproved successfully");
 }
 
?>