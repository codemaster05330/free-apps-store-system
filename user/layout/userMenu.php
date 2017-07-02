<?php

/**
 * user navigation menu 
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */
 ?>
 <ul id="adminMenu">
 <li><a href="./index.php" id="hrefBtn">Dashboard</a></li>
 <li><a href="./editInfo.php" id="hrefBtn">edit Account</a></li>
 <?php
 if(isSignedIn())
{
    
    if($_SESSION['userLevel']==1)
    {
        echo '<li><a href="./editDevInfo.php" id="hrefBtn">developer</a></li>';
    }
   
}
 ?>
 <li><a href="./advSettings.php" id="hrefBtn">Advanced</a></li>
 </ul>