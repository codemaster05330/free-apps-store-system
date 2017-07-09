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
    global $mysqli;
    $sql="UPDATE developers SET approvedBy=$revId,approvalDate= NOW() WHERE developerID=$id ";  
         $mysqli->query($sql)or die("query failed due to ".mysqli_error());
          logSuccess("developer approved successfully");
 }
 /**
  * unapprove developer
  * @param int $id developer id
  */
  function unapproveDeveloper($id)
 {
    global $mysqli;
    $sql="UPDATE developers SET approvedBy=NULL WHERE developerID=$id ";  
          $mysqli->query($sql)or die("query failed due to ".mysqli_error());
          logSuccess("developer unapproved successfully");
 }

 /**
  * delete developer
  * @param int $id developer id
  */
  function delDeveloper($id)
  {
    global $mysqli;
    $sql="DELETE FROM developers WHERE developerID=$id ";
   $mysqli->query($sql)or die("query failed due to ".mysqli_error());
    logSuccess("developer deleted successfully");
  }
  
   
 /**
  * display all developers and management actions
  * @param result $result query result
  */
  function displayDevelopers($result)
  {
    global $mysqli;
    echo '<table><tr><th>N</th><th>Name</th><th>Email</th> <th>Website</th> <th>Author</th><th>actions</th></tr>';
       $count=1;
        while($row=$result->fetch_assoc())
        {
            if($row['approvedBy']==NULL)
            {
                echo '<tr id="unapproved">';
                $action="approve";
                $actionStr="approve";
            }
            else
            {
                echo '<tr id="approved">';
                $action="unapprove";
                $actionStr="unapprove";
            }
            echo '<td>'.$count.'</td>';
            $count++;
            echo '<td>'.$row['developerName'].'</td>';
            echo '<td>'.$row['developerEmail'].'</td>';
            echo '<td>'.$row['developerWebsite'].'</td>';
            echo '<td>'.$row['userFirstName'].' '.$row['userLastName'].'</td>';
            echo '<td><a href="./developers.php?action='.$action.'&id='.$row['developerID'].'" id="hrefBtn">'.$actionStr.'</a>';
            echo '<a href="./developers.php?action=del&id='.$row['developerID'].'" id="hrefBtn">delete</a>';
            echo '<a href="../developer.php?id='.$row['developerID'].'" id="hrefBtn">view</a></td></tr>';
        }
        echo '</table>';
  }
  
 
?>