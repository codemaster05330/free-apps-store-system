<div id="developerContent">
<?php
    include_once('./includes/common.functions.php');
    if(!isset($_GET['id']))
    {
        header("location:./index.php");
        exit();   
    }
    else
    {
        $devID=$_GET['id'];
        
        $sql="SELECT * FROM developers WHERE developerID=$devID";
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    if(mysql_num_rows($result)==0)
    {
        header("location:./index.php");
        exit();
    }
    else
    {
     $row=mysql_fetch_assoc($result);
     
     echo '<p id="developerLogo">' ;
     if($row['develperLogo']=="")
     {
        echo '<img src="images/placeholder.jpg"><br/>';
     }
     else
     {
       echo '<img id="mediumIcon" src="data:image;base64,'.$row['develperLogo'].'"><br/>'; 
     }
     echo  '<strong>'.$row['developerName'].'</strong></p>';
     
     echo '<p id="devContact">';
     echo '<table><caption>Information</caption><tr>';
     echo '<td>'.$row['developerEmail'].'</td></tr>';
     echo '<tr>';
     echo '<td><a href="'.$row['developerWebsite'].'">'.$row['developerWebsite'].'</a></td></tr>';
     echo '<tr>';
     echo '<td>'.$row['Address1'].' '.$row['Address2'].'</td></tr>';
     echo '<tr> ';
     echo '<td>'.$row['country'].' , '.$row['city'].' , '.$row['state'].' '.$row['zipcode'].'</td></tr></table>';
     
     echo '<p id="devApps"><table><caption>Published Applications</caption>';
    $sql="SELECT appID,appName,appIcon,appShortDesc,appVersion FROM apps WHERE appState=1 AND developerID=$devID ORDER BY  appReleaseDate  DESC";
    $result=mysql_query($sql) or die("query failed due to ".mysql_error());
    $count=1;
    while($row=mysql_fetch_assoc($result))
    {
    echo "<tr><td>$count</td><td>";
    $count++;
    echo '<table id="smallApp"><tr><td rowspan="2"><img id="mediumIcon" src="data:image;base64,'.$row['appIcon'].'"></td>';
    echo '<td><a href="../app.php?appID='.$row['appID'].'"><strong>'.$row['appName'].' '.$row['appVersion'].'</strong></a>';
    echo '<p><small>'.$row['appShortDesc'].'</small></p></td></tr>';
   // echo '<tr><td><small>Downloads : '.$row['appDownloads'].'</small></td></tr>';
    echo '<table></td></tr>'; 
    }
echo '</table></p>'; 
     
     
     
    }
    }

?>
</div>

