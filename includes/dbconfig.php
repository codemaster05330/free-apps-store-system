<?php

/**
 * @author mohamed hussein
 * @copyright 2017
 */

//enable output buffer
ob_start();

//start session
session_start();


//database credentials

define('DBHOSTNAME','localhost:3306');
define('DBUSERNAME','root');
define('DBPASSWORD','');
define('DBNAME','appstore');

//connet to mysql database
$conn=mysql_connect(DBHOSTNAME,DBUSERNAME,DBPASSWORD) or die('connection to database failed due to '.mysql_error());
//select required database
$conn=mysql_select_db(DBNAME)or die('selecting database failed due to '.mysql_error());

?>