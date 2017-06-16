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
 
 /**
  * echo succcess buffer and empty it 
  */
  function printSuccess()
  {
    global $successBuffer;
    $count=count($successBuffer);
    
    if($count>0)
    {
        //print success as unordered list
        echo '<ul id="successList">';
    for($i=0;$i<$count;$i++)
    {
        $suc=array_shift($successBuffer);
        echo "<li>$suc</li>";
    } 
    echo '</ul>'; 
    }
  }
  
  /**
   * add success msg to global success buffer
   * @param string $suc success msg to be added
   */
   function logSuccess($suc)
   {
    global $successBuffer;
    if($suc != "")
    {
       $successBuffer[]=$suc; 
    }
   }
   
?>