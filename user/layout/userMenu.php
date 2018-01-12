<?php

/**
 * user navigation menu 
 * 
 * @author mohamed hussein 
 * @copyright 2017
 */
 ?>
 <ul  class="list-group">
 <li><a href="./index.php" class="list-group-item">Dashboard</a></li>
 <li><a href="./editInfo.php" class="list-group-item">edit Account</a></li>
 <?php
 if(isSignedIn())
{
    
    if($_SESSION['userLevel']==1)
    {
        echo '<li class="list-group-item"><a href="./editDevInfo.php" id="hrefBtn">developer</a></li>';
    }
   
}
 ?>
 <li class="list-group-item"><a href="./advSettings.php">Advanced</a></li>
 </ul>