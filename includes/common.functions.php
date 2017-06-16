<?php

/**
 * common functions used in the system
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */

include_once('dbconfig.php');

//define global error buffer
$errorBuffer=array();
//define global success buffer
$successBuffer=array();

/**
 * echo error bufffer content and empty it 
 */
 function printError()
 {
    global $errorBuffer;
    $count=count($errorBuffer);
    
    if($count>0)
    {
        //print errors as unordered list
        echo '<ul id="errorList">';
    for($i=0;$i<$count;$i++)
    {
        $er=array_shift($errorBuffer);
        echo "<li>$er</li>";
    } 
    echo '</ul>'; 
    }
    
 }
 
 /**
  * add error msg in global error buffer
  * @param string $err error msg tobe added
  */
  function logError($err)
  {
    global $errorBuffer;
    $errorBuffer[]=$err;
  }
 
 logError("error1");
 logError("error2");
 logError("error3");
 printError();
?>