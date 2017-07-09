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
    global $mysqli;
      $sql="UPDATE apps SET approvedBy=$revId,approvalDate= NOW() WHERE appID=$id ";  
         // mysql_query($sql) or die("query failed due to ".mysql_error());
         $mysqli->query($sql)or die("query failed due to ".mysqli_error());
         logSuccess("app approved successfully");
 }

/**
  * unapprove app
  * @param int $id app id
  */
  function unapproveApp($id)
 {
    global $mysqli;
    $sql="UPDATE apps SET approvedBy=NULL WHERE appID=$id ";  
         // mysql_query($sql) or die("query failed due to ".mysql_error());
          $mysqli->query($sql)or die("query failed due to ".mysqli_error());
          logSuccess("app unapproved successfully");
 }
 
  /**
  * delete app
  * @param int $id app id
  */
  function delApp($id)
  {
    global $mysqli;
    $sql="DELETE FROM apps WHERE appID=$id ";
    //mysql_query($sql) or die("query failed due to ".mysql_error());
     $mysqli->query($sql)or die("query failed due to ".mysqli_error());
    logSuccess("app deleted successfully");
  }
 
 /**
  * display all apps and management actions
  * @param result $result query result
  */
  function displayApps($result)
  {
    global $mysqli;
    echo '<table><tr><th>N</th><th>App</th><th>short description</th><th>App Category</th><th>Author</th>  <th>actions</th></tr>';
       $count=1;
        while($row=$result->fetch_assoc())
        {
            if($row['appState']==0)
            {
                echo '<tr id="unapproved">';
                $action="approve";
                $actionStr="approve";
            }
            else if($row['appState']==1)
            {
                echo '<tr id="approved">';
                $action="unapprove";
                $actionStr="unapprove";
            }
            echo '<td>'.$count.'</td>';
            $count++;
            echo '<td id="appName">'.$row['appName'].'</td>';
            echo '<td>'.$row['appShortDesc'].'</td>';
            $mainCat=$row['catName'];
            $subCat="";
            if($row['appSubCatID']!=NULL)
            {
                $sql="SELECT * FROM categories WHERE catID={$row['appSubCatID']}";
            $result2=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
             $row2=$result2->fetch_assoc();
             $mainCat=$row2['catName'];
             
              $subCat=' >> '.$row['catName'];
            }
            
            echo '<td>'.$mainCat.' '.$subCat.'</td>';
            echo '<td>'.$row['developerName'].'</td>';
            echo '<td><a href="./apps.php?action='.$action.'&id='.$row['appID'].'" id="hrefBtn">'.$actionStr.'</a>';
            echo '<a href="./apps.php?action=del&id='.$row['appID'].'" id="hrefBtn">delete</a>';
             echo '<a href="../app.php?appID='.$row['appID'].'" id="hrefBtn">view</a></td></tr>';
        }
        echo '</table>';
  }

?>