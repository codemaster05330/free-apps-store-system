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
    global $mysqli;
    
    $sql="DELETE FROM apps WHERE appID=$appID AND developerID=$devID ";
    $mysqli->query($sql)or die("query failed due to ".mysqli_error());
    logSuccess("app deleted successfully");
 }
 
 /**
  * change state of an app from unpublished to published
  * @param int $appID app id
  * @param int $devID developer id
  */ 
  function publishDevApp($appID,$devID)
  {
    global $mysqli;
    $sql="UPDATE apps SET appState=1 WHERE appID=$appID AND developerID=$devID ";
    $mysqli->query($sql)or die("query failed due to ".mysqli_error());
    logSuccess("app published successfully");
  }
  
  /**
   * change state of an app from published to unpublished
   * @param int $appID app id
   * @param int $devID developer id
   */ 
  function unpublishDevApp($appID,$devID)
  {
    global $mysqli;
    $sql="UPDATE apps SET appState=3 WHERE appID=$appID AND developerID=$devID ";
    $mysqli->query($sql)or die("query failed due to ".mysqli_error());
    logSuccess("app unpublished successfully");
  } 
  
 /**
  * display apps related to developer
   * @param int $devID developer id
   */ 
  function displayDevApps($devID)
  {
    global $mysqli;
    
     $sql="SELECT appID,appName,appIcon,appReleaseDate,appRating,appState FROM apps WHERE developerID=$devID";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    if($result->num_rows==0)
    {
        echo "you havn't added apps yet.";
        echo '<a href="./newApp.php" id="hrefBtn"> new App</a>';
    }
    else
    {
        echo '<a href="./newApp.php" id="hrefBtn"> new App</a>';
        echo '<table class="appsList"><tr><th>N</th><th>Name</th><th>Release Date</th><th>Rating</th><th>State</th><th>actions</th></tr>';
        $count=1;
        while($row=$result->fetch_assoc())
        {
            echo "<tr><td>$count</td>";
            $count++;
            echo "<td id=\"appName\">{$row['appName']}</td>";
             echo '<td>'.Date('d-m-y',strtotime($row['appReleaseDate'])).'</td>';
             if($row['appRating']==NULL)
             {
                $row['appRating']=0;
             }
             echo "<td>{$row['appRating']}</td>";
             $state=$row['appState'];
             switch ($state)
             {
                case 0:
                $state="pending";
                $actions="no actions";
                break;
                case 1 :
                $state="published";
                $actions='<a href="./devApps.php?action=unpublish&id='.$row['appID'].'"" id="hrefBtn">unpublish</a>';
                $actions .='<a href="./editApp.php?appID='.$row['appID'].'" id="hrefBtn">edit</a>';
                $actions .='<a href="./devApps.php?action=delete&id='.$row['appID'].'"" id="hrefBtn">delete</a>';
                $actions .='<a href="devReviews.php?appID='.$row['appID'].'" id="hrefBtn">reviews</a>';
                break;
                case 3 :
                $state="unpublished";
                $actions='<a href="./devApps.php?action=publish&id='.$row['appID'].'"" id="hrefBtn">publish</a>';
                $actions .='<a href="" id="hrefBtn">edit</a>';
                $actions .='<a href="./devApps.php?action=delete&id='.$row['appID'].'"" id="hrefBtn">delete</a>';
                break;
                case 2 :
                $state="reported";
                $actions ='<a href="" id="hrefBtn">edit</a>';
                $actions .='<a href="./devApps.php?action=delete&id='.$row['appID'].'"" id="hrefBtn">delete</a>';
                break;
             }
             echo "<td>$state</td><td>$actions</td></tr>";
        }
        echo '</table>';
        
    }
  }

?>