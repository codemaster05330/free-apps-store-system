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
 
?>