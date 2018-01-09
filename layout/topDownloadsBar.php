<div id="topDownloadsList"> 
 <p class="text-center"><span class="label label-primary label-main">Top Downloads</span></p>
 <div class="row">
 	<hr>
 </div>	
<?php
//include_once('../includes/common.functions.php');

$sql="SELECT appID,appName,appIcon,appShortDesc,appVersion,appDownloads FROM apps WHERE appState=1 ORDER BY  appDownloads  DESC LIMIT 2";
$result=$mysqli->query($sql)or die("query failed due to ".mysqli_error());
while($row=$result->fetch_assoc())
{
 echo '<div class="row app-xs">';
    echo '<div class="col col-md-2 app-img" ><img id="smallIcon" src="data:image;base64,'.$row['appIcon'].'" ></div>';
    echo '<div class="col col-md-10"><a href="./app.php?appID='.$row['appID'].'"><h6>'.$row['appName'].' '.$row['appVersion'].'</h6></a>';
    echo '<small>'.$row['appShortDesc'].'</small>';
    echo '<div><small >Downloads : <span class="badge">'.$row['appDownloads'].'</span></small></div></div>';
    echo '</div>'; 
} 
?>
</div>
 <div class="row">
 	<hr>
 </div>	
