<div id="topDownloadsList"> 
<?php
include_once('../includes/common.functions.php');
echo '<table><tr><th>Top Downloads</th></tr>';
$sql="SELECT appID,appName,appIcon,appShortDesc,appVersion,appDownloads FROM apps WHERE appState=1 ORDER BY  appDownloads  DESC LIMIT 10";
$result=mysql_query($sql) or die("query failed due to ".mysql_error());
while($row=mysql_fetch_assoc($result))
{
 echo '<tr><td>';
    echo '<table id="smallApp"><tr><td rowspan="2"><img id="mediumIcon" src="data:image;base64,'.$row['appIcon'].'"></td>';
    echo '<td><a href="../app.php?appID='.$row['appID'].'"><strong>'.$row['appName'].' '.$row['appVersion'].'</strong></a>';
    echo '<p><small>'.$row['appShortDesc'].'</small></p></td></tr>';
    echo '<tr><td><small>Downloads : '.$row['appDownloads'].'</small></td></tr>';
    echo '<table></td></tr>'; 
}
echo '</table>'; 
?>
</div>
