<?php

/**
 * apps management functions[delete,publish,unpublish,display]
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */
include_once('../includes/common.functions.php');

/**
 * delete an app owned by developer
 * @param int $appID app id
 * @param int $devID developer id
 */
 function delDevApp($appID,$devID)
 {
    $sql="DELETE FROM apps WHERE appID=$appID AND developerID=$devID ";
    mysql_query($sql) or die("query failed due to ".mysql_error());
    logSuccess("app deleted successfully");
 }
 
 /**
  * change state of an app from unpublished to published
  * @param int $appID app id
  * @param int $devID developer id
  */ 
  function publishApp($appID,$devID)
  {
    $sql="UPDATE apps SET appState=1 WHERE appID=$appID AND developerID=$devID ";
    mysql_query($sql) or die("query failed due to ".mysql_error());
    logSuccess("app published successfully");
  }
  
?>