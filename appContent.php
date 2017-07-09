<div id="appContent">
<?php
include_once('./includes/common.functions.php');
    if(!isset($_GET['appID']))
    {
        header("location:./index.php");
        exit();   
    }
    else
    {
        $appID=$_GET['appID'];
        $devID=1;
        $sql="SELECT * FROM apps WHERE appID=$appID AND appState=1";
    $result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
    if($result->num_rows==0)
    {
        logError("unkown app");
        header("location:./index.php");
        exit();
    }
    else
    {
     $row=$result->fetch_assoc();
     echo '<table><tr><td rowspan="3" id="appLogo"><img id="mediumIcon" src="data:image;base64,'.$row['appIcon'].'"></td>';
     echo '<td><h4>'.$row['appName'].'</h4></td><td>Rating:'.$row['appRating'].'</td></tr>';
     $sql2="SELECT developerName FROM developers WHERE developerID={$row['developerID']}";
     $result2=$mysqli->query($sql2)or die("query failed due to ".mysqli_error());
     $row2=$result2->fetch_assoc();
     echo '<tr><td>By : <a href="./developer.php?id='.$row['developerID'].'">'.$row2['developerName'].'</a></td>';
     echo '<td>Downloads:'.$row['appDownloads'].'</td></tr>';
     echo '<tr><td colspan="2"><a href="./download.php?appID='.$row['appID'].'" id="hrefBtn">download</a></td></tr></table>';
     
     echo '<div id="gallery">';
     include_once('screenshots.php');
     echo '</div>';
     
     echo '<h4>Description</h4><p id="longDesc">';
     echo "{$row['applongDesc']} </p>";
     
     echo '<h4>System Requirements</h4><p id="requirements">';
     echo "{$row['appSysRequirements']} </p>";
     
      echo '<h4>More Information</h4><div id="more">';
      echo '<table><tr><td>Language : '.$row['appLanguage'].'</td><td>Release Date : '.date('d-m-y',strtotime($row['appReleaseDate'])).'</td></tr>';
     
     $sql2="SELECT platformName FROM platforms WHERE platformID={$row['appPlatformID']}";
     $result2=$mysqli->query($sql2)or die("query failed due to ".mysqli_error());
     $row2=$result2->fetch_assoc();
      
      echo '<tr><td>Platform : '.$row2['platformName'].'</td>';
      
      $sql2="SELECT catName FROM categories WHERE catID={$row['appMainCatID']}";
     $result2=$mysqli->query($sql2)or die("query failed due to ".mysqli_error());
     $row2=$result2->fetch_assoc();
     
     echo '<td>Category : '.$row2['catName'];
     if($row['appSubCatID']!="")
     {
        $sql2="SELECT catName FROM categories WHERE catID={$row['appSubCatID']}";
     $result2=$mysqli->query($sql2)or die("query failed due to ".mysqli_error());
     $row2=$result2->fetch_assoc();
     echo ' , '.$row2['catName'];
     }
      echo '</td></tr>';
      echo '<tr><td>File Size : '.$row['appSize'].' KB</td><td><a  href="./developer.php?id='.$row['developerID'].'"id="hrefBtn">View Developer</a></td></tr>';
      echo '</table></div>';
    }

}
?>
</div>